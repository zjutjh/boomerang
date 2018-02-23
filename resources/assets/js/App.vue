<template>
    <div id="app">
        <transition name="fade">
            <router-view></router-view>
        </transition>

    </div>

</template>

<script>
    export default {
        data() {
            return {

            }
        },
        name: "App"
    }

</script>

<style scoped>
    @import "../css/main.css";
    @import "../css/color-dark.css";
</style>