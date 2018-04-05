<template>
    <div class="wrapper">
        <v-head></v-head>
        <show-list :items="items"></show-list>
        </div>
        </template>

        <script>
    import loading from '../../components/Loading';
    import state from '../../components/state.mixin';
    import {api_url} from "../../config/env";
    import vHead from '../../components/Header.vue';

    import showList from '../../components/showLIst'

    export default {
        name:'index',
        data:() => ({
            loading: true,
            items: [{
                item: "asd",
                time: "1919",
                place: "sadsad"
            }],
        }),
        components:{
            vHead,showList
        },
        beforeCreate() {

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
                await this.$http.get(api_url + "/api/new/lists", {headers: header}).then(res => {
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
.actions{
    width:300px;
    float: left;
}
.Box{
    width: 100%;
    height: 100%;
    color: rgb(241,239,245);
    margin: 0;
    padding: 0;
    padding-top: 1.53649rem;
}
</style>