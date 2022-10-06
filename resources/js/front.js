/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');

import App from './components/App.vue'
//  Router import
import router from './router.js';
const root = new Vue({
    router,
    el: '#root',
    render: h => h(App)
})
