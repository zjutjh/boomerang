<template>
    <div class="Box">
        <title-item :title="'搜索结果'" :ifBack="true"></title-item>

        <show-list :itemList="items" :style="{'height': '32.0102rem'}"></show-list>
    </div>
</template>

<script>
    import state from '../../components/state.mixin';
    import {api_url} from "../../config/env";
    import showList from '../../components/showLIst'
    import titleItem from '../../components/title'
    import {Loading} from 'element-ui'

    export default {
        name: 'index',
        data:() => ({
            loading: true,
            items: [],
        }),
        components: {
            showList, titleItem
        },
        beforeCreate() {

        },
        mixins: [state],
        watch: {
            '$route': async function () {
                if (this.$route.fullPath.indexOf('search') < 0) {
                    return
                }
                const loading = Loading.service( { fullsreen: true})
                const search_text = this.$route.query.searchText
                await this.$http.get(`${api_url}/api/search?request=${search_text}`).then(res => {
                    if (res.data.code > 0) {
                        this.items = res.data.data.items.data
                        return
                    }
                    this.message(this.data.data.error)
                }).catch(error => {

                })


                loading.close();

            }
        },
        mounted: async function() {
            const loading = Loading.service( { fullsreen: true})
            const search_text = this.$route.query.searchText
            await this.$http.get(`${api_url}/api/search?request=${search_text}`).then(res => {
                if (res.data.code > 0) {
                    this.items = res.data.data.items.data
                    return
                }
                this.message(this.data.data.error)
            }).catch(error => {

            })


            loading.close();

        },
        methods: {
        }


    }

</script>

<style lang="css" scoped>
    .Box{
        width: 100%;
        height: 100%;
        color: rgb(241,239,245);
        margin: 0;
        padding: 0;
        padding-top: 1.53649rem;
    }

</style>