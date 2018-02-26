<template>
    <div class="wrapper">
        <p>123</p>
        <v-head></v-head>
        <v-sidebar></v-sidebar>
        <div class="content">
            <transition name="move" mode="out-in"><router-view></router-view></transition>
        </div>
    </div>

<script>
    import vHead from '../../components/Header.vue';
    import vSidebar from '../../components/SideBar.vue';
    export default {
        components:{
            vHead, vSidebar
        }
    }
</script>