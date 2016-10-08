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
        @foreach($submenu as $k =>$sub)
       <li class="rnav{{$k+1}}"><a href="{{url('cat/'.$sub->cate_id)}}" target="_blank">{{$sub->cate_name}}</a></li>
        @endforeach
      </ul>
    </div>
    @endif
  @parent

</aside>
</article>
@endsection