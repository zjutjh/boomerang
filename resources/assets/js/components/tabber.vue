<template>
    <div class="tabber-wrap">
        <ul class="tabber-menu">
            <li class="menu-item">
                <img class="menu-item-img" src="../images/found.png" alt="">
                <label for="" class="menu-title">寻物</label>
            </li>
            <li class="menu-item">
                <img class="menu-item-img" src="../images/lost.png" alt="">
                <label for="" class="menu-title">招领</label>
            </li>

            <li class="menu-add">
                <img class="menu-add-icon" src="../images/add.png" alt="">
            </li>
            <li class="menu-item">
                <img class="menu-item-img" src="../images/mine.png" alt="">
                <label for="" class="menu-title">我的</label>
            </li>
            <li class="menu-item">
                <img class="menu-item-img" src="../images/search.png" alt="">
                <label for="" class="menu-title">搜索</label>
            </li>

        </ul>

    </div>
</template>

<script>
    export default {
        name: "tabber",
       data(){
            return{
                lost1:'../images/lost.png',
                lost:'../images/lost.png',
                lost_hover:'../images/lost-hover.png',
                found1:'../images/found.png',
                found:'../images/found.png',
                found_hover:'../images/found-hover.png',
                search1:'../images/search.png',
                search:'../images/search.png',
                search_hover:'../images/search-hover.png',
                mine1:'../images/mine.png',
                mine:'../images/mine.png',
                mine_hover:'../images/mine-hover.png',
                isColor:true,
                isColor2:false,
                isColor3:false,
                isColor4:false,
            }
        },
        methods:{
            toColor :function () {
                this.isColor=true;
                this.isColor2=false;
                this.isColor3=false;
                this.isColor4=false;
            },
            toColor2 :function () {
                this.isColor=false;
                this.isColor2=true;
                this.isColor3=false;
                this.isColor4=false;
            },
            toColor3 :function () {
                this.isColor=false;
                this.isColor2=false;
                this.isColor3=true;
                this.isColor4=false;
            },
            toColor4 :function () {
                this.isColor=false;
                this.isColor2=false;
                this.isColor3=false;
                this.isColor4=true;
            },
        }
    }
</script>

<style scoped>
    .tabber-wrap {
        height: 4.694rem;
        width: 100%;
        position: fixed;
        bottom: 0;
        background: #32b16c;
    }

    .tabber-wrap  .tabber-menu {
        height: 100%;
        width: 100%;
        position: absolute;
    }

    .tabber-wrap .tabber-menu .menu-item {
        list-style: none;
        float: left;
        width: 2.475rem;
        height: 100%;
        margin: 0 2rem;
        margin-bottom: .42rem;

    }



    .tabber-menu .menu-add {
        list-style: none;
        position: absolute;
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        border: .469rem solid #32b16c;
        left: 50%;
        top: -1.536rem;
        transform: translateX(-50%);
        background: #fff;

    }

    .menu-add .menu-add-img {

    }

    .menu-item:nth-child(n + 3) {
        float: right!important;
    }


    .tabber-menu .menu-item-img {
        display: block;
        height: 2rem;
        width: 2rem;
        margin: 0 auto;
        margin-top: .59rem;
    }

    .menu-title {
        font-size: 1.19rem;
        color: #fff;

    }
    
    img {
        width: 100%;
        height: 100%;
    }
</style>