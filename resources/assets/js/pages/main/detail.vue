<template>
    <div class="detail-wrap">
        <v-search></v-search>
        <v-title></v-title>
        <div class="detail-main">
            <div class="detail-content">
                <div class="content-item">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:</div>
                <div class="content-item">物&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件:</div>
                <div class="content-item">时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间:</div>
                <div class="content-item">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点:</div>
                <div class="content-item">联系方式:</div>
                <div class="content-item">其它描述:下啊士大夫过热i哦万股忒按撒旦撒啊散打
                    阿斯顿A发的改变s</div>
                <div class="content-img">
                    <img src="" alt="">
                </div>
                <div class="content-img">
                    <img src="" alt="">
                </div>
            </div>
            
            <div class="detail-change">
                <div class="change-left"><img src="../../images/arrow-left.png" alt=""></div>
                <div class="change-right"><img src="../../images/arrow-right.png" alt=""></div>
            </div>

        </div>
        <v-tabber></v-tabber>



    </div>

</template>

<script>

    import vTitle from '../../components/title'
    import vSearch from '../../components/topper_search'
    import vTabber from '../../components/tabber'
    export default {
        data: () => ({

        }),
        components: {
            vTitle, vSearch, vTabber
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
        overflow-y: hidden;
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

</style>