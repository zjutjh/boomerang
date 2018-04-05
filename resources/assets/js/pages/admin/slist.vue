<template>
    <div class="wrapper">
        <v-head></v-head>
        <v-sidebar></v-sidebar>
        <div class="content">
            <p>123</p>
        </div>
    </div>

</template>

<script>
    import vHead from '../../components/Header'
    import vSidebar from '../../components/SideBar'
    export default {
        name: "slist",
        components: {
            vHead, vSidebar
        }
    }
</script>

<style scoped>

</style>