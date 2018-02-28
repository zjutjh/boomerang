<template>
    <div class="bottomBar">
        <ul>
            <li @click="find">
                <router-link :to="{name:'foundlist'}">
                    <img :src="found" alt="" @mouseover="found=found_hover" @mouseout="found_hover=found1" />
                    <p :class="{bottomBarColorActive:isColor}">寻物</p>
                </router-link>
            </li>
            <li @click="lost">
                <router-link :to="{name:'tofindlist'}">
                    <img :src="lost" alt="" @mouseover="lost=lost_hover" @mouseout="lost_hover=lost1"/>
                    <p :class="{bottomBarColorActive:isColor2}">招领</p>
                </router-link>
            </li>
            <li @click="search">
                <router-link :to="{name:'searchresult'}">
                    <img :src="search" alt="" @mouseover="search=search_hover" @mouseout="search_hover=search1"/>
                    <p :class="{bottomBarColorActive:isColor3}">搜索</p>
                </router-link>
            </li>
            <li @click="mine">
                <router-link :to="{name:'mine'}">
                    <img :src="mine" alt="" @mouseover="mine=mine_hover" @mouseout="mine_hover=mine1"/>
                    <p :class="{bottomBarColorActive:isColor4}">我的</p>
                </router-link>
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
    .bottomBar {
        height: 75px;
        width: 800px;
        border: none;
        bottom: 0;
        background: rgb(50,177,108);
        position: fixed;
        align-content: flex-end;
    }
    .bottomBar ul {
        display: flex;
        width: 100%;
        justify-content: center;
    }
    .bottomBar ul li {
        *width: 20%;
    }
    .bottomBar ul li img {
        margin: 4px 0;
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