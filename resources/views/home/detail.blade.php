@extends('layouts.home')
 @section('content')
   <title>{{$field->art_tag}}--{{Config::get('web.web_title')}}</title>
   <meta name="keywords" content="{{$field->art_keywords}}" />
   <meta name="description" content="{{$field->art_description}}" />
<link href="{{asset('/resources/views/home/style/css/new.css')}}" rel="stylesheet">
<article class="blogs">
  <h1 class="t_nav"><span>您当前的位置：<a href="/">首页</a>&nbsp;&gt;&nbsp;<a href="/news/s/">{{$field->cate_name}}</a>&nbsp;&gt;&nbsp;<a href="{{url('/a').'/'.$field->art_id}}">{{$field->art_title}}</a></span><a href="/" class="n1">网站首页</a><a href="{{url('/cat').'/'. $field->cate_id}}" class="n2">{{$field->cate_name}}</a></h1>
  <div class="index_about">
    <h2 class="c_titile">{{$field->art_title}}</h2>
    <p class="box_c"><span class="d_time">发布时间：{{date('Y-m-d H:i:s',$field->art_time)}}</span><span>编辑：{{$field->art_editor}}</span><span>查看次数：{{$field->art_view}}</span></p>
    <ul class="infos">
      { $field->art_content }
    </ul>
    <div class="keybq">
    <p><span>关键字词</span>：{{$field->art_tag}}</p>
    
    </div>
    <div class="ad"> </div>
    <div class="nextinfo">
       @if($article['pre'])
      <p>上一篇：<a href="{{url('a/').'/'.$article['pre']->art_id}}">{{$article['pre']->art_title}}</a></p>
        @endif
        @if($article['next'])
        <p>下一篇：<a href="{{url('a/')."/".$article['next']->art_id}}">{{$article['next']->art_title}}</a></p>
        @endif
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        @foreach($data as $relate)
        <li><a href="{{url('/a').'/'.$relate->art_id}}" title="{{$relate->art_title}}">{{$relate->art_title}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
  <aside class="right">
   @parent
  </aside>
</article>

</body>
</html>
 @endsection