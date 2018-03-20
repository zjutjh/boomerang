<template>
    <div class="release-wrap">
        <v-title :title="'编辑'" :ifBack="true"></v-title>
        <v-edit></v-edit>
    </div>
</template>

<script>
    import vTitle from '../../components/title'
    import vEdit from './edit'
    export default {
        name: "release",
        components: {
            vTitle, vEdit
        }

    }
</script>

<style scoped>

</style>