<template>
    <div class="wrapper">
        <v-head></v-head>
        <v-sidebar></v-sidebar>
        <div class="content">
            <v-basetable></v-basetable>
        </div>
    </div>
</template>

<script>
    import vHead from '../../components/Header.vue';
    import vSidebar from '../../components/SideBar.vue';
    import vBasetable from '../../pages/admin/BaseTable.vue';
    export default {
        name: "sad",
        components:{
            vHead, vSidebar, vBasetable
        }
    }
</script>
<style scoped>

</style>