<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    {{--<title>{{Config::get('web.web_title')}}</title>--}}
    {{--<meta name="keywords" content="{{Config::get('web.web_key')}}" />--}}
    {{--<meta name="description" content="{{Config::get('web.web_description')}}" />--}}
    <link href="{{asset('/resources/views/home/style/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('/resources/views/home/style/css/index.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/modernizr.js"></script>
    <![endif]-->
</head>
<header>
    <div id="logo"><a href="/"></a></div>
    <nav class="topnav" id="topnav"><a href="/"><span>首页</span><span class="en">Protal</span></a>
        @foreach($navs as $n)
        <a href="{{url('/').$n->nav_url}}"><span>{{$n->nav_name}}</span><span class="en">{{$n->nav_alias}}</span></a>
        @endforeach
    </nav>

</header>

<body>
@section('content')
    <div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
    <div class="news">
        <h3>
            <p>最新<span>文章</span></p>
        </h3>
        <ul class="rank">
            @foreach($new as $v)
                <li><a href="{{url('/a').'/'.$v->art_id}}" title="{{$v->art_title}}" target="_blank">{{$v->art_title}}</a></li>
            @endforeach
        </ul>
        <h3 class="ph">
            <p>点击<span>排行</span></p>
        </h3>
        <ul class="paih">
            @foreach($rank as  $h)
                <li><a href="{{url('/a').'/'.$h->art_id}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
            @endforeach
        </ul>
        <h3 class="links">
            <p>友情<span>链接</span></p>
        </h3>
        <ul class="website">
            @foreach($links as $v)
                @if($v->link_logo)
                <li><a href="{{$v->link_url}}"><img src="link_logo"></a></li>
                 @else
                    <li><a href="{{$v->link_url}}">{{$v->link_name}}</a></li>
                    @endif

            @endforeach
        </ul>
    </div>
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
    <script type="text/javascript" id="bdshell_js"></script>
    <script type="text/javascript">
        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
    </script>
    <style>
        .bds_tools_32 a {
            padding:0px;
        }
    </style>
@show
<footer>
    <p>Design by zhou <a href="http://www.miitbeian.gov.cn/" target="_blank">http://www.tianbian.com</a> <a href="/">网站统计</a></p>
</footer>
<script src="{{asset('/resources/views/home/style/js/silder.js')}}"></script>
</body>
</html>