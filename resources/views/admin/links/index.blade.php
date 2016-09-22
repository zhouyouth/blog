@extends('layouts.admin')
@section('content')

    <body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">

        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a>  &raquo; 友情链接列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            {{csrf_field()}}
            <table class="search_tab">
                <tr>
                    <th width="120">选择友情链接:</th>
                    <td>
                        <select onchange="location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>友情链接管理</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>新增友情链接</a>
                    <a href="{{url('admin/article')}}"><i class="fa fa-plus"></i>友情链接列表</a>
                </div>
            </div>
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th class="tc" width="520">标题</th>
                        <th>图片</th>
                        <th>描述</th>
                        <th>关键字</th>
                        <th>点击</th>
                        <th>作者</th>
                        <th>操作</th>
                    </tr>
                     @foreach($link as $v)
                    <tr>
                        <td class="tc"><input type="text" onchange="changeOrder(this,{{$v->cate_id}});" name="id[]" value="{{$v->cate_order}}"></td>
                        <td class="tc">{{$v->art_id}}</td>
                        <td>
                            <a href="#">{{$v->art_title}}</a>
                        </td>
                        <td><img src="/{{$v->art_thumb}}" width="50px" width="50px"></td>
                        <td>{{$v->art_description}}</td>
                        <td>{{$v->art_tag}}</td>
                        <td>{{$v->art_view}}</td>
                        <td>{{$v->art_editor}}</td>
                        <td>
                            <a href="{{url('admin/article/'.$v->art_id.'/edit')}}">修改</a>
                            <a href="javascript:void(0)" onclick="delArticle({{$v->art_id}});">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="page_list">
            {{$link->links()}}
        </div>
    </form>
    <!--结果页快捷搜索框 end-->
    <!-- 分页样式  -->
    <style>
        .page_list ul li span{
         font-size: 15px;
         padding: 6px 12px;
     }
     .page_list ul .active span{
         background-color: #337ab7;
         border-color: #337ab7;
         color: #fff;
         cursor: default;
     }
    </style>
    <script>
    function delArticle(art_id){
//询问框
        layer.confirm('确定要删除？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/article')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data){
               if(data.status==0){
                   location.href =location.href;
                   layer.msg(data.msg,{icon:6});
               }else{
                   layer.msg(data.msg,{icon:5});
               }
            });
        });
    }
    </script>

@endsection
