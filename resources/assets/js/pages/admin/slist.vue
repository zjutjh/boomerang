<template>
    <div class="wrapper">
        <v-head></v-head>
        <v-sidebar></v-sidebar>
        <show-list :items="items"></show-list>
    </div>

</template>

<script>
    import loading from '../../components/Loading';
    import state from '../../components/state.mixin';
    import {api_url} from "../../config/env";
    import vHead from '../../components/Header'
    import vSidebar from '../../components/SideBar'
    import showList from '../../components/showLIst'
    export default {
        name: "slist",
        components: {
            vHead, vSidebar,showList
        }
    }
</script>

<style scoped>

</style>