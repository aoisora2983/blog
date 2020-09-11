require('./bootstrap');
import Vue from 'vue'
import router from './router'
import store from './store/index'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css'

window.Vue = require('vue');

Vue.component('index', require('./components/pages/Index.vue').default);
Vue.use(Vuetify);

new Vue({
    el: '#app',
    router: router,
    store,
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi',
        },
    }),
});
