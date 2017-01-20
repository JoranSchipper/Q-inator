
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const VueRouter = require('vue-router');
Vue.use(VueRouter);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './components/App.vue';
import IndexView from './components/views/Index.vue';
import TestView from './components/views/Test.vue';

let router = new VueRouter({
	routes: [
		{
			path: '/',
			component: IndexView
		},
		{
			path: '/test',
			component: TestView
		}
	]
});

new Vue({
	el: '#app',
	render: h => h(App),
	router
});