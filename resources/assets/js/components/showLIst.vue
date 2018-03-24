<template>
    <div class="show-list-wrap" ref="showList">

        <div class="list-item" v-for="(item, index) in itemList">
            <router-link :to="{ name: isMine ? 'mydetail' : 'detail', query: { item_id: item.id}}" tag="div">
                <div class="list-title">
                    <p class="title-content">【{{ item.lost_type == 1 ? '寻物启事' : '失物招领'}}】</p>
                    <p class="title-content">物件：{{ item.title}}</p>
                    <p class="title-content">时间：{{item.created_at.substr(0, 10) }}</p>
                    <p class="title-content">地点：{{ item.lost_place}}</p>
                </div>
                <div class="list-img">
                    <img :src="origin_to_img_api(item.images[0])" alt="" v-if="!item.images.length">
                </div>
            </router-link>
        </div>

    </div>
</template>

<script>

    import {loadMore} from "../config/utils";
    import {api_url} from "../config/env";

    export default {
        data: () => ({
            preventRepeat: false
        }),
        props: ['itemList', 'isMine', 'page', 'url'],
        mounted() {
            console.log(this.$refs.showList)
            loadMore(this.$refs.showList, this.loadmore)
        },
        methods: {
            origin_to_img_api: function (img_url) {
                return api_url + '/' + img_url;

            },
            loadmore: async function () {
                if (this.preventRepeat) {
                    return
                }
                console.log(this.page)
                this.preventRepeat = true

                let temItems = []

                await this.$http.get(api_url + this.url +"?page=" + (this.page + 1)).then(res => {
                    if (res.data.code > 0) {
                        temItems = res.data.data.items;
                        this.page += 1
                        console.log(this.items)
                        return;
                    }

                    this.message(res.data.error, 2000);
                }).catch( error => {

                })
                await this.$emit('changePage', this.page, temItems)
                if (temItems.length < 10) {
                    return
                }
                this.preventRepeat = false
            }


        }


    }
</script>

<style scoped>
    .list-item:before {
        content: '';
        display: table;
    }

    .show-list-wrap {
        width: 27.7422rem;
        height: 40rem;
        margin: 0 auto;
        overflow: scroll;

    }

    .list-item {
        background: #fff;
        border-radius: 10px;
        height: 9.8167rem;
        margin-bottom: .5rem;
    }

    .list-item .list-title {
        float: left;
        width: 12.8043rem;
        height: 9.8167rem;

    }

    .list-title .title-content {
        margin: 0;
        margin-left: 1.02433rem;
        margin-top: .5rem;
        font-weight: bold;
        font-size: 1.28041rem;
        /*height: 2.45rem;*/
        /*box-sizing: content-box;*/
        color: #177441;
        overflow: hidden;
        text-overflow:ellipsis;
        white-space: nowrap;

    }

    .list-item .list-img {
        float: right;
        height: 6.48741rem;
        width: 9.94452rem;
        background: #8eb4cb;
        border-radius: 10px;
        margin-top: 1.92061rem;
        margin-right: 1.70721rem;

    }

    ::-webkit-scrollbar {
        width: 0;
        height: 0;
        background: none;
    }

    img {
        width: 100%;
        height: 100%;
    }


</style>