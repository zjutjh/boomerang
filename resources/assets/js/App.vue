<template>
    <div id="app">
            <router-view></router-view>
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

    #app {
        background: #f0eff5;
        overflow: scroll;
    }
</style>