<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>!function(a,b,c){function q(){var d=Math.min((o?e[h]().width:f.innerWidth)/(a/b),c);d!=p&&(k.innerHTML="html{font-size:"+d+"px!important;"+n+"}",p=d)}function r(){clearTimeout(l),l=setTimeout(q,500)}var l,d=document,e=d.documentElement,f=window,g="addEventListener",h="getBoundingClientRect",i="pageshow",j=d.head||d.getElementsByTagName("HEAD")[0],k=d.createElement("STYLE"),m="text-size-adjust:100%;",n="-webkit-"+m+"-moz-"+m+"-ms-"+m+"-o-"+m+m,o=h in e,p=null;a=a||320,b=b||16,c=c||32,j.appendChild(k),d[g]("DOMContentLoaded",q,!1),"on"+i in f?f[g](i,function(a){a.persisted&&r()},!1):f[g]("load",r,!1),f[g]("resize",r,!1),q()}(320,10,100);</script>

    <link rel="stylesheet" href="http://i.gtimg.cn/vipstyle/frozenui/2.0.0/css/frozen.css">
    <style>
        html, body {
            height: 100%;
            width: 100%;
        }
        .detail-wrap {
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

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
            overflow-y: scroll;
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
            height: auto;
            /*height: 13.8284rem;*/
            border-radius: 5px;
            /*background: red;*/

        }

        img {
            /*height: 100%;*/
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

        ::-webkit-scrollbar {
            width: 0;
            height: 0;
            background: none;
        }
        .detail-change>div {
            display: inline-block;
        }

        .edit {
            width: 3rem;
            margin: 0 auto;
            font-size: 1.37943rem;
            font-weight: bold;
            border-radius: 8px;
            padding: .512164rem 1.23773rem;
            background: #32b16c;
            display: inline-block;
        }
        .del {
            width: 3rem;
            margin: 0 auto;
            font-size: 1.37943rem;
            font-weight: bold;
            border-radius: 8px;
            padding: .512164rem 1.23773rem;
            background: #32b16c;
            display: inline-block;

        }
    </style>
</head>
<body>
<div class="detail-wrap">

    <div class="detail-main">
        <div class="detail-content">
            <div class="content-item">类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别: 校园卡招领</div>
            <div class="content-item">物&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件: 校园卡</div>
            <div class="content-item">时&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;间: {{ substr($item->created_at, 0, 10) }}</div>
            <div class="content-item">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;点: {{ $item->lost_place }}</div>
            <div class="content-item">联系方式:  {{ $item->qq ? 'QQ' . $item->qq : '' }} {{ $item->phone ? '电话' . $item->phone : '' }}</div>
            <div class="content-item">其它描述: {{ $item->description }}</div>

            <div class="content-img" >
                @foreach($item->images as $k => $v)
                <img src="{{ env('APP_URL') . '/' . $v }}" alt="">
                @endforeach
            </div>
        </div>
    </div>


</div>

</body>
</html>