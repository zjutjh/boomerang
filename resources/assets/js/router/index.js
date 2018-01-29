import Vue from 'vue';
import Router from 'vue-router';

import tofind from '../pages/main/tofindlist.vue'
import found from '../pages/main/foundlist.vue'
import search from '../pages/main/search.vue'
import searchresult from '../pages/main/searchresult.vue'
import detail from '../pages/main/detail.vue'
import mine from '../pages/personal/mine.vue'
import mydetail from '../pages/personal/mydetail.vue'
import edit from '../pages/edit.vue'


Vue.use(Router)

export default new Router({

    routes: [{
        path: '/pages/main',
        name: 'tofind',
        component: tofind,
        children: [
            {
                path: '/pages/main',
                component: detail,
            }]
    }, {
        path: '/pages/main',
        name: 'found',
        component: found,
        children: [
            {
                path: '/pages/main',
                component: detail,
            }]
    }, {
        path: '/pages/main',
        name: 'search',
        component: search,
        children: [
            {
                path: '/pages/main',
                component: searchresult,
                children: [
                    {
                        path: '/pages/main',
                        component: detail,
                    }]
            }]
    },{
        path: '/pages/personal',
        name: 'mine',
        component: mine,
        children: [
            {
                path: '/pages/personal',
                component: mydetail,
            }]
    },{
        path: '/pages/main',
        name: 'edit',
        component: edit,
    }]
})