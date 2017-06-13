<template>
	<div>
		<section id="content">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="card">
		                    <div class="card-header bgm-blue m-b-20">
		                        <h2> <i class="zmdi zmdi-apps"></i> Questionaire Page</h2>
		                    </div>
		                    <div class="card-body card-padding">
			                    <el-form label-position="top">
				                    <div class="row">
				                    	<div class="col-md-8">
				                    		<div class="form-group">
		                    			 		<el-select v-model="questionairepage.category"  style="width:100%;" size="small" placeholder="Select">
												 	<el-option 
												 		v-for="item in questionaire"
												 		:key="item.value" 
												 		:label="item.text" 
												 		:value="item.value">	 		
												 	</el-option>
												</el-select>
				                    		</div>
				                    	</div>
				                    	<div class="col-md-2">
				                    		<div class="form-group">
		                    			 		<el-select v-model="questionairepage.page"  size="small" placeholder="Select">
												 	<el-option 
												 		v-for="item in pages"
												 		:key="item.value" 
												 		:label="item.text" 
												 		:value="item.value">	 		
												 	</el-option>
												</el-select>
				                    		</div>
				                    	</div>
				                    <!-- 	<div class="col-md-2">
				                    		<div class="form-group">
		                    			 		<el-select  size="small" placeholder="Create new">
												 	<el-option>	 		
												 	</el-option>
												</el-select>
				                    		</div>
				                    	</div> -->
				                    </div>
				                    <div class="container" style="background-color:#EFF2F7; padding:10px;">
					                    <div class="row" >
					                    	<div class="col-md-4">
					                    		<el-input 
					                    			placeholder="Page timer duration" 
					                    			size="small" type="number"
					                    			 v-model="questionairepage.duration">
													<template slot="append">Seconds</template>
												</el-input>
					                    	</div>
					                    	<div class="col-md-8">
					                    		<div class="pull-right" style="padding-left:10px">
					                    			<el-button type="danger" size="small"><i class="zmdi zmdi-close"></i> Delete Changes</el-button>
					                    		</div>
					                    		<div class="pull-right">
					                    			<el-button type="success" size="small" disabled><i class="zmdi zmdi-check"></i> Save Changes</el-button>
					                    		</div>
					                    	</div>
					                    </div>
					                    <hr style="border-top: dotted 2px; color:#D3DCE6;" />
					                    <div class="container">
					                    	 <div class="row">
					                    	<div class="col-md-2">
					                    		<el-tag>{{ questionairepage.criteria }}</el-tag>
					                    	</div>
					                    	<div class="col-md-10">
					                    		<div class="pull-right" style="padding-left:10px;">
					                    			<p>No. of question(s) Created : <el-tag>0</el-tag></p>
					                    		</div>
					                    		<div class="pull-right">
					                    			<p>Minimum no. of question(s) : <el-tag>10</el-tag></p>
					                    		</div>
					                    	</div>
					                    </div>
					                    </div>
					                    <hr style="border-top: dotted 2px; color:#D3DCE6;" />
					                  	<div class="row">
					                    	<question-header v-if="questionairepage.header[0].hasheader"></question-header>
											<question-text v-if="questionairepage.text[0].hastext"></question-text>
											<!-- <questions></questions> -->
										</div>
										 <hr style="border-top: dotted 2px; color:#D3DCE6;" />
										<br>

					                    <div style="background-color:#EFF2F7;">
					                    <questioner-tool 
						                    	v-if="hasQuestion" 
						                    	:hasQuestion="hasQuestion" 
						                    	@closeTool="hasQuestion = $event">
						                    </questioner-tool>
					                    	<center>
					                    		<div v-if="! hasQuestion">
						                    		<p>What would you like to add in this column?</p>
						                    		<el-button type="default" size="small">
						                    			<i class="zmdi"><b>H</b></i> Heading
						                    		</el-button>
					                    			<el-button type="default" size="small">
					                    				<i class="zmdi"><b>A</b></i> Text
					                    			</el-button>
					                    			<el-button type="default" size="small">
					                    				<i class="zmdi zmdi-videocam"></i> Video
					                    			</el-button>
					                    			<el-button type="default" size="small" @click="hasQuestion = true">
					                    				<i class="zmdi zmdi-help-outline"></i> Question
					                    			</el-button>
				                    			</div>
					                    	</center>

					                    </div>
					                </div>
				                </el-form>
				            </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>
	</div>
</template>
<script>
	import QuestionerTool from './QuestionTool'
	import QuestionHeader from './QuestionHeader'
	import QuestionText from './QuestionText'
	import Questions from './Questions'
	export default {
		components : {
			"questioner-tool" : QuestionerTool,
			"question-header" : QuestionHeader,
			"question-text"   : QuestionText,
			"questions" 	  : Questions
		},
		data () {
			return {
				questionaire : [],
				pages : [],
				questionairepage : {},
				hasQuestion : false,
			}
		},
		created () {
			this.questionaire = this.$datainit.getQuestionaireType()
			this.pages = this.$datainit.getPages()
			this.questionairepage = this.$datainit.getQuestionairePage()
		}
	}
</script>