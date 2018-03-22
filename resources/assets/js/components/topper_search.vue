<template>
    <div class="nav-head">
        <input class="search" placeholder="请输入关键词..." v-model="search_text">
        <label for="" class="search_icon" @click="Search">搜索</label>
    </div>
</template>

<script>
    import {api_url} from "../config/env";
    export default {
        name: "topper_search",
        data: () => ({
            search_text: ''
        }),
        methods:{
            Search(){
                this.$router.push({
                    name: 'search',
                    query: {
                        searchText: this.search_text
                    }
                })
            }
        }
    }
</script>

<style scoped>
    .nav-head{
        width: 100%;
        height: 3.41rem;
        margin:auto;
        position: relative;

    }


    .search {
        width: 100%;
        height: 3.41rem;
        padding-top: 1.024rem;
        padding-bottom: 1.024rem;
        padding-left: 1.92rem;
        font-size: 1.28rem;
        color: #c8c7cd;
        background: #fff;
        box-sizing: border-box;
    }

    .search_icon {
        position: absolute;
        right: 1.92rem;
        top: .7rem;
        font-size: 1.53rem;
        font-weight: bold;
        color: #32b16c;
    }

    input::placeholder {
        color: #c8c7cd;
    }

    input::webkit-input-placeholder {
        color: #c8c7cd;
    }


</style>