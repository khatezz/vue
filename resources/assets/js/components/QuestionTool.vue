<template>
	<div>
		<el-card class="box-card"  >
		  	<div class="row" slot="header">
		  		<div class="col-md-2">
		  			<h6>Question Tool</h6>
		  		</div>
		  		<div class="col-md-10">
		  			<div style="padding-left:35px;">
		  				<el-tooltip content="Save" placement="top" effect="light">
			  				<button class="btn btn-sm pull-right btn-primary">
			  					<i class="zmdi zmdi-check"></i>
			  				</button>
			  			</el-tooltip>
		  			</div>
			    	<div style="padding-right:35px;">
			    		<el-tooltip content="Cancel" placement="top" effect="light">
				    		<button class="btn btn-sm pull-right btn-default" @click="closeTool">
				    			<i class="zmdi zmdi-close"></i>
				    		</button>
				    	</el-tooltip>
			    	</div>
		  		</div>
		  	</div>
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<el-select v-model="font"  size="small" placeholder="Select font">
						 	<el-option 
						 		v-for="item in fontsize"
						 		:key="item.value" 
						 		:label="item.text" 
						 		:value="item.value">	 		
						 	</el-option>
						</el-select>
					</div>
					<div class="col-md-3">
						<el-select v-model="type"  size="small" placeholder="Question type">
						 	<el-option 
						 		v-for="item in questiontype"
						 		:key="item.value" 
						 		:label="item.text" 
						 		:value="item.value">	 		
						 	</el-option>
						</el-select>
					</div>
					<div class="col-md-2">
						<button class="btn btn-default btn-md">
							<strong><i class="zmdi zmdi-format-align-left"></i></strong>
						</button>
						<button class="btn btn-default btn-md">
							<i class="zmdi zmdi-format-align-center"></i>
						</button>
						<button class="btn btn-default btn-md">
							<i class="zmdi zmdi-format-align-right"></i>
						</button>
					</div>
					<div class="col-md-2">
						<button class="btn btn-default btn-md">
							<strong><i class="zmdi zmdi-format-underlined"></i></strong>
						</button>
						<button class="btn btn-default btn-md">
							<i class="zmdi zmdi-format-italic"></i>
						</button>
						<button class="btn btn-default btn-md">
							<i class="zmdi zmdi-format-bold"></i>
						</button>
					</div>
				</div>
				<br>
				<el-input placeholder=""  value="question" size="small" type="text">
					<template slot="prepend">Question Sentence</template>
				</el-input>
				<br><br>
				<div class="container" v-if="hasChoices">
					<el-input placeholder=""  value="Choice letter A" size="small" type="text">
						<template slot="prepend">A.</template>
					</el-input>
					<br><br>
				</div>
				
				<div>
					<button class="btn btn-primary pull-right" @click="hasChoices = true"> 
						<i class="zmdi zmdi-plus"></i> Add Choices
					</button>
				</div>
			</div>								
		</el-card>
	</div>
</template>


<script>
	export default{
		data () {
			return {
				fontsize : [
					{value : '6px' , text : 'A 6px'},
					{value : '8px' , text : 'A 8px'},
					{value : '10px' , text : 'A 10px'},
					{value : '12px' , text : 'A 12px'},
					{value : '14px' , text : 'A 14px'},
					{value : '16x' , text : 'A 16px'},
					{value : '18px' , text : 'A 18px'}
				],
				font : '',
				type : '',
				questiontype : [
					{value : 'Single Selection' , text : 'Single Selection'},
					{value : 'Fill in the blank' , text : 'Fill in the blank'},
					{value : 'Multiple Selection' , text : 'Multiple Selection'},
				],
			}
		},
		props : ["hasQuestion"],
		methods : {
			closeTool () {
				this.$emit('closeTool',false)
			}
		}
	}
</script>