<template>
    <div>
        <div v-for="item in items" :key="item.id">
            <li>{{ item.title}}</li>
            <li>{{ item.name}}</li>
            <li>{{ item.time}}</li>
            <li></li>
            <img :src="item.images[0]" alt="">
        </div>

        <loding :loding="loding"></loding>
    </div>
</template>

<script>
    import loding from '../../components/Loading'
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
                const _this = this;
                await this.$http.post(api_url + '/api/auto_login', data).then(res => {
                    if (res.code > 0) {
                        this.vuex = res.data;
                        return;
                    }

                    this.message(res.error, 2000);

                });
            },
            async get_items() {
                const header = {
                    'Authorization': "bearer " + this.vuex.token
                }
                await this.$http.get(api_url + "/api/new/lists", {headers:header}).then(res => {
                    if (res.code > 0) {
                        this.items = res.data;
                        return;
                    }

                    this.message(res.error, 2000);
                })
            }
        }


    }

</script>

<style lang="css" scoped>


</style>