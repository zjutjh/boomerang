import Vue from 'vue';

import router from './router';
import App from './App.vue';
import Vr from 'vue-resource'
import './config/rem'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import './common/common.css'
import jhconfirm from './components/confirm'
import message from './components/message'
Vue.use(Vr);

Vue.use(jhconfirm)
Vue.use(message)
Vue.http.options.emulateJSON = true;
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name=csrf-token]').getAttribute('content'); 开发注释

Vue.use(ElementUI)

new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: {App},
});
