<template>
	<div>
	   <transition name="fade">
	        <div class="col-md-6" v-if="update">
	            <div class="card">
	                <div class="card-header bgm-blue m-b-20">
	                    <h2> <i class="zmdi zmdi-edit"></i> UPDATE USER GROUPS</h2>
	                </div>

	                <div class="card-body card-padding">
	                    <div class="conatiner">
	                        <div class="input-group">
	                            <span class="input-group-addon"><i class="zmdi zmdi-accounts"></i></span>
	                     
	                                <input type="text" :autofocus="update" class="form-control" placeholder="Group Name" v-model="name">
	                               
	                      
	                        </div> 
	                    </div>
	                    <br>
	                    <div class="input-group">
	                        <span class="input-group-addon"><i class="zmdi zmdi-collection-text"></i></span>
	                            <textarea class="form-control auto-size" placeholder="Description" v-model="description"></textarea>
	                    </div>
	                    <br><br>
	                    <button type="button" class="btn btn-warning">Update user group</button>
	                    <button type="button" class="btn btn-danger" @click="cancelupdate">Cancel</button>
	                </div>
	            </div>
	        </div>
    	</transition>
	</div>
</template>

<script>
	export default{
		data () {
			return{
				name : '',
				description : ''
			}
		},
		props : ['update'],
		
		methods : {
			cancelupdate () {
				this.$emit('cancelUpdate',false)
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