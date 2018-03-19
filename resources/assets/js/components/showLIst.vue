<template>
    <div class="show-list-wrap">
        <div class="list-item">
            <div class="list-title">
                <p class="title-content">【失物招领】</p>
                <p class="title-content">物件：校园卡</p>
                <p class="title-content">时间：2018.1.25</p>
                <p class="title-content">地点：广210</p>
            </div>

            <div class="list-img">
                <img src="" alt="">

            </div>

        </div>

    </div>
</template>

<script>

    import { loadMore } from "../config/utils";

    export default {
        name: "show-l-ist",


    }
</script>

<style scoped>
    .list-item:before {
        content: '';
        display: table;
    }

    .show-list-wrap {
        width: 27.7422rem;
        margin: 0 auto;

    }

    .list-item {
        background: #fff;
        border-radius: 10px;
        height: 9.8167rem;
    }


    .list-item .list-title {
        float: left;
        width: 12.8043rem;
        height: 100%;

    }

    .list-title .title-content {
        margin-left: 1.02433rem;
        margin-top: 0.7rem;
        font-weight: bold;
        font-size: 1.28041rem ;
        color: #177441;

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

    img {
        width: 100%;
        height: 100%;
    }


</style>