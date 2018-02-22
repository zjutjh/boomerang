<template>
    <div>
        <button @click=""></button>
    </div>
</template>

<script>
    import loding from '../../components/Loading'
    import state from '../../components/state.mixin'
    import {api_url} from "../../config/env";

    export default {
        name: 'index',
        data:() => ({
           loading: true,
           items: [],
        }),
        components: {
          loding
        },
        beforeCreate() {

        },
        mixins: [state],
        mounted() {
            this.loading = true;
            this.login();
            this.get_items();
            this.loading = false;
        },
        methods: {
            async login() {
                const data = {
                    "openid": "xxxx"
                }
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
                }
                await this.$http.get(api_url + "/api/new/lists", {headers:header}).then(res => {
                    if (res.code > 0) {
                        this.items = res.data;
                        return;
                    }

                    this.message(res.error, 2000);
                })
            },


        }


    }

</script>

<style lang="css" scoped>


</style>