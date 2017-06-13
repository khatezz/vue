
import Vue from 'vue'


require('./bootstrap');

const app = new Vue({
    el: '#usermanagement',
    data() {
    	return {
    		user : {
    			firstname : 'SAMPLE'
    		}
    	}
    }
});