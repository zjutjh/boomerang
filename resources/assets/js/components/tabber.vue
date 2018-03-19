<template>
    <div class="bottomBar">
        <ul>
            <router-link :to="{name:'foundlist'}" tag="li" exact>
                <div>
                    <i class="foundlist" @mouseover="found=found_hover" @mouseout="found_hover=found1"></i>
                </div>
                    <p :class="{bottomBarColorActive:isColor}">寻物</p>
            </router-link>
            <router-link :to="{name:'tofindlist'}" tag="li">
                <i class="lost" @mouseover="lost=lost_hover" @mouseout="lost_hover=lost1"></i>
                    <p :class="{bottomBarColorActive:isColor2}">招领</p>
            </router-link>
            <router-link :to="{name:'searchresult'}" tag="li">
                <i class="search" @mouseover="search=search_hover" @mouseout="search_hover=search1"></i>
                    <p :class="{bottomBarColorActive:isColor3}">搜索</p>
            </router-link>
            <router-link :to="{name:'mine'}" tag="li">
                <i class="mine" @mouseover="mine=mine_hover" @mouseout="mine_hover=mine1"></i>
                    <p :class="{bottomBarColorActive:isColor4}">我的</p>
            </router-link>
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
    .bottomBar {
        height: 75px;
        width: 800px;
        border: none;
        bottom: 0;
        background: rgb(50,177,108);
        position: fixed;
        align-content: flex-end;
        display: flex;
    }
    .foudlist{
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background-repeat: no-repeat; //属性设置是否及如何重复背景图像
        background-position: center;   //背景位置居中
        background-size: cover;      /*background-size的cover特定值会保持图像本身的宽高比例，将图片缩放到正好完全覆盖定义背景的区域。*/
        background-image: url("../images/found.png");
        display: block;  /*变成块状，这个属性一定要加，要不然不显示。因为<i>标签不是块级元素*/
    }
    .lost{
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background-repeat: no-repeat; //属性设置是否及如何重复背景图像
        background-position: center;   //背景位置居中
        background-size: cover;      /*background-size的cover特定值会保持图像本身的宽高比例，将图片缩放到正好完全覆盖定义背景的区域。*/
        background-image: url("../images/lost.png");
        display: block;  /*变成块状，这个属性一定要加，要不然不显示。因为<i>标签不是块级元素*/
    }
    .search{
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background-repeat: no-repeat; //属性设置是否及如何重复背景图像
        background-position: center;   //背景位置居中
        background-size: cover;      /*background-size的cover特定值会保持图像本身的宽高比例，将图片缩放到正好完全覆盖定义背景的区域。*/
        background-image: url("../images/search.png");
        display: block;  /*变成块状，这个属性一定要加，要不然不显示。因为<i>标签不是块级元素*/
    }
    .mine{
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background-repeat: no-repeat; //属性设置是否及如何重复背景图像
        background-position: center;   //背景位置居中
        background-size: cover;      /*background-size的cover特定值会保持图像本身的宽高比例，将图片缩放到正好完全覆盖定义背景的区域。*/
        background-image: url("../images/mine.png");
        display: block;  /*变成块状，这个属性一定要加，要不然不显示。因为<i>标签不是块级元素*/
    }
    .bottomBar ul{
        display: table;
        width: 100%;
    }
   .router-link-active
   {
       color: #D0021B;
   }
    div {
        font-size: 14px;

    }
    i{
        font-size: 30px;
    }
    .bottomBar ul li {
        *width: 20%;
        text-align: center;
        font-size: 16px;
        display: table-cell;
        padding: 8px 12px;
        cursor: pointer;
    }
    .bottomBar ul li p {
        font-family: "Helvetica Neue", Helvetica, "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", "微软雅黑", Arial, sans-serif;
        font-size: 20px;
        color: #D2D7E8;
        letter-spacing: 0;
        line-height: 20px;
    }
    .mainContent {
        height:-webkit-calc(100% - 100px);
        height:-moz-calc(100% - 100px);
        height:calc(100% - 100px);
    }
    .bottomBarColorActive {
        color: #4D81EE !important;
    }
</style>