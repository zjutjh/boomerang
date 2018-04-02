<template>
    <div class="mine-wrap">
        <v-title :title="'我的发布'" :ifBack="false"></v-title>
        <show-list :itemList="items" isMine="true" @changePage="changePage" :page="page" :url="`/api/mine/lists/${this.getUser().id}`" :style="{'height': 'calc(100vh - 4.694rem - 3.41rem - 1.53649rem - 6.61545rem)'}"></show-list>
    </div>
</template>

<script>

    import vTitle from '../../components/title'
    import showList from '../../components/showLIst'
    import {Loading} from 'element-ui'
    import state from "../../components/state.mixin";
    import {api_url} from "../../config/env";

    export default {
        name: "mine",
        data: () => ({
            items: [],
            page: 0
        }),
        mixins: [state],
        mounted: async function () {
            const loading = Loading.service()
            await this.$http.get(`${api_url}/api/mine/lists/${this.getUser().id}`).then(res => {
                if (res.data.code > 0) {
                    this.items = res.data.data.items
                    return
                }
                this.message(this.data.data.error)
            }).catch(error => {

            })


            loading.close();
        },
        components: {
            vTitle, showList
        },
        methods: {
            changePage(page, items) {
                this.items = [...this.items, ...items]
                this.page = page

            }
        }

    }
</script>

<style scoped>

</style>