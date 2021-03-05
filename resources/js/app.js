import App from './App.vue';
import Vue from 'vue';

import vuetify from './plugins/vuetify';
import router from './router';
import store from './store';

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    store: store,
    router: router,
    vuetify,
    render: h => h(App)
});
