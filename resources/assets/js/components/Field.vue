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
		                    <div class="card-body card-padding">
		                        <div class="conatiner">
		                            <div class="input-group fg-float">
		                                <span class="input-group-addon"><i class="zmdi zmdi-apps"></i></span>
		                                <div class="fg-line">
		                                      <vue-select class="vue-select2" 
								                :options="fieldGroup" v-model="fields.group"
								                :searchable="true" language="en-US">
										       </vue-select>
		                                   
		                                </div>
		                            </div> 
		                        </div>
		                        <br>
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="zmdi zmdi-collection-text"></i></span>
		                            <div class="fg-line">
		                                <input type="text" class="form-control" disabled="" placeholder="Model Name" v-model="fields.model">
		                                    
		                            </div>
		                        </div>

		                        <br>
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="zmdi zmdi-collection-text"></i></span>
		                                <input type="text" 
		                                	   class="form-control" 
		                                	   placeholder="Label Name" 
		                                	   v-model="fields.label"
		                                	   @input="setModelValue">
		                        </div>

		                        <br>
		                        <div class="input-group">
		                            <span class="input-group-addon"><i class="zmdi zmdi-collection-text"></i></span>
		                            <div class="fg-line">
		                                <input type="text"  class="form-control" placeholder="Placeholder" v-model="fields.placeholder">
		                                    
		                            </div>
		                        </div>
		                        <br>
                        		<div class="input-group fg-float">
			                       	<span class="input-group-addon"><i class="zmdi zmdi-apps"></i></span>
	                               	<vue-select class="vue-select2" name="select2"
					                :options="typeField" v-model="fields.field"
					                :searchable="true" language="en-US">
							        </vue-select>
		                        </div> 

		                        <br><br>
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
		                        			<td></td>
		                        			<td>{{ row.text }}</td>
		                        			<td><input type="text" class="form-control" :disabled="row.disable" :placeholder="row.placeholder"></td>
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
		                        <br><br>
		                        <div class="input-group fg-float">
			                       	<span class="input-group-addon"><i class="zmdi zmdi-apps"></i></span>
	                               	<vue-select class="vue-select2" name="select2"
					                :options="statusField" v-model="fields.status"
					                :searchable="true" language="en-US">
							        </vue-select>
		                        </div> 
		                        <br><br>
		                        <button type="button" class="btn btn-warning">Add new field</button>
		                        <button type="button" class="btn btn-danger">Clear</button>
		                        
		                    </div>
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
		                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm"  > 
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
		    <pre>{{$data.rows}}</pre>
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
					'Radio Button',
					'Text Box',
					'Date Picker'
				],
				fieldGroup : [
					'Educational Background',
					'Employment Details',
					'Identifcation Number'
				],
				statusField : [
					'Enable',
					'Disable'
				],

				fields : {
					'model' : '',
					'label' : '',
					'placeholder' : '',
					'field' : 'Select Type Field',
					'group' : 'Select Field Group',
					'status' : 'Select Status'
				},
				rows : [
					{
						text : 'value',
						disable : true,
						icon : true,
						placeholder : ''
					},
					{
						text : 'label',
						disabled : false,
						icon : false,
						placeholder : 'Enter text here...'
					}
				],

				list : [
					{}
				],
				ctr : 0,
			}
		},

		methods : {
			setModelValue(event){
				this.fields.model = event.target.value;
			},

			addRow(){

				this.rows.push(
					{
						text : 'value',
						disable : true,
						icon : true,
						placeholder : ''
					},
					{
						text : 'label',
						disabled : false,
						icon : false,
						placeholder : 'Enter text here...'
					}
				)
				this.ctr += 1
			},

			removeRow (index) {
				if(this.ctr == 0){
					return
				}
				this.rows.splice(index, 2)
				this.ctr -= 1
				
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