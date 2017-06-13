@extends('Layout.master')

@section('content')
<section id="content">
	<div class="container" id="usermanagement">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
		        <div class="card-header bgm-blue m-b-20">
		            <h2> <i class="zmdi zmdi-apps"></i> MANAGE USER</h2>
		        </div>

		        <div class="card-body card-padding">
		            <div class="row">
                        <div class="col-sm-4">
                            <select class="chosen">
                            	<option>Select User Group</option>
                                <option value="Recruitment">Recruitment</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group fg-float">
                            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                <div class="fg-line">
                                    <input type="text" v-model="user.firstname" class="form-control">
                                    <label class="fg-label">Firstname</label>
                                </div>
                              
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control">
                                    <label class="fg-label">Lastname</label>
                                </div>
                                 
                            </div>
                        </div>
                    </div>
                    <br><br>
                     <div class="row">
                     	<div class="col-sm-4">
                            <select class="chosen">
                            	<option>Select status</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group fg-float">
                            <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control">
                                    <label class="fg-label">Email</label>
                                </div>
                              
                            </div>
                        </div>
                     
                        <div class="col-sm-4">
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control">
                                    <label class="fg-label">Password</label>
                                </div>
                                <span class="input-group-addon">
                                	<a href="javascript:;" type="button" class="btn btn-success btn-sm"  
                                		data-trigger="hover" data-toggle="popover"
                                        data-placement="right"
                                        title="" data-original-title="Generate password"> 
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
                				<button type="button" class="btn btn-warning pull-right">Create member</button>
                			</div>
                			<div style="padding-right: 150px;">
                				<button type="button" class="btn btn-danger pull-right">Clear</button>
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
	                	<a href="javascript:;" type="button" class="btn btn-primary btn-sm"
	                	   data-trigger="hover" 
	                	   data-toggle="popover"
                           data-placement="top"
                           title="" 
                           data-original-title="Update user"> 
                           <i class="zmdi zmdi-edit"></i> 
                         </a>
	                	<a href="javascript:;" type="button" class="btn btn-danger btn-sm"  
	                	   data-trigger="hover" 
	                	   data-toggle="popover"
                           data-placement="top"
                           title="" 
                           data-original-title="Remove user"> 
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
@endsection

@section('javascript')

<script src="/js/usermanagement.js"></script>
@endsection