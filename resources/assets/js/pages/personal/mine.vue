<template>
    <div class="mine-wrap">
        <v-title :title="'我的发布'" :ifBack="false"></v-title>
        <show-list :item="item"></show-list>
    </div>
</template>

<script>

    import vTitle from '../../components/title'
    import showList from '../../components/showLIst'
    export default {
        name: "mine",
        data: () => ({
           item: {}
        }),
        components: {
            vTitle, showList
        }

    }
</script>

<style scoped>

</style>