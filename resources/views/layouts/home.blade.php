<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>后盾个人博客</title>
    <meta name="keywords" content="个人博客模板,博客模板" />
    <meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
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
<script src="{{asset('/resources/views/home/style/js/silder.js')}}silder.js"></script>
</body>
</html>