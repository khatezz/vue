import router from './routes.js'
import Validator from './service/Validate.js'
import Helper from './Service/Helper.js'
import DataInit from './Service/DataInit'
import VToolTip from 'v-tooltip'
import ElementUI from 'element-ui'
import VueForm from 'vue-form'
import VueResource from 'vue-resource'
import VueNotifications from 'vue-notifications'
import CollapseTransition from 'element-ui/lib/transitions/collapse-transition';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')
require('jquery')
window.Vue = require('vue');

Vue.use(VueResource);
Vue.use(Validator)
Vue.use(VToolTip)
Vue.use(ElementUI)
Vue.use(Helper)
Vue.use(VueForm)
Vue.use(DataInit)
Vue.component(CollapseTransition.name, CollapseTransition)

Vue.http.options.root = 'http://localhost:8000'




Vue.use(VueNotifications)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('header-view', require('./components/Header.vue'));
Vue.component('sidebar-view', require('./components/Sidebar.vue'));


const app = new Vue({
    el: '#app',
    router
});
