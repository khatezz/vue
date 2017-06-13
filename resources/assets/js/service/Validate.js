export default function (Vue){
	Vue.validate = {
		validateData(fields){

			let isvalid = false
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

			        isvalid = true
				}
				this.submitloading = false
				},3000)
			})

			return isvalid
		}
	}

	Object.defineProperties(Vue.prototype,{
		$validate : {
			get : () => {
				return Vue.validate
			}
		}
	})
}