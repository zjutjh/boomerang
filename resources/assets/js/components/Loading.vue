<template>
    <div>
        <div v-show="loading"></div>
    </div>
    
</template>

<script>
    export default {
        name: "loading",
        props: ['loading']
    }
</script>

<style scoped>

</style>