<template>
    <div class="wrapper">
        <v-head></v-head>
        <v-sidebar></v-sidebar>
        <div class="content">
            <show-list :items="items"></show-list>
        </div>
    </div>
</template>

<script>
    import loading from '../../components/Loading';
    import state from '../../components/state.mixin';
    import {api_url} from "../../config/env";

    import vHead from '../../components/Header';
    import vSidebar from '../../components/SideBar';
    import showList from '../../components/showLIst';

    export default {
        name: "home",
        /*data:() => ({
            loading: true,
            items: [],
        }),*/
        components: {
            vHead, vSidebar,showList
        },
        /*beforeCreate() {

        },
        mixins: [state],
        mounted() {
            const loading = this.$loading( { fullsreen: true})
            this.get_items();
            loading.close();
        },
        methods: {
            async get_items() {
                const header = {
                    'Authorization': "bearer " + this.getToken()
                };
                await this.$http.get(api_url + "/api/new/lists", {headers:header}).then(res => {
                    if (res.code > 0) {
                        this.items = res.data;
                        return;
                    }

                    this.message(res.error, 2000);
                })
            },
        }*/
    }
</script>

<style scoped>

</style>