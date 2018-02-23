import Vue from 'vue';
import router from './router';
import App from './App.vue';
import Vr from 'vue-resource'
import './config/rem'
Vue.use(Vr);
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name=csrf-token]').getAttribute('content'); 开发注释





new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {App},

});
