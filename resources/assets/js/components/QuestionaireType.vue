<template>
	<div>
		<section id="content">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-6">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> QUESTIONAIRES</h2>
		                    </div>
		                    <el-form label-position="top">
			                    <div class="card-body card-padding">
			                        <div class="form-group">
			                        	<el-form-item label="Name">
	                                  		<el-input
									  		type="text"
									  		autosize
									  		placeholder="Name"
									  		v-model="questionaire.name">
											</el-input>
										</el-form-item>
		                            </div> 
			                      
			                       
	                        	
			                        <div class="table-responsive">
			                        	<table class="table table-bordered table-hover">
				                        	
				                        	<tbody>
				                        		<tr v-for="(row, index) in rows">
				                        			<td></td>
				                        			<td>{{ row.text }}</td>
				                        			<td>
				                        				<el-input
												  		type="text"
												  		autosize
												  		v-model = "questionaire.criteria[row.index].name"
												  		v-if="row.text == 'Name'">
														</el-input>
														<el-input
												  		type="text"
												  		autosize
												  		v-model = "questionaire.criteria[row.index].passing"
												  		v-if="row.text == 'Passing'">
														</el-input>
				                        			</td>
				                        		
				                        			<td>
				                        				<a v-if="row.icon" href="javascript:;" type="button" class="btn btn-danger btn-xs" 
				                        				   @click="removeRow(index)"> 
				                        					<i class="zmdi zmdi-delete"></i> Remove 
				                        				</a>
				                        			</td>
				                        		</tr> 
				                        		
				                        	
				                        		<tr>
				                        			<td></td>
				                        			<td></td>
				                        			<td></td>
				                        			<td>
				                        				<a href="javascript:;" type="button" class="btn btn-success btn-xs" @click="addRow">
				                        					<i class="zmdi zmdi-plus"></i> Add fields
				                        				 </a>
				                        			</td>
				                        		</tr> 
				                        	</tbody>
				                        </table>
			                        </div>
			                        <br><br>
			                        <div>

										<el-tag style="background-color:#EFF2F7;color:black;">Default</el-tag>
										<el-tag style="background-color:#58B7FF;">Primary</el-tag>
										<el-tag style="background-color:#13CE66;">Success</el-tag>
										<el-tag style="background-color:#FF4949;">Danger</el-tag>
										<el-tag style="background-color:#1D8CE0;">Info</el-tag>
										<el-tag style="background-color:#F7BA2A;">Warning</el-tag>

									</div>
									<br>
			                    	<div class="row">
										<div class="col-md-8">
										
											<div class="form-group">
			                             		<el-form-item label="Colors" prop="group">
													 <el-select v-model="questionaire.color"  size="small" placeholder="Select">
													 	<el-option 
													 		v-for="item in colors"
													 		:key="item.value" 
													 		:label="item.text" 
													 		:value="item.value"

													 		>	 		
													 	</el-option>
													 </el-select>
												</el-form-item>	                                
				                            </div> 
										</div>
										<div class="col-md-4">
                        					<br><br>
                        					<el-checkbox v-model="questionaire.isactive">is active</el-checkbox>
                        				</div>
									</div>
			                      	<br><br>
			                        <button type="button"  class="btn btn-warning">Create</button>
			                        <button type="button" class="btn btn-danger">Clear</button>
			                    </div>
		                    </el-form>  
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> ALL QUESTIONAIRES</h2>
		                    </div>

		                    <div class="card-body card-padding">
		                        <table class="table table-bordered table-hover">
		                            <tbody>
		                                <tr>
		                                    <td style="background-color:#1D8CE0;" width="200px;">
		        								<h6 style="color:white;">Non-Voice</h6>
		                                    </td>
		                                    <td>
		                                    	<h6 style="color:black;">Active</h6>
		                                    </td>
		                                    <td>
		                                        <a href="javascript:;" type="button" class="btn btn-primary btn-sm"> 
		                                           <i class="zmdi zmdi-edit"></i> 
		                                         </a>
		                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm"> 
		                                           <i class="zmdi zmdi-delete"></i> 
		                                       </a>
		                                    </td>
		                                </tr>
		                                <tr>
		                                    <td style="background-color:#13CE66;" width="200px;">
		        								<h6 style="color:white;">Voice</h6>
		                                    </td>
		                                    <td>
		                                    	<h6 style="color:black;">Active</h6>
		                                    </td>
		                                    <td>
		                                        <a href="javascript:;" type="button" class="btn btn-primary btn-sm"> 
		                                           <i class="zmdi zmdi-edit"></i> 
		                                         </a>
		                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm"> 
		                                           <i class="zmdi zmdi-delete"></i> 
		                                       </a>
		                                    </td>
		                                </tr>
		                                <tr>
		                                    <td style="background-color:#58B7FF;" width="200px;">
		        								<h6 style="color:white;">Software Services</h6>
		                                    </td>
		                                    <td>
		                                    	<h6 style="color:black;">Active</h6>
		                                    </td>
		                                    <td>
		                                        <a href="javascript:;" type="button" class="btn btn-primary btn-sm"> 
		                                           <i class="zmdi zmdi-edit"></i> 
		                                         </a>
		                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm"> 
		                                           <i class="zmdi zmdi-delete"></i> 
		                                       </a>
		                                    </td>
		                                </tr>
		                                <tr>
		                                    <td style="background-color:#EFF2F7;" width="200px;">
		        								<h6 style="color:black;">Software Services Exam</h6>
		                                    </td>
		                                    <td>
		                                    	<h6 style="color:black;">Active</h6>
		                                    </td>
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

		        </div>
		        <pre>{{ questionaire }}</pre>
		    </div>
		  </section>
	</div>
</template>

<script>
	export default{
		data () {
			return {
 				questionaire : {
 					name : '',
 					criteria : [
 						{
 							name : '',
 							passing : ''
 						}
 					],
 					color : '',
 					isactive : false
 				}, 
 				colors: [
 					{value : '#D3DCE6' , text : 'Default', },
 					{value : '#1D8CE0' , text : 'Pimary', },
 					{value : '#13CE66' , text : 'Success', },
 					{value : '#FF4949' , text : 'Danger', },
 					{value : '#58B7FF' , text : 'Info', },
 					{value : '#F7BA2A' , text : 'Warning', },
 				],
 				ctr : 0,
 				rows : [
 					{
 						text : 'Name',
 						icon : true,
 						index : 0
 					},
 					{
 						text : 'Passing',
 						icon : false,
 						index : 0
 					}
 				],
 				
			}
		},

		methods : {
			addRow() {
				
				if(! this.questionaire.criteria[this.ctr].name || ! this.questionaire.criteria[this.ctr].passing) return

				this.ctr += 1
				this.questionaire.criteria.push( { name : '', passing : ''})
				this.rows.push(
					{
						text : 'Name',
						icon : true,
						index : this.ctr
					},
					{
						text : 'Passing',
						icon : false,
						index : this.ctr
					}
				)
			},

			removeRow(index){
				if(this.questionaire.criteria.length == 1) return
				this.rows.splice(index, 2)
				this.questionaire.criteria.splice(index-1,2)
				this.ctr -= 1
			},

			getModel(text){
				if(text == 'Name')
					return this.questionaire.criteria[this.ctr].name
				return this.questionaire.criteria[this.ctr].passing
			}
		}

	}
</script>