<template>
	<div>
		<section id="content">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-6">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> USER GROUPS</h2>
		                    </div>
		                    <div class="card-body card-padding">
		                        <div class="conatiner">
		                            <div class="input-group">
		                                <span class="input-group-addon"><i class="zmdi zmdi-accounts"></i></span>
		                         
		                                    <input type="text" class="form-control" placeholder="Group Name" v-model="usergroup.name" :disabled="update">
		                                   
		                          
		                            </div> 
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="zmdi zmdi-collection-text"></i></span>
		                                <textarea class="form-control auto-size" placeholder="Description" v-model="usergroup.description" :disabled="update" rows="10">
		                                	
		                                </textarea>
		                        </div>
		                        <br><br>
		                        <button type="button" class="btn btn-warning" :disabled="update" @click="doSubmit">Add new user group</button>
		                        <button type="button" class="btn btn-danger" :disabled="update">Clear</button>
		                    </div>
		                </div>
		            </div>
		            <transition name="fade">
		            <div class="col-md-6" v-if="! update">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> ALL USER GROUPS</h2>
		                    </div>

		                    <div class="card-body card-padding">
		                        <table class="table table-bordered table-hover">
		                            <tbody>
		                                <tr>
		                                    <td>Recruitment</td>
		                                    <td>Recruitment team</td>
		                                    <td>
		                                        <a href="javascript:;" type="button" class="btn btn-primary btn-sm" @click="updateGroup"> 
		                                           <i class="zmdi zmdi-edit"></i> 
		                                         </a>
		                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm" @click="doDelete"> 
		                                           <i class="zmdi zmdi-delete"></i> 
		                                       </a>
		                                    </td>
		                                </tr>
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		            </div>
		            </transition>
		         	<transition name="fade">
		         		<update-group v-if="update" :update="update" @cancelUpdate="update = $event"></update-group>
		         	</transition>
		        </div>
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
				update : false
			}
		},
		components : {
			'update-group' : UpdateGroup 
		},
		methods : {
			doDelete(){
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
			updateGroup(){
				this.update = true;
			},

			doSubmit(){
				let valid = this.$validate.checkInputs(this.usergroup)
			 	console.log(valid);
			}
		}
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