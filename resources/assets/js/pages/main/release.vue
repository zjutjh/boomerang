<template>
    <div class="release-wrap">
        <v-title :title="'编辑'" :ifBack="true"></v-title>
        <v-edit @onRelease="releaseResult"></v-edit>
    </div>
</template>

<script>
    import vTitle from '../../components/title'
    import vEdit from './edit'
    export default {
        name: "release",
        components: {
            vTitle, vEdit
        },
        methods: {
            releaseResult: function (item_id) {
                this.$router.push({
                    name: 'detail',
                    query: {
                        item_id: item_id
                    }
                })

            }
        }


    }
</script>

<style scoped>
    .release-wrap {
        height: 40.1438rem;
        overflow: scroll;
    }


</style>