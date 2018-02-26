<template>
    <div class="nav-head">
        <input id="search" placeholder="  请输入关键词...">
        <button id="_search" @click="Search()">搜索</button>
    </div>
</template>

<script>
    import {api_url} from "../config/env";
    export default {
        name: "topper_search",
        methods:{
            async Search(){
                const val=document.getElementById("search");
                await this.$http.post(api_url + '/api/topper', val).then(res => {
                    if (res.code > 0) {
                        this.vuex = res.data;
                        return;
                    }

                    this.message(res.error, 2000);

                });
            }
        }
    }
</script>

<style scoped>
    .nav-head{
        width:500px;
        height:55px;
        margin:0;
        padding:0;

    }
    #search{
        width: 375px;
        border: none;
        height: 55px;
        margin: 0;
        padding: 0;
    }
    #_search{
        font-weight: bold;
        font-size: 16px;
        color: green;
        width: 125px;
        height: 55px;
        border: none;
        margin: 0;
        padding: 0;
    }
</style>