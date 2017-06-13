<template>
	<div>
		<section id="content">
		    <div class="container">
		    <el-form ref="usergroup" :model="usergroup" label-position="top" :rules="rules">
		        <div class="row">
		            <div class="col-md-6">
		                <div class="card" >
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> USER GROUPS</h2>
		                    </div>
		                    <div class="card-body card-padding" v-loading.body="submitloading" element-loading-text="Saving new user group...">
		                    	
		                        	<div class="form-group">
			                        	<el-form-item label="User group name" prop="name">
	                                  		<el-input
									  		type="text"
									  		autosize
									  		placeholder="Group name"
									  		v-model="usergroup.name">
											</el-input>
										</el-form-item>
		                            </div> 
		                      
		                       
		                        <hr style="border-top: dotted 2px; color:#D3DCE6;" />
		                        <div class="form-group">
			                        <el-form-item label="User group description" prop="description">
		                               <el-input
										  type="textarea"
										  :autosize="{ minRows: 2, maxRows: 4}"
										  placeholder="Description"
										  v-model="usergroup.description">
										</el-input>
									</el-form-item>
		                        </div>
		                        
		                        <br><br>
		                        <el-button type="warning"   v-if="! update" @click="doSubmit('usergroup')">Add new user group</el-button>
		                        <el-button type="warning"   v-if="update" @click="doUpdate('usergroup')">Update user group</el-button>
		                        <el-button type="danger"   @click="doClearFields('usergroup')">Clear</el-button>
		                    </div>
		                </div>
		            </div>

		            <div class="col-md-6">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> ALL USER GROUPS</h2>
		                    </div>

		                    <div class="card-body card-padding">
		                        <table class="table table-bordered table-hover">
		                            <tbody>
		                                <tr v-for="usergroup in usergroups">
		                                    <td>{{ usergroup.name }}</td>
		                                    <td>{{ usergroup.description }}</td>
		                                    <td>
		                                     	<el-tooltip class="item" effect="light" content="Update user group" placement="top-start">
			                                        <a href="javascript:;" 
			                                        	type="button" 
			                                        	class="btn btn-primary btn-sm" 
			                                        	@click="updateGroup(usergroup._id)"> 
			                                           <i class="zmdi zmdi-edit"></i> 
			                                         </a>
			                                    </el-tooltip>
			                                    <el-tooltip class="item" effect="light" content="Remove user group" placement="top-start">
			                                        <a href="javascript:;" 
			                                           type="button" 
			                                           class="btn btn-danger btn-sm" 
			                                           @click="doDelete(usergroup._id)" 
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

		        </div>
		    </el-form>
		    </div>
		</section>
	</div>

</template>
<script>
	import UpdateGroup from './UpdateGroup.vue'
	export default{
		data () {
			return {
				usergroup : {
					name : '',
					description : '',
				},
				usergroups : {},
				id : 0,
				update : false,
				submitloading : false,
				fullscreenLoading : false,
				rules : {
					name : [
						{required : true, message : 'Group name is required'},
						
					],

					description : [
						{required : true, message : 'Description is required'},
						
					]
				}
			}
		},
		components : {
			'update-group' : UpdateGroup 
		},
		created () {
			this.$http.get('api/getusergroups')
			.then(response => {
				this.usergroups = response.body
			})
		},
		methods : {
			doDelete(id){
				this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
          		confirmButtonText: 'OK',
	          	cancelButtonText: 'Cancel',
	          	type: 'warning'
	        	}).then(() => {
	        		this.openFullScreen()
	         		setTimeout(() => {
	         			this.$http.delete('api/deleteusergroup/'+id)
	         			.then(response => {
	         				this.usergroups = response.body
	         			})
	         			this.$notify.success({
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
			updateGroup(id){
				this.id = id
				this.update = true
				this.$http.get('api/getusergroup/'+this.id)
				.then(response => {
					this.usergroup.name = response.body.name
					this.usergroup.description = response.body.description
				})
			},

			doUpdate(usergroup){
				this.submitloading = true
				this.$refs[usergroup].validate((valid) =>{
					setTimeout(() => {
					if(! valid){
						this.$notify.error({
				          title: 'Opps!',
				          message: 'Something went wrong'
				        })
					}else{

						this.$http.post('api/updateusergroup/'+this.id,this.usergroup)
						.then(response=>{
							this.usergroups = response.body
						})
						this.$notify({
					    	title: 'Success',
					        message: 'User group updated successfuly',
					        type: 'success'
				        });
					}
					this.submitloading = false
					this.update = false
					this.doClearFields(usergroup)
				},3000)
				})
			},
			doSubmit(usergroup){
				this.submitloading = true
				this.$refs[usergroup].validate((valid) =>{
					setTimeout(() => {
					if(! valid){
						this.$notify.error({
				          title: 'Opps!',
				          message: 'Something went wrong'
				        })
					}else{

						this.$http.post('api/createusergroup',this.usergroup)
						.then(response=>{
							this.usergroups = response.body
						})
						this.$notify({
					    	title: 'Success',
					        message: 'New user saved',
					        type: 'success'
				        });
					}
					this.submitloading = false
				},3000)
				})
				
			 // 	console.log(valid);
			},
			openFullScreen() {
        		this.fullscreenLoading = true
        		setTimeout(() => {
          			this.fullscreenLoading = false
       			}, 3000)
      		},

      		doClearFields(usergroup){
      			this.$refs[usergroup].resetFields()
      		}
		}
	}
</script>
