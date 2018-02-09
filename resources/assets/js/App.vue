<template>
    <div id="app">
        <transition name="fade">
            <router-view></router-view>
        </transition>

    </div>

</template>

<script>
    export default {
        data: {
            message:'hellooooo!'
        },
        name: "App"
    }

</script>

<style scoped>

</style>