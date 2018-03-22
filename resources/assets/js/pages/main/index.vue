<template>
    <div class="main-wrap">
        <v-search></v-search>
        <transition name="main">
            <router-view></router-view>
        </transition>
        <v-tabber></v-tabber>
    </div>
    
</template>

<script>
    import vSearch from '../../components/topper_search'
    import vTabber from '../../components/tabber'
    export default {
        name: "index",
        components: {
            vSearch, vTabber
        },
        mounted() {
            const loading = this.$loading( { fullsreen: true})
            this.login();
            this.$http.defaults.headers['Authorization'] = 'bearer ' + this.getToken()
            loading.close();
        },
        methods: {
            async login() {
                const data = {
                    "openid": "xxxx"
                };
                await this.$http.post(api_url + '/api/auto_login', {
                    params: data
                }).then(res => {
                    if (res.data.code > 0) {
                        this.setState(res.data);
                        return;
                    }
                    this.message(res.error, 2000);

                });
            },
        }
    }
</script>

<style scoped>

</style>