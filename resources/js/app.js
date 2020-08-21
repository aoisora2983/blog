require('./bootstrap');
import BootstrapVue from 'bootstrap-vue';
import store from './store/index'
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css'

window.Vue = require('vue');

Vue.component('develop-simulator', require('./components/pages/DevelopSimulator.vue').default);
Vue.use(BootstrapVue);
Vue.use(Vuetify);

const app = new Vue({
    store,
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi',
        },
    }),
}).$mount('#app');
