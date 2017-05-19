export default function (Vue) {
	Vue.helper = {
		clearFields(data) {
			for(let [key,value] of Object.entries(data)){
				console.log(key)

				data.key = ''

				console.log(data.key)

				break
			}

			return data
		}
	}

	Object.defineProperties(Vue.prototype,{
		$helper : {
			get : () => {
				return Vue.helper
			}
		}
	})
}