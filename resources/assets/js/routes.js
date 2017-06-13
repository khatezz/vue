import VueRouter from 'vue-router'
import Vue from 'vue'
import UserManagement from './components/UserManagement.vue'
import UserGroup from './components/UserGroup.vue'
import Field from './components/Field.vue'
import FieldGroup from './components/FieldGroup'
import QuestionaireType from './components/QuestionaireType'
import QuestionairePage from './components/QuestionairePage'
Vue.use(VueRouter);


export default new VueRouter({
	routes : [
		{
			path : '/',
			component : UserManagement
		},
		{
			path : '/usermanagement',
			component : UserManagement
		},
		{
			path : '/usergroup',
			component : UserGroup
		},
		{
			path : '/field',
			component : Field
		},
		{
			path : '/fieldgroup',
			component : FieldGroup
		},
		{
			path : '/questionairetype',
			component : QuestionaireType
		},
		{
			path : '/questionairepage',
			component : QuestionairePage
		}

	]
})