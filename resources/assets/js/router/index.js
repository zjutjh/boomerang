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
//import admin from '../pages/admin/admin.vue'
//import admindetail from '../pages/admin/admindetail.vue'
//import adminedit from '../pages/admin/adminedit.vue'
import adminlogin from '../pages/admin/adminlogin.vue'
import Readme from '../pages/admin/Readme.vue'
import Home from '../pages/admin/Home.vue'
import BaseTable from '../pages/admin/BaseTable.vue'

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
        path: '/',
        component: adminlogin,
        redirect: '/adminlogin'
    },
    {
        path: '/readme',
        compoment: Home,
        children:[
            {
                path: '/',
                compoment: Readme,
            },
            {
                path: '/basetable',
                compoment: BaseTable,
            },
        ]
    },
    {
        path: '/adminlogin',
        component: adminlogin,
    },
    ]
})