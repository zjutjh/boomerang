<template>
    <div class="detail-wrap">
        <v-title :title="'物品详情'" :ifBack="true"></v-title>
        <div class="detail-main">
            <div class="detail-content">
                <div class="content-item">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别: {{ item.lost_type == 1 ? '寻物启事' : '失物招领'}}</div>
                <div class="content-item">物&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件: {{ item.title}}</div>
                <div class="content-item">时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间: {{ item.created_at.substr(0, 10)}}</div>
                <div class="content-item">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点: {{ item.lost_place}}</div>
                <div class="content-item">联系方式:  {{ item.qq ? `QQ ${item.qq}` : ''}} {{ item.phone ? `电话 ${item.phone}` : ''}}</div>
                <div class="content-item">其它描述: {{ item.description}}</div>
                <div class="content-img" v-for="img in item.images">
                    <img :src="origin_to_img_api(img)" alt="">
                </div>
            </div>

            <div class="detail-change" v-if="edit">
                <!--<div class="change-left"><img src="../../images/arrow-left.png" alt=""></div>-->
                <!--<div class="change-right"><img src="../../images/arrow-right.png" alt=""></div>-->
                <router-link :to="{ name: 'myedit', query: { item_id: item.id}}" tag="div">
                    <div class="edit">编辑</div>
                </router-link>
            </div>

        </div>


    </div>

</template>

<script>

    import vTitle from '../../components/title'
    import vSearch from '../../components/topper_search'
    import vTabber from '../../components/tabber'
    import state from "../../components/state.mixin";
    import {api_url} from "../../config/env";

    export default {
        data: () => ({
            item: {
            }

        }),
        props: ['edit', 'isMine'],
        mounted() {
            const loading = this.$loading();
            const id = this.$route.query.item_id;
            this.get_item_data(id);
            loading.close();
        },
        mixins: [state],
        components: {
            vTitle, vSearch, vTabber
        },
        methods: {
            async get_item_data(itemId) {
                const url = `${api_url}/api/detail/${itemId}`
                await this.$http.get(url).then(res => {
                    if (res.data.code > 0) {
                        this.item = res.data.data.item;
                        return;
                    }

                    this.message(res.error, 2000);
                }).catch(error => {
                    console.log(error)
                })
            },
            origin_to_img_api: function (img_url) {
                return api_url + '/' + img_url;

            }
        }
    }

</script>

<style scoped>
    .detail-main {
        width: 27.7422rem;
        height: 35.5527rem;
        background: #fff;
        border-radius: 10px;
        margin: 0 auto;
    }

    .detail-main:before {
        display: table;
        content: "";
    }

    .detail-content {
        width: 24.3278rem;
        height: 28.5958rem;
        margin: 0 auto;
        margin-top: 1.36577rem;
        overflow-y: scroll;
    }

    .content-item {
        text-align: left;
        vertical-align: middle;
        font-size: 1.02433rem;
        font-weight: bold;
        color: #177441;
        margin-bottom: 0.810926rem;
    }

    .content-item:nth-child(6) {
        margin-top: 2.56082rem;
    }

    .content-img {
        margin: 0 auto;
        margin: 5px;
        width: 23.4742rem;
        height: 13.8284rem;
        border-radius: 5px;
        background: red;

    }

    img {
        height: 100%;
        width: 100%;
    }

    .detail-change {
        width: 24.3278rem;
        height: 3.28649rem;
        margin: 0 auto;
        margin-top: 1.28rem;
    }

    .change-left {
        float: left;
        height: 3.28649rem;

        width: 2.56082rem;

    }

    .change-right {
        float: right;
        height: 3.28649rem;

        width: 2.56082rem;

    }

    ::-webkit-scrollbar {
        width: 0;
        height: 0;
        background: none;
    }

    .edit {
        width: 3rem;
        margin: 0 auto;
        font-size: 1.37943rem;
        font-weight: bold;
        border-radius: 8px;
        padding: .512164rem 1.23773rem;
        background: #32b16c;
    }

</style>