import VueRouter from 'vue-router'
import Vue from 'vue'
import UserManagement from './components/UserManagement.vue'
import UserGroup from './components/UserGroup.vue'
import Field from './components/Field.vue'

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
		}

	]
})