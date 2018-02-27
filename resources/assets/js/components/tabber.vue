<template>
    <div class="bottomBar">
        <ul>
            <li @click="find">
                <router-link :to="{name:'foundlist'}">
                    ![](..assets/js/images/lost.png)
                    ![](../assets/js/images/lost-hover.png)
                    <p :class="{bottomBarColorActive:isColor}">寻物</p>
                </router-link>
            </li>
            <li @click="lost">
                <router-link :to="{name:'tofindlist'}">
                    ![](../assets/js/images/found.png)
                    ![](../assets/js/images/found-hover.png)
                    <p :class="{bottomBarColorActive:isColor2}">招领</p>
                </router-link>
            </li>
            <li @click="search">
                <router-link :to="{name:'searchresult'}">
                    ![](..assets/js/images/search.png)
                    ![](../assets/js/images/search-hover.png)
                    <p :class="{bottomBarColorActive:isColor3}">搜索</p>
                </router-link>
            </li>
            <li @click="mine">
                <router-link :to="{name:'mine'}">
                    ![](../assets/js/images/mine.png)
                    ![](../assets/js/images/mine-hover.png)
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
                isColor:true,
                isColor2:false,
                isColor3:false,
                isColor4:false
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
        height: 100px;
        width: 100%;
        border: 1px solid #ccc;
        bottom: 0;
        background: rgba(255,255,255,0.90);
        position: fixed;
        align-content: flex-end;
    }
    .bottomBar ul {
        display: flex;
        width: 100%;
        justify-content:space-around;
    }
    .bottomBar ul li {
        /*width: 20%;*/
    }
    .bottomBar ul li img {
        margin: 8px 0;
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