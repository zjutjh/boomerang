<template>
    <div class="wrapper">
        <v-head></v-head>
        <v-sidebar></v-sidebar>
        <div class="content">
            <v-readme></v-readme>
        </div>
    </div>
</template>

<script>
    import vHead from '../../components/Header.vue';
    import vSidebar from '../../components/SideBar.vue';
    import vReadme from '../../pages/admin/Readme.vue';
    export default {
        components:{
            vHead, vSidebar, vReadme
        }
    }
</script>
