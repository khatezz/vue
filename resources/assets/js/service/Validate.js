export default function (Vue){
	Vue.validate = {
		checkInputs (data){
			for (let [key,value] of Object.entries(data)){
				if(!value || value == 'SELECT USER GROUP' || value == 'SELECT STATUS'){
					return false;
				}
			}
			return true;
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