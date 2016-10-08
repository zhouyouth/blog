<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{Config::get('web.web_title')}}</title>
    {{--<meta name="keywords" content="{{Config::get('web.web_key')}}" />--}}
    {{--<meta name="description" content="{{Config::get('web.web_description')}}" />--}}
    <link href="{{asset('/resources/views/home/style/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('/resources/views/home/style/css/index.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/modernizr.js"></script>
    <![endif]-->
</head>
<body>
@yield('content')
<footer>
    <p>Design by zhou <a href="http://www.miitbeian.gov.cn/" target="_blank">http://www.houdunwang.com</a> <a href="/">网站统计</a></p>
</footer>
<script src="{{asset('/resources/views/home/style/js/silder.js')}}"></script>
</body>
</html>