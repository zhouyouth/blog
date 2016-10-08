@extends('layouts.home')
 @section('content')
   <title>{{Config::get('web.web_title')}}</title>
   <meta name="keywords" content="{{Config::get('web.web_key')}}" />
   <meta name="description" content="{{Config::get('web.web_description')}}" />
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav"><a href="index.html"><span>首页</span><span class="en">Protal</span></a><a href="about.html"><span>关于我</span><span class="en">About</span></a><a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a><a href="share.html"><span>模板分享</span><span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span><span class="en">Learn</span></a><a href="book.html"><span>留言版</span><span class="en">Gustbook</span></a></nav>
  </nav>
</header>
<div class="banner">
  <section class="box">
    <ul class="texts">
      <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
      <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
      <p>加了锁的青春，不会再因谁而推开心门。</p>
    </ul>
    <div class="avatar"><a href="#"><span>后盾</span></a> </div>
  </section>
</div>
<div class="template">
  <div class="box">
    <h3>
      <p><span>热点</span>资讯 News</p>
    </h3>
    <ul>
      @foreach($hot as  $h)
      <li><a href="{{url('index.php/a/').'/'.$h->art_id}}"  target="_blank"><img src="{{url('/')."/".$h->art_thumb}}"></a><span>{{$h->art_title}}...</span></li>
     @endforeach
    </ul>
  </div>
</div>
<article>
  <h2 class="title_tj">
    <p>文章<span>推荐</span></p>
  </h2>
  <div class="bloglist left">
    @foreach($data as $v)
    <h3>{{$v->art_title}}</h3>
    <figure><img src="{{url('/').'/'.$v->art_thumb}}"></figure>
    <ul>
      <p>{{$v->art_description}}...</p>
      <a title="/" href="{{url('index.php/a').'/'.$v->art_id}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <p class="dateview"><span>{{date('Y-m-d H:i:s',$v->art_time)}}</span><span>作者：{{$v->art_editor}}</span></p>
    @endforeach
      <div class="page_list">
        {{$data->links()}}
      </div>
      <style>
        .page_list ul {
          border: 1px solid #ddd;
          border-radius: 3px;
          /*display: inline-block;*/
          margin: 0;
          overflow: hidden;
          padding: 0;
          width:auto;
        }
        .page_list ul li{
          display:inline;
          -moz-border-bottom-colors: none;
          -moz-border-left-colors: none;
          -moz-border-right-colors: none;
          -moz-border-top-colors: none;
          border-color: -moz-use-text-color #ddd -moz-use-text-color -moz-use-text-color;
          border-image: none;
          border-style: none solid none none;
          border-width: medium 1px medium medium;
          float: left;
          height: 30px;
          line-height: 30px;

        }
        .page_list ul li span,a{
          padding: 8px 12px;
          font-size: 15px;


        }
        .page_list ul .active span{
          background-color: #abab93;
          border-color: #337ab7;
          color: #fff;
          cursor: default;
        }

      </style>
  </div>
  <aside class="right">
     @parent

    </aside>
</article>
@endsection
