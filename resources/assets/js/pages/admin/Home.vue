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
    import vHead from '../../components/Header'
    import vSidebar from '../../components/SideBar'
    import vReadme from './Readme'
    export default {
        name: "home",
        components: {
            vHead, vSidebar, vReadme
        }
    }
</script>

<style scoped>

</style>