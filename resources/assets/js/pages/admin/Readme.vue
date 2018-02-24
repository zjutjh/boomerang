<template>
    <div>
        <div class="crumbs">
            <el-breadcrumb separator="/">
                <el-breadcrumb-item><i class="el-icon-setting"></i> Boomerang：简介</el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <div class="ms-doc">
            <h3>README.md</h3>
            <article>
                <h1>Boomerang</h1>
                <p>Boomerang译为回力标，回力标是古代的打猎工具。将回力标掷出后，将会飞回来，回到原持有者手中。
                    我们希望所有丢失的物品都能像回力标一样回到失主的手中。</p>
                <p>本项目为精弘网络开发部-失物招领项目
                    <br/>
                    采取前后端分离的架构
                    <br/>
                    后端技术栈为php-laravel
                    <br/>
                    前端-未定 项目目录在 resources/assets下
                    <br/>
                    采用三分支进行开发</p>
                <h2>分支</h2>
                <el-checkbox disabled checked>主干 master</el-checkbox>
                <br>
                <el-checkbox disabled checked>后端 server</el-checkbox>
                <br>
                <el-checkbox disabled checked>前端 front</el-checkbox>
                <br>
                <h2>项目成员</h2>
                <el-checkbox disabled checked>涂珊莎	产品</el-checkbox>
                <br>
                <el-checkbox disabled checked>林英琮	前端＆ＵＩ</el-checkbox>
                <br>
                <el-checkbox disabled checked>张静茜 后端</el-checkbox>
                <br>
                <el-checkbox disabled checked>张炜  后端</el-checkbox>
                <br>
                <el-checkbox disabled checked>黄潇扬 前端</el-checkbox>
                <br>
                <el-checkbox disabled checked>叶哲  后端</el-checkbox>
                <br>
                <el-checkbox disabled checked>朱兴照	带头大哥</el-checkbox>
                <br>
            </article>
        </div>

    </div>
</template>

<script>
    export default {
        data: function(){
            return {}
        }
    }
</script>

<style scoped>
    .ms-doc{
        width:100%;
        max-width: 980px;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
    }
    .ms-doc h3{
        padding: 9px 10px 10px;
        margin: 0;
        font-size: 14px;
        line-height: 17px;
        background-color: #f5f5f5;
        border: 1px solid #d8d8d8;
        border-bottom: 0;
        border-radius: 3px 3px 0 0;
    }
    .ms-doc article{
        padding: 45px;
        word-wrap: break-word;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    .ms-doc article h1{
        font-size:32px;
        padding-bottom: 10px;
        margin-bottom: 15px;
        border-bottom: 1px solid #ddd;
    }
    .ms-doc article h2 {
        margin: 24px 0 16px;
        font-weight: 600;
        line-height: 1.25;
        padding-bottom: 7px;
        font-size: 24px;
        border-bottom: 1px solid #eee;
    }
    .ms-doc article p{
        margin-bottom: 15px;
        line-height: 1.5;
    }
    .ms-doc article .el-checkbox{
        margin-bottom: 5px;
    }
</style>