@extends('layouts.admin')
@section('content')
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
    <script>
        var ue = UE.getEditor('editor');
        <?php $timestamp = time();?>
        $(function() {
                    $('#file_upload').uploadify({
                        'buttonText' : '选择图片',
                        'formData'     : {
                            'timestamp' : '<?php echo $timestamp;?>',
                            '_token'     : '{{csrf_token()}}'
                        },
                        'swf'      : '{{asset("resources/org/uploadify")}}/uploadify.swf',
                        'uploader' : '{{url("admin/upload")}}',
                        'onUploadSuccess' : function(file, data, response) {
                            $('#thumb').attr('src',+data);
                            $('#thumb').attr('width',200);
                            $('#thumb').attr('height',200);
                            $('#text').val(data);
                            //layer.msg('上传成功!',{icon: 6});
                        }
                    });
                });

    </script>


    <style>
        <!--编辑器样式矫正 -->
        .edui-default{line-height: 28px;}
        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
        {overflow: hidden; height:20px;}
        div.edui-box{overflow: hidden; height:22px;}

        /*上传样式*/
        .uploadify{display:inline-block;}
        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
    </style>
    <body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 添加友情链接友情链接
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>友情链接管理</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/links/create')}}"><i class="fa fa-plus"></i>编辑友情链接</a>
                <a href="{{url('admin/links')}}"><i class="fa fa-plus"></i>友情链接列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
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
        <form action="{{url('admin/links')}}/{{$link->link_id}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>友情链接名称：</th>
                    <td>
                        <input type="text" class="lg" name="link_name" value="{{$link->link_name}}">
                        <p></p>
                    </td>
                </tr>
                <tr>
                    <th>标题：</th>
                    <td>
                        <input type="text" name="link_title" value="{{$link->link_title}}">
                        <span><i class="fa fa-exclamation-circle yellow " ></i>标题</span>
                    </td>
                </tr>
                <tr>
                    <th>图标：</th>
                    <td>
                        <div><img  id="thumb"  src="/{{$link->link_logo}}" width="100" height="100" /></div>
                        <input type="text" id="text" class="fa" name="link_logo"  value="/{{$link->link_logo}}" >
                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                    </td>
                </tr>
                <tr>
                    <th>网址：</th>
                    <td>
                        <input type="text" name="link_url"  value='{{$link->link_url}}'>
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
@endsection

