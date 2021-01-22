require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import VueSweetalert2 from "vue-sweetalert2";
import VueTheMask from 'vue-the-mask';

var VueScrollTo = require('vue-scrollto');

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueScrollTo);
Vue.use(VueTheMask);

const router = new VueRouter({routes});

const app = new Vue({
    router,
    el: '#app',
});
