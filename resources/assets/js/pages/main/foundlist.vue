<template>
    <div class="Box">
        <show-list :items="items"></show-list>
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
        mounted() {
            const loading = this.$loading( { fullsreen: true})
            this.login();
            this.get_items();
            loading.close();
        },
        methods: {
            async login() {
                const data = {
                    "openid": "xxxx"
                };
                await this.$http.post(api_url + '/api/auto_login', data).then(res => {
                    if (res.code > 0) {
                        this.setState(res.data);
                        return;
                    }
                    this.message(res.error, 2000);

                });
            },
            async get_items() {
                const header = {
                    'Authorization': "bearer " + this.getToken()
                };
                await this.$http.get(api_url + "/api//lists", {headers:header}).then(res => {
                    if (res.code > 0) {
                        this.items = res.data;
                        return;
                    }

                    this.message(res.error, 2000);
                }).catch( error => {
                    console.log(error)
                })
            },


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