import Vue from 'vue';
import Router from 'vue-router';

import tofind from '../pages/main/tofindlist.vue'
import found from '../pages/main/foundlist.vue'
import search from '../pages/main/search.vue'
import searchresult from '../pages/main/searchresult.vue'
import detail from '../pages/main/detail.vue'
import mine from '../pages/personal/mine.vue'
import mydetail from '../pages/personal/mydetail.vue'
import edit from '../pages/main/edit.vue'
import admin from '../pages/admin/admin.vue'
//import admindetail from '../pages/admin/admindetail.vue'
import adminedit from '../pages/admin/adminedit.vue'
import adminlogin from '../pages/admin/adminlogin.vue'
import Readme from '../pages/admin/Readme.vue'
import BaseTable from '../pages/admin/BaseTable.vue'
import home from '../pages/admin/Home'
import test from '../components/showLIst'

Vue.use(Router)


export default new Router({

    routes: [{
        path: '/pages/main/tofind',
        name: 'tofind',
        component: tofind,
    }, {
        path: '/pages/main/found',
        name: 'found',
        component: found,
    }, {
        path: '/pages/main/search',
        name: 'search',
        component: search,
    },{
        path: '/pages/personal/mine',
        name: 'mine',
        component: mine,
    },{
        path: '/pages/main/edit',
        name: 'edit',
        component: edit,
    },
    {
        path: '/adminlogin',//管理员登陆
        component: resolve => require(['../pages/admin/adminlogin.vue'], resolve),
    },
    {
        path: '/home',//超管首页
        // compoment: resolve => require(['../pages/admin/home.vue'], resolve),
        component: home
    },
    {
        path: '/sad',//超管看管理员们
        compoment: resolve => require(['../pages/admin/sad.vue'], resolve),
    },
    {
        path: '/admin',//普通管理页面
        compoment: resolve => require(['../pages/admin/admin.vue'], resolve),
    }, {
        path: '/test',
        component: test
        }
    ]
})