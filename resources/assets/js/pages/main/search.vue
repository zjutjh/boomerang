<template>
    <div class="Box">
        <title-item :title="'搜索结果'" :ifBack="true"></title-item>

        <show-list :items="items"></show-list>
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
        mounted: async function() {
            const loading = Loading.service( { fullsreen: true})
            const search_text = this.$route.query.searchText
            const header = {
                'Authorization': "bearer " + this.getToken()
            };



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