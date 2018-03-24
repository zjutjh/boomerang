<template>
    <div class="Box">
        <show-list :itemList="items" @changePage="changePage" :page="page" url="/api/find/lists"></show-list>
    </div>
</template>

<script>
    import state from '../../components/state.mixin';
    import {api_url} from "../../config/env";
    import showList from '../../components/showLIst'

    export default {
        name: 'index',
        data: () => ({
            loading: true,
            items: [],
            page: 0
        }),
        components: {
            showList
        },
        beforeCreate() {

        },
        mixins: [state],
        mounted: async function () {
            const loading = this.$loading({fullsreen: true})
            await this.get_items();
            loading.close();
        },
        methods: {
            async get_items() {
                await this.$http.get(api_url + "/api/find/lists").then(res => {
                    if (res.data.code > 0) {
                        this.items = res.data.data.items;
                        return;
                    }

                    this.message(res.data.error, 2000);
                }).catch(error => {
                    console.log(error)
                })
            },
            changePage(page, items) {
                this.items = [...this.items, ...items]
                this.page = page

            }


        }


    }

</script>

<style lang="css" scoped>
    .Box {
        width: 100%;
        height: 100%;
        color: rgb(241, 239, 245);
        margin: 0;
        padding: 0;
        padding-top: 1.53649rem;
    }

</style>