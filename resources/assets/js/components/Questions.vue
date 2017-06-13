<template>
	<div class="col-md-12">
		<h5>1. The plane_________ in at seven O'clock last night.</h5>
		<div class="container">
			<div>
				<div class="radio">
					<el-radio class="radio" v-model="answer" label="fled">fled</el-radio>
				</div>
				<div class="radio">
					<el-radio class="radio" v-model="answer" label="flew">flew</el-radio>
				</div>
				<div class="radio">
					<el-radio class="radio" v-model="answer" label="has flown">has flown</el-radio>
				</div>
				<div class="radio">
					<el-radio class="radio" v-model="answer" label="had flown">had flown</el-radio>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		
	}
</script>