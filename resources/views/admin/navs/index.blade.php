@extends('layouts.admin')
@section('content')

    <body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">

        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a>  &raquo; 导航栏目列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            {{csrf_field()}}
            <table class="search_tab">
                <tr>
                    <th width="120">选择导航栏目:</th>
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
                <h3>导航栏目管理</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>新增导航栏目</a>
                    <a href="{{url('admin/navs')}}"><i class="fa fa-plus"></i>导航栏目列表</a>
                </div>
            </div>
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th class="tc" width="520">导航名称</th>
                        <th class="tc">别名</th>
                        <th class="tc">链接地址</th>
                        <th width="100">操作</th>
                    </tr>
                     @foreach($navs as $v)
                    <tr>
                        <td class="tc"><input type="text" onchange="changeOrder(this,{{$v->nav_id}});" name="id[]" value="{{$v->nav_order}}"></td>
                        <td class="tc">{{$v->nav_id}}</td>
                        <td>
                            <a href="#" class="tc">{{$v->nav_name}}</a>
                        </td>
                        <td class="tc">{{$v->nav_alias}}</td>
                        <td class="tc">{{$v->nav_url}}
                        <td>
                            <a  href="{{url('admin/navs'.$v->nav_id.'/edit')}}">修改</a>
                            <a   href="javascript:void(0)" onclick="delnavsicle({{$v->nav_id}});">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="page_list">
            {{$navs->nav()}}
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
        function changeOrder(obj,navs_id){
            var orderid= $(obj).val();
            //alert(orderid);
            //排序id
            $.post("{{url('admin/navs/changeorder')}}",{'_token':"{{csrf_token()}}",'orderid':orderid,'nav_id':navs_id},function(data){
                if(data.status==1){

                    layer.msg(data.msg,{icon:6});
                    location.href =location.href;
                }else{
                    layer.msg(data.msg,{icon:5});
                }
            });
        }
    function delnavsicle(navs_id){
//询问框
        layer.confirm('确定要删除？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/navs')}}/"+navs_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data){
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
