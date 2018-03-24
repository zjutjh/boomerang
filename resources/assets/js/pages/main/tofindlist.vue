<template>
    <div class="Box">
        <show-list v-bind:itemList="items" @changePage="changePage" :page="page" url="/api/lost/lists"></show-list>
    </div>
</template>

<script>
    import state from '../../components/state.mixin';
    import {api_url} from "../../config/env";
    import showList from '../../components/showLIst'

    export default {
        name: 'index',
        data:() => ({
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
        mounted: async function() {
            // const loading = this.$loading( { fullsreen: true})
            console.log(!this.getToken())
            if (!this.getToken()) {
                await this.login();
                this.$http.defaults.headers['Authorization'] = 'bearer ' + this.getToken()

            }


            await this.getItems(this.page);


            // loading.close();
        },
        methods: {
            async login() {
                const data = {
                    // "openid": "oZ_USxJPH5fL5_Mv3oNY9MG-8Ukc"
                    "openid": document.querySelector('meta[name=openid]').getAttribute('content')
                };
                await this.$http.post(api_url + '/api/auto_login', data).then(res => {
                    console.log(res.data.code > 0)
                    if (res.data.code > 0) {

                        this.setState(res.data.data)
                        this.message('自动登陆成功', 'el-icon-check')
                        return
                    }

                    if (res.data.code === -100) {
                        this.message(res.data.error)
                        window.location.href = 'https://server.wejh.imcr.me/oauth/wechat/login'
                        return

                    }

                    this.message(res.data.error, 2000);

                });
            },

            async getItems() {

                await this.$http.get(api_url + "/api/lost/lists").then(res => {
                    if (res.data.code > 0) {
                        this.items = [...this.items, ...res.data.data.items];
                        // this.page += 1
                        console.log(this.items)
                        return;
                    }

                    this.message(res.data.error, 2000);
                    setTimeout(() => {
                        window.close()
                    }, 3000)
                }).catch( error => {

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
.Box{
    width: 100%;
    height: auto;
    color: rgb(241,239,245);
    margin: 0;
    padding: 0;
    padding-top: 1.53649rem;
    z-index: -10;
}

</style>