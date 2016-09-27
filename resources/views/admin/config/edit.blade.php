@extends('layouts.admin')
@section('content')
    <body>
    <!--面包屑网站配置 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 编辑网站配置栏目网站配置栏目
    </div>
    <!--面包屑网站配置 结束-->

    <!--结果集标题与网站配置组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>网站配置栏目管理</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/conf/create')}}"><i class="fa fa-plus"></i>编辑网站配置栏目</a>
                <a href="{{url('admin/conf')}}"><i class="fa fa-plus"></i>网站配置栏目列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与网站配置组件 结束-->
    <div class="result_title">
        @if(count($errors)>0)
            <div class="mark">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>

    <div class="result_wrap">
        <form action="{{url('admin/conf').'/'.$v->conf_id}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>网站配置栏目名称：</th>
                    <td>
                        <input type="text" class="lg" name="conf_name" value="{{$link->conf_name}}">
                        <p></p>
                    </td>
                </tr>
                <tr>
                    <th>标题：</th>
                    <td>
                        <input type="text" name="conf_title" value="conf_title">
                        <span><i class="fa fa-exclamation-circle yellow"></i>标题</span>
                    </td>
                </tr>
                <tr>
                    <th>类型：</th>
                    <td>
                        <input  type="radio" name="field_type" class="field_type" checked value="input"> 输入框
                        <input type="radio" name="field_type" class="field_type" value="radio">单选框
                        <input type="radio" name="field_type"  class="field_type" value="textarea">文本框
                    </td>
                </tr>
                <tr >
                    <th>值：</th>
                    <td class='field_value'>
                        <input type="text"  id="text"  name="field_value" >
                        <input type="radio"   name="field_value" value="1"/><span>开启&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="radio"   name="field_value" value="2"/><span>关闭</span>
                        <textarea id="textarea" ></textarea>
                    </td>
                </tr>
                <tr>
                    <th>配置内容：</th>
                    <td>
                        <textarea name='conf_content'></textarea>
                    </td>
                </tr>
                <tr>
                    <th>提示：</th>
                    <td>
                        <input type="text" name="conf_tips">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>
    <script>
        $('.field_value').contents("input[type='radio'],#textarea,span").hide();
        $('.field_type').bind('click', function () {
            $('.field_value').contents().hide();
            if($(this).val()=='input'){
                $('.field_value').find("#text").show();
                $('#textarea').hide();
            }
            if($(this).val()=='radio'){
                $('.field_value').find("input[type='radio']").show();
                $('.field_value').find("span").show();
            }if($(this).val()=='textarea'){
                $("#textarea").attr("name","field_value");
                $('.field_value').find("#textarea").show();
            }
            //console.log( $('input[name=field_value]'));


        })
    </script>
@endsection

