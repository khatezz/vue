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

					        <div class="card-body card-padding">
					            <div class="row">
			                        <div class="col-sm-4">
			                            <div class="form-group">
	                                        <div class="fg-line">
	                                           	<vue-select 
								                :options="usergroup" v-model="user.group"
								                :searchable="true" language="en-US">
										        </vue-select>
	                                        </div>
	                                    </div>

			                        </div>
			                        <div class="col-sm-4">
			                            <div class="input-group">
			                            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
			                                    <input type="text" class="form-control" v-model="user.firstname" placeholder="Firstname"> 
			                            </div>
			                        </div>

			                        <div class="col-sm-4">
			                            <div class="input-group">
			                                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
			                                    <input type="text" class="form-control" placeholder="Lastname" v-model="user.lastname">
			                            </div>
			                        </div>
			                    </div>
			                    <br><br>
			                     <div class="row">
			                     	<div class="col-sm-4">
			                            <div class="form-group">
	                                        <div class="fg-line">
	                                            <div class="select">
	                                                <select class="form-control" v-model="user.status">
	                                                   <option>SELECT STATUS</option>
				                                		<option>ACTIVE</option>
				                                		<option>INACTIVE</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                    </div>
			                        </div>
			                        <div class="col-sm-4">
			                            <div class="input-group">
			                            <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
			                                    <input type="text" class="form-control" v-model="user.email" placeholder="Email">
			                            </div>
			                        </div>
			                     
			                        <div class="col-sm-4">
			                            <div class="input-group">
			                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
			                                    <input type="text" class="form-control" placeholder="Password" v-model="user.password">
			                                <span class="input-group-addon">
			                                	<a href="javascript:;" @click="generatePassword" type="button" class="btn btn-success btn-sm"> 
			                                		<i class="zmdi zmdi-refresh-alt"></i> 
			                                	</a>
			                                </span>
			                            </div>
			                        </div>
			                    </div>
			                  	<br>
			                	<div class="row">
			                		<div class="col-md-12">
			                			<div style="padding-left: 150px;">
			                				<button type="button" class="btn btn-warning pull-right" @click="doSubmit">{{buttontext}}</button>
			                			</div>
			                			<div style="padding-right: 150px;">
			                				<button type="button" class="btn btn-danger pull-right" @click="doClearFields">Clear</button>
			                			</div>

			                		</div>
			                	</div>
					        </div>
					    </div>

					</div>
					<div class="col-md-3">
						<div class="card">
					        <div class="card-header bgm-blue m-b-20">
					            <h2>STATISTICS</h2>
					        </div>

					        <div class="card-body card-padding">
					        	
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
				            <tr>
				                <td>recruitment recruitment</td>
				                <td>recruitment@recruitment.com</td>
				                <td>Recruitment</td>
				                <td>July 07, 2016</td>
				                <td>
				                	<a href="javascript:;" type="button" class="btn btn-primary btn-sm" @click="update"> 
			                           <i class="zmdi zmdi-edit"></i> 
			                         </a>
				                	<a href="javascript:;" type="button" class="btn btn-danger btn-sm" @click="deleteGroup"> 
			                           <i class="zmdi zmdi-delete"></i> 
			                       </a>
				                </td>
				            </tr>
				          
				            </tbody>
				        </table>
				    </div>
				</div>

			</div>
		</section>
	</div>
</template>

<script>
	import VueSelect from 'vue-select'
	export default{
		components : {
			'vue-select' : VueSelect
		},
		data () {
			return {
				user : {
					group : 'SELECT USER GROUP',
					firstname : '',
					lastname : '',
					status : 'SELECT STATUS',
					email : '',
					password : '',
				},

				buttontext : 'Create Member',

				usergroup : [
					'Recruitment'
				],
				status : [
					'Active',
					'Inactive'
				]

			}
		},

		methods : {
			generatePassword () {
				let generatedpassword = Math.random().toString(36).slice(-8)
				this.user.password = generatedpassword
			},

			deleteGroup(){
				  swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this imaginary file!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonText: "Yes, delete it!",
	                }).then(function(){
	                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
	                });

			},

			doClearFields () {
				this.user.firstname = ''
				this.user.lastname = ''
				this.user.email = ''
				this.user.password = ''
				this.user.group = 'SELECT USER GROUP'
				this.user.status = 'SELECT STATUS'
			},

			doSubmit () {
				let valid = this.$validate.checkInputs(this.user)
			 	if(! valid) this.showLoginError()
				
			},
			update () {
				this.user.firstname = 'recruitment'
				this.user.lastname = 'recruitment'
				this.user.email = 'recruitment@recruitment.com'
				this.user.password = 'password'
				this.user.group = 'RECRUITMENT'
				this.user.status = 'ACTIVE'
				this.buttontext = 'Update Member';
			}
		},
		 notifications: {
	      	showLoginError : {
	        title: 'Login Failed',
	        message: 'Failed to authenticate',
	        type: 'error'
	      }
    	},
	}
</script>

<style>
	.fade-enter-active, .fade-leave-active {
	  transition-property: opacity;
	  transition-duration: .25s;
	}

	.fade-enter-active {
	  transition-delay: .25s;
	}

	.fade-enter, .fade-leave-active {
	  opacity: 0
	}
</style>