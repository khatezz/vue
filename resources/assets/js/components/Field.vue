<template>
	<div>
		<transition name="fade">
		<section id="content">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-6">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> FIELDS</h2>
		                    </div>
		                    <el-form ref="fields" label-position="top" :rules="rules" :model="fields">
			                    <div class="card-body card-padding" v-loading.body="submitloading" element-loading-text="Saving new user...">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
			                             		<el-form-item label="Field Group" prop="group">
													 <el-select v-model="fields.group"  size="small" placeholder="Select">
													 	<el-option 
													 		v-for="item in fieldGroup"
													 		:key="item.value" 
													 		:label="item.text" 
													 		:value="item.value">	 		
													 	</el-option>
													 </el-select>
												</el-form-item>	                                
				                            </div> 
										</div>
										<div class="col-md-6">
											<div class="form-group fg-float">
						                       	<el-form-item label="Status" prop="status">
													 <el-select v-model="fields.status"  size="small" placeholder="Select">
													 	<el-option 
													 		v-for="item in statusField"
													 		:key="item.value" 
													 		:label="item.text" 
													 		:value="item.value">	 		
													 	</el-option>
													 </el-select>
												</el-form-item>	       
					                        </div> 
										</div>
									</div>
		                            
			                        <div class="form-group">
			                        	<el-form-item label="Model Name">
	                                  		<el-input
									  		type="text"
									  		autosize
									  		placeholder="Model Name"
									  		v-model="fields.model"
									  		:disabled="true">
											</el-input>
										</el-form-item>
		                            </div> 
			                        <div class="form-group">
			                        	<el-form-item label="Label Name" prop="label">
	                                  		<el-input
									  		type="text"
									  		autosize
									  		placeholder="Label name"
									  		v-model="fields.label"
									  		@input="setModelValue">

											</el-input>
										</el-form-item>
		                            </div> 
			                        <div class="form-group">
			                        	<el-form-item label="Placeholder" prop="placeholder">
	                                  		<el-input
									  		type="text"
									  		autosize
									  		placeholder="Placeholder"
									  		v-model="fields.placeholder">
											</el-input>
										</el-form-item>
		                            </div> 
	                        		<div class="input-group">
	                        			<div class="row">
	                        				<div class="col-md-10">
					                            <el-form-item label="Type field" prop="field">
													<el-select v-model="fields.field"  size="small" placeholder="Select">
														<el-option 
														 	v-for="item in typeField"
														 	:key="item.value" 
														 	:label="item.text" 
														 	:value="item.value">	 		
													 	</el-option>
													 </el-select>
												</el-form-item>	          
	                        				</div>
	                        				<div class="col-md-2">
	                        					<br><br>
	                        					<el-checkbox v-model="fields.enable">Enable</el-checkbox>
	                        				</div>
	                        			</div>
			                        </div> 
			                        <div class="table-responsive">
			                        	<table class="table table-bordered table-hover">
				                        	<thead>
				                        		<tr>
				                        			<th></th>
				                        			<th></th>
				                        			<th></th>
				                        			<th></th>
				                        		</tr>
				                        	</thead>
				                        	<tbody>
				                        		<tr v-for="(row, index) in rows">
				                        			<td>{{ (index ) }}</td>
				                        			<td>{{ row.text }}</td>
				                        			<td>
				                        				
				                        				<el-input
												  		type="text"
												  		autosize
												  		v-model="row.text == 'value' ? fields.choices[row.index].value : fields.choices[row.index].label"
												  		:placeholder="row.placeholder"
												  		:disabled="row.disable"
												  		@input="setChoicesValue(index)">
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
				                        				<a href="javascript:;" type="button" @click="addRow" class="btn btn-success btn-xs">
				                        					<i class="zmdi zmdi-plus"></i> Add fields
				                        				 </a>
				                        			</td>
				                        		</tr> 
				                        	</tbody>
				                        </table>
			                        </div>
			                    
			                      	<br><br>
			                        <button type="button" @click="doSubmit('fields')" class="btn btn-warning">Add new field</button>
			                        <button type="button" class="btn btn-danger" @click="doClearFields('fields')">Clear</button>
			                    </div>
		                    </el-form>  
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> ALL CUSTOM FIELDS</h2>
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
		                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm"  @click="removeConfirmation"
					                	   v-loading.fullscreen.lock="fullscreenLoading"> 
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
		    </div>
		    <pre>{{$data.fields}}</pre>
		</section>
		</transition>
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
				typeField : [
					{value : 'Radio Button', text : 'Radio Button'},
					{value : 'Text Box', text : 'Text Box'},
					{value : 'Date Picker', text : 'Date Picker'}
				],
				fieldGroup : [
					{value : 'Educational Background', text : 'Educational Background'},
					{value : 'Employment Details', text : 'Employment Details'},
					{value : 'Identifcation Number', text : 'Identifcation Number'}
				],
				statusField : [
					{value : 'Enable', text : 'Enable'},
					{value : 'Disable', text : 'Disable'}
				],

				fields : {
					model : '',
					label : '',
					placeholder : '',
					field : '',
					group : '',
					enable : false,
					status : '',
					choices : [
						{ value : '', label : ''}
					]
				},
				rows : [
					{
						text : 'value',
						disable : true,
						icon : true,
						placeholder : '',
						index : 0
	

						
					},
					{
						text : 'label',
						disabled : false,
						icon : false,
						placeholder : 'Enter text here...',
						index : 0,
						
					}
				],
				ctr : 0,
				submitloading : false,
				fullscreenLoading : false,
				rules : {
					group : [
						{required : true, message : "Group field is required"}
					],
					status : [
						{required : true, message : "Status field is required"}
					],

					label : [
						{required : true, message : "Label field is required"}
					],
					placeholder : [
						{required : true, message : "Placeholder field is required"}
					],

					field : [
						{required : true, message : "Field is required"}
					]
				}

			}
		},

		methods : {
			setModelValue(event){
				this.fields.model = this.fields.label
			},

			addRow(){
				if(! this.fields.choices[0].label) return
				this.ctr += 1
				this.fields.choices.push(
					{value : '', label : ''}
				)
				this.rows.push(
					{
						text : 'value',
						disable : true,
						icon : true,
						placeholder : '',
						index : this.ctr
					},
					{
						text : 'label',
						disabled : false,
						icon : false,
						placeholder : 'Enter text here...',
						index : this.ctr
					}
				)
				
			},

			removeRow (index) {
				if(this.fields.choices.length == 1 ) return

					
				this.rows.splice(index, 2)
				this.fields.choices.splice(index-1,2)
				this.ctr -= 1
				
				
			},

			removeConfirmation() {
				this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
          		confirmButtonText: 'OK',
	          	cancelButtonText: 'Cancel',
	          	type: 'warning'
	        	}).then(() => {
	        		this.openFullScreen()
	         		setTimeout(() => {
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

			setChoicesValue (index) {
				this.fields.choices[this.ctr].value = this.fields.choices[this.ctr].label
			},
			doClearFields (fields) {
				 this.$refs[fields].resetFields()
				 this.fields.model = ''
			},
			doSubmit (fields) {
				this.submitloading = true
				this.$refs[fields].validate((valid) => {
					setTimeout(() => {
					if(! valid){
						this.$notify.error({
				          title: 'Opps!',
				          message: 'Something went wrong'
				        })
					}else{
						this.$notify({
					    	title: 'Success',
					        message: 'New user saved',
					        type: 'success'
				        });
					}
					this.submitloading = false
					},3000)
				})
			},
			openFullScreen() {
        		this.fullscreenLoading = true
        		setTimeout(() => {
          			this.fullscreenLoading = false
       			}, 3000)
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