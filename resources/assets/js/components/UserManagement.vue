<template>
	<div>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="card">
					        <div class="card-header bgm-blue m-b-20">
					            <h2> <i class="zmdi zmdi-apps"></i> MANAGE USER</h2>
					        </div>

					        <div class="card-body card-padding" v-loading.body="submitloading" element-loading-text="Saving new user...">
					        	<el-form ref="user" :model="user" label-position="top" :rules="rules">
					            <div class="row">
			                        <div class="col-sm-4">
			                        	
			                            <div class="form-group">
	                                        <div class="fg-line">
	                                        <el-form-item label="User Group" prop="group_id">
												 <el-select v-model="user.group_id"  size="small" placeholder="Select">
												 	<el-option 
												 		v-for="item in group"
												 		:key="item.value" 
												 		:label="item.text" 
												 		:value="item.value">	 		
												 	</el-option>
												 </el-select>
											</el-form-item>
	                                        </div>
	                                    </div>
	                                    

			                        </div>
			                        <div class="col-sm-4">
			                        	<el-form-item label="First Name" prop="firstname">
			                            <div class="input-group">
			                            	<el-input placeholder="First Name" size="small" v-model="user.firstname"></el-input>
			                            </div>
			                            </el-form-item>
			                        </div>

			                        <div class="col-sm-4">
			                            <div class="input-group">
			                                <el-form-item label="Last Name" prop="lastname">
			                                    <el-input placeholder="Last Name" size="small" v-model="user.lastname"></el-input>
			                                </el-form-item>
			                            </div>
			                        </div>
			                    </div>

			                     <div class="row">
			                     	<div class="col-sm-4">
			                            <div class="form-group">
			                            	<el-form-item label="Status" prop="status">
	                                        <div class="fg-line">
	                                         	<el-select v-model="user.status" size="small" placeholder="Select">
												 	<el-option 
												 		v-for="item in status"
												 		:key="item.value" 
												 		:label="item.text" 
												 		:value="item.value">	 		
												 	</el-option>
												 </el-select>
	                                        </div>
	                                        </el-form-item>
	                                    </div>
			                        </div>
			                        <div class="col-sm-4">
			                            <div class="input-group">
			                           	<el-form-item label="Email" prop="email">
			                                <el-input placeholder="Email" size="small" v-model="user.email"></el-input>
			                            </el-form-item>
			                            </div>
			                        </div>
			                     
			                        <div class="col-sm-4">
			                            <div class="input-group">
			                                <el-form-item label="Password" prop="password">
			                                   <el-input placeholder="Password" size="small" type="text" v-model="user.password"></el-input>
			                                 </el-form-item>
			                                <span class="input-group-addon">
			                                	<el-tooltip class="item" effect="light" content="Generate password" placement="top-start">
				                                	<a href="javascript:;" @click="generatePassword" type="button" class="btn btn-success btn-xs"> 
				                                		<i class="zmdi zmdi-refresh-alt"></i> 
				                                	</a>
			                                	</el-tooltip>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                  	<br>
			                	<div class="row">
			                		<div class="col-md-12">
			                			<div style="padding-left: 150px;" v-if="! isupdate">
			                				<el-button type="warning"  @click="doSubmit('user')" class="pull-right">Create new user</el-button>
			                			</div>
			                			<div style="padding-left: 50px;" v-if="isupdate">
			                				<el-button type="warning"  @click="doUpdate('user')" class="pull-right">Update User</el-button>
			                			</div>
			                			<div style="padding-right: 150px;">
			                				<el-button type="danger" class="pull-right" @click="doClearFields('user')">clear</el-button>
			                			</div>

			                		</div>
			                	</div>
			                	</el-form>
					        </div>
					    </div>

					</div>
					<div class="col-md-3">
						<div class="card">
					        <div class="card-header bgm-blue m-b-20">
					            <h2>STATISTICS</h2>
					        </div>

					        <div class="card-body card-padding">
	                          <!--   <div class="event-date bgm-green">
	                                <span class="ed-day">30</span>
	                                <span class="ed-month-time">Jul 14:15</span>
	                            </div> -->
					        </div>
					    </div>
					</div>
				</div>
				<div class="card">
				    <div class="table-responsive">
				        <table class="table table-bordered">
				            <thead>
				            <tr>
				                <th>Name</th>
				                <th>Email</th>
				                <th>Membership</th>
				                <th>Date Created</th>
				                <th>Action</th>
				            </tr>
				            </thead>
				            <tbody>
				            <tr v-for="(user, index) in users">
				                <td>{{ user.firstname}} {{ user.lastname }}</td>
				                <td>{{ user.email }}</td>
				                <td>{{ user.group.name }}</td>
				                <td>{{ user.created_at }}</td>
				                <td>
				                	<el-tooltip class="item" effect="light" content="Update user" placement="top-start">
					                	<a href="javascript:;" type="button" class="btn btn-primary btn-sm" @click="update(user._id)"> 
				                           <i class="zmdi zmdi-edit"></i> 
				                         </a>
				                    </el-tooltip>
				                    <el-tooltip class="item" effect="light" content="Remove user" placement="top-start">
					                	<a href="javascript:;" type="button" class="btn btn-danger btn-sm" @click="removeConfirmation(user._id)"
					                	   v-loading.fullscreen.lock="fullscreenLoading"> 
				                           <i class="zmdi zmdi-delete"></i> 
				                       </a>
				                    </el-tooltip>
				                </td>
				            </tr>
				          	
				            </tbody>
				        </table>
				    </div>
				</div>
			
			</div>
			<pre>{{ user }}</pre>
		</section>

	</div>

</template>

<script>
	import Vue from 'vue'
	import { BasicSelect }  from 'vue-search-select'
	
	export default{
		components: {
			'basic-select' : BasicSelect,
		},
		data () {
			return {
				user : {
					group_id : '',
					firstname : '',
					lastname : '',
					status : '',
					email : '',
					password : '',
				},
				users : {},
				rules : {
					group_id : [
						{required : true, message : "Group field is required"}
					],
					firstname : [
						{required : true, message : "First name field is required"},
						{min : 2,  message : "First name should be at least 2 letters"}
					],

					lastname : [
						{required : true, message : "Last name field is required"},
						{min : 2,  message : "Last name should be at least 2 letters"}
					],

					status : [
						{required : true, message : "Status field is required"}
					],

					email : [
						{required : true, message : "Email field is required"},
						{ type: 'email', message: 'Please input correct email address', trigger: 'blur,change' }
					],

					password : [
						{required : true, message : "Password field is required"},
						{min : 6,  message : "Password should be at least 6 letters"}
					]

				},
				buttontext : 'Create Member',
				group : [],
				status : [
					{value : 'Active', text : 'Active'},
					{value : 'Inactive', text : 'Inactive'}
				],

				fullscreenLoading: false,
				submitloading : false,
				isupdate : false,
				id : 0
			

			}
		},
		created () {
			let tempgroup = []
			this.$http.get('api/getusers')
			.then(response => {
				this.users = response.body
			})
			
			this.$http.get('api/getusergroups')
			.then(response => {
				Object.keys(response.body).forEach(function (key) {
					// this.group.push(response.body[key])
					tempgroup.push(
						{
							value : response.body[key]._id, 
							text : response.body[key].name
						}
					)

					
				})
			})

			this.group = tempgroup


		},
		methods : { 
			generatePassword () {
				let generatedpassword = Math.random().toString(36).slice(-8)
				this.user.password = generatedpassword
			},
			deleteGroup(id){
				  swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this imaginary file!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonText: "Yes, delete it!sadasd",
	                }).then(function(){
	                	
	                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
	                });

			},

			doClearFields (user) {
				 this.$refs[user].resetFields()
			},
			doSubmit (user) {
				this.submitloading = true
				this.$refs[user].validate((valid) => {

					setTimeout(() => {
					if(! valid){
						this.$notify.error({
				          title: 'Opps!',
				          message: 'Something went wrong'
				        })
					}else{
						this.$http.post('api/createuser',this.user)
						.then(response => {
							this.users = response.body
							this.$notify.success({
					          title: 'Success!',
					          message: 'New user created sucessfully'
					        })


						})
					}
					this.submitloading = false
					},3000)

				})

			},
			update (id) {
				this.id = id
				this.isupdate = true;
				this.$http.get('api/getuser/'+this.id)
				.then(response => {
					this.user.firstname = response.body.firstname
					this.user.lastname = response.body.lastname
					this.user.email = response.body.email
					this.user.group_id = response.body.group_id
					this.user.status = response.body.status
					this.user.password = response.body.password
				})
			},

			doUpdate(user){
				this.submitloading = true
				this.$refs[user].validate((valid) => {

					setTimeout(() => {
					if(! valid){
						this.$notify.error({
				          title: 'Opps!',
				          message: 'Something went wrong'
				        })
					}else{
						this.$http.post('api/updateuser/'+this.id,this.user)
						.then(response => {
							this.users = response.body
							this.$notify.success({
					          title: 'Success!',
					          message: 'User updated sucessfully'
					        })


						})
					}
					this.submitloading = false
					this.isupdate = false
					this.doClearFields(user)
					},3000)

				})
			},
			removeConfirmation(id) {
				this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
          		confirmButtonText: 'OK',
	          	cancelButtonText: 'Cancel',
	          	type: 'warning'
	        	}).then(() => {
	        		this.openFullScreen()
	         		setTimeout(() => {
	         			this.$http.delete('api/deleteuser/'+id)
	                	.then(response => {
	                		this.users = response.body
	                	})
	         			this.$notify.error({
				          title: 'Deleted',
				          message: 'User deleted'
				        })
	         		},3000)
	        	}).catch(() => {
	          		this.$message({
			            type: 'info',
			            message: 'Delete canceled'
	          		})         
	        	})
			},
			openFullScreen() {
        		this.fullscreenLoading = true
        		setTimeout(() => {
          			this.fullscreenLoading = false
       			}, 3000)
      		}
		}
	}
</script>

