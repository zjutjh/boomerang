<template>
    <div class="main-wrap">
        <v-search></v-search>
        <transition name="main">
            <router-view></router-view>
        </transition>
        <v-tabber></v-tabber>
    </div>
    
</template>

<script>
    import vSearch from '../../components/topper_search'
    import vTabber from '../../components/tabber'
    export default {
        name: "index",
        components: {
            vSearch, vTabber
        }
    }
</script>

<style scoped>

</style>