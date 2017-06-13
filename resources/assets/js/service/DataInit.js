export default function (Vue){
	let questionaire = [
		{value : 'Non-Voice', text : 'Non-Voice'},
		{value : 'Voice', text : 'Voice'},
		{value : 'Software Services', text : 'Software Services'}
	]

	let pages = [
		{value : '1', text : '1'},
		{value : '2', text : '2'}
	]

	let questionirepage = {
		category : "",
		page : 0,
		duration : 0,
		criteria : "Sample",
		passing : 0,
		header : [
			{hasheader : false},
			{isitalic : false},
			{isbold : false},
			{isunderlined : false},
			{alignment : ""},
			{size : ""},
			{value : ""}
		],
		text : [
			{hastext : false},
			{size : ""},
			{alignment : ""},
			{value : ""}
		],

		video : [
			{hasvideo : false},
			{alignment : ""},
			{value : ""}
		],
		question : [
			{questiontype : ""},
			{value : ""},
			{size : ""},
			{alignment : ""},
			{isunderlined : false},
			{isitalic : false},
			{isbold : false},
			{
				choices : [
				]
			},
			{
				answers :[
					{filleintheblank : ""},
					{singleselection : ""},
					{
						multipleselection : [
							{letter : ""},
						]
					}
				]
			}
		]
	}

	Vue.datainit = {
		getQuestionaireType () {
			return questionaire
		},

		getPages () {
			return pages
		},

		getQuestionairePage () {
			return questionirepage
		}

	}

	Object.defineProperties(Vue.prototype, {
		$datainit : {
			get : () => {
				return Vue.datainit
			}
		}
	})
}