require('./bootstrap');

import Vue from 'vue'


import app from './views/app.vue';
import router from './router';

new Vue({
    el: '#app',
    router,
    components: { app }
});
