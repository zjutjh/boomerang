import Vue from 'vue';
import router from './router';
import App from './App.vue';
import Vr from 'vue-resource'

Vue.use(Vr);





new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {App},

});
