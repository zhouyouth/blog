@extends('layouts.home')
<link href="{{asset('/resources/views/home/style/css/style.css')}}" rel="stylesheet">
  @section('content')
      <title>{{$cate->cate_name}}</title>
      <meta name="keywords" content="{{$cate->cate_key}}" />
      <meta name="description" content="{{$cate->cate_description}}" />
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav"><a href="index.html"><span>首页</span><span class="en">Protal</span></a><a href="about.html"><span>关于我</span><span class="en">About</span></a><a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a><a href="share.html"><span>模板分享</span><span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span><span class="en">Learn</span></a><a href="book.html"><span>留言版</span><span class="en">Gustbook</span></a></nav>
  </nav>
</header>
<article class="blogs">
<h1 class="t_nav"><span>{{$cate->title}}</span><a href="/" class="n1">网站首页</a><a href="{{url('cat/'.$cate->cate_id)}}" class="n2">{{$cate->cate_name}}</a></h1>
<div class="newblog left">
         @foreach($data as  $v)
         <h2>{{$v->art_title}}</h2>
   <p class="dateview"><span>{{date('Y-m-d H:i:s',$v->art_time)}}</span><span>{{$v->art_editor}}</span><span>分类：[<a href="/news/life/">{{$cate->cate_name}}</a>]</span></p>
    <figure><img src="/{{$v->art_thumb}}"></figure>
    <ul class="nlist">
      <p>{{$v->art_description}}...</p>
      <a title="/" href="{{url('/art').'/'.$v->art_id}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="line"></div>
    <div class="blank"></div>
    @endforeach
    <div class="ad">  
    <img src="{{asset('/resources/views/home/style/images/ad.png')}}">
    </div>
    <div class="page">
        {{$data->links()}}
{{--<ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="http://blog.hd/admin/article?page=2">2</a></li> <li><a href="http://blog.hd/admin/article?page=2" rel="next">»</a></li></ul>--}}
    </div>
</div>
<aside class="right">
    @if($submenu)
   <div class="rnav">
      <ul>
        @foreach($submenu as $sub)
       <li class="rnav4"><a href="{{url('cat/'.$sub->cate_id)}}" target="_blank">{{$sub->cate_name}}</a></li>
        @endforeach
      </ul>
    </div>
    @endif
<div class="news">
<h3>
      <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
      <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
      <li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
      <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
      <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
      <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
      <li><a href="/" title="建站流程篇——教你如何快速学会做网站" target="_blank">建站流程篇——教你如何快速学会做网站</a></li>
      <li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
      <li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
    </ul>
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
      <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
      <li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
      <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
      <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
      <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
    </ul>
    </div>
    <div class="visitors">
      <h3><p>最近访客</p></h3>
      <ul>

      </ul>
    </div>
     <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->   
</aside>
</article>
@endsection