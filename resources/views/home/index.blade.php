@extends('layouts.home')
 @section('content')
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
      <li><a href="{{url('a/')}}"  target="_blank"><img src="{{url('/')."/".$h->art_thumb}}"></a><span>{{$h->art_title}}...</span></li>
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
      <a title="/" href="{{url('/art').'/'.$v->art_id}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <p class="dateview"><span>{{date('Y-m-d H:i:s',$v->art_time)}}</span><span>作者：{{$v->art_editor}}</span></p>
    @endforeach
      <div class="page_list">
        {{$data->links()}}
      </div>
      <style>


        /*.page_list ul {*/
          /*border: 1px solid #ddd;*/
          /*border-radius: 3px;*/
          /*/!*display: inline-block;*!/*/
          /*margin: 0;*/
          /*overflow: hidden;*/
          /*padding: 0;*/
          /*width:auto;*/
        /*}*/
        .page_list ul li{
          /*display:inline;*/
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
    <div class="weather"><iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe></div>
    <div class="news">
    <h3>
      <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
      @foreach($new as $v)
      <li><a href="/" title="{{$v->art_title}}" target="_blank">{{$v->art_title}}</a></li>
      @endforeach
    </ul>
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
      @foreach($rank as  $h)
      <li><a href="{{url('/art/').'/'.$h->art_id}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
      @endforeach
    </ul>
    <h3 class="links">
      <p>友情<span>链接</span></p>
    </h3>
    <ul class="website">
       @foreach($links as $v)
      <li><a href="{{$v->link_url}}">{{$v->link_name}}</a></li>
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
    <!-- Baidu Button END -->
    </aside>
</article>
@endsection
