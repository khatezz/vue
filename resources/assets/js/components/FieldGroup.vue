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
		                                <span class="input-group-addon"><i class="zmdi zmdi-apps"></i></span>
		                         
		                                    <input type="text" class="form-control" placeholder="Field Group Name">
		                            </div>
		                        </div>
		                        <br>
		                        
		                        <div class="input-group">
		                           
		                            	  <input type="text" class="form-control iconpicker" placeholder="Field Group Name">
		      		                                
		                        </div>
		                    	<div class="iconpicker" data-selected="fa-flag">
								    <a href="javascript:;" class="iconpicker-component btn btn-primary btn-block">
								        <i></i>np[]
								    </a>
								</div>
		                        <br><br>
		                        <button type="button" class="btn btn-warning">Add new user group</button>
		                        <button type="button" class="btn btn-danger">Clear</button>
		                    </div>
		                </div>
		            </div>
		            <transition name="fade">
		            <div class="col-md-6">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> ALL FIELD GROUPS</h2>
		                    </div>

		                    <div class="card-body card-padding">
		                        <table class="table table-bordered table-hover">
		                            <tbody>
		                                <tr>
		                                    <td>Recruitment</td>
		                                    <td>Recruitment team</td>
		                                    <td>
		                                        <a href="javascript:;" type="button" class="btn btn-primary btn-sm"> 
		                                           <i class="zmdi zmdi-edit"></i> 
		                                         </a>
		                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm"> 
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
		         
		        </div>
		    </div>
		</section>
	</div>
</template>

<script>
	require('./fontawesome-iconpicker-1.3.0/dist/js/fontawesome-iconpicker.js')

	$('.iconpicker').iconpicker()
	export default{

	}
</script