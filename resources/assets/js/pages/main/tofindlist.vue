<template>
    <div class="Box">
        <show-list v-bind:itemList="items"></show-list>
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
        }),
        components: {
          showList
        },
        beforeCreate() {

        },
        mixins: [state],
        mounted: async function() {
            const loading = this.$loading( { fullsreen: true})
            console.log(!this.getToken())
            if (!this.getToken()) {
                await this.login();
                this.$http.defaults.headers['Authorization'] = 'bearer ' + this.getToken()
            }


            await this.get_items();


            loading.close();
        },
        methods: {
            async login() {
                const data = {
                    "openid": "oIRN_t50catBXGiM6I-ZbXofVGZ8"
                };
                await this.$http.post(api_url + '/api/auto_login', data).then(res => {
                    console.log(res.data.code > 0)
                    if (res.data.code > 0) {
                        this.setState(res.data.data)
                        return
                    }

                    this.message(res.data.error, 2000);

                });
            },

            async get_items() {
                const header = {
                    'Authorization': "bearer " + this.getToken()
                };
                await this.$http.get(api_url + "/api/lost/lists", {headers:header}).then(res => {
                    if (res.data.code > 0) {
                        this.items = res.data.data.items;
                        console.log(this.items)
                        return;
                    }

                    this.message(res.data.error, 2000);
                })
            },


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