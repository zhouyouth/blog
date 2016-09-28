<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Conf;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Config;

class ConfController extends Controller
{
    public  function  index(){
        $Conf = Conf::orderBy('conf_order', 'asc')->paginate(3);
        return view('admin.config.index',compact('Conf'));
    }
    //ajax 排序
    public  function changeOrder(){
        $input = Input::all();
        //var_dump($input);exit;
        $cate = Conf::find($input['conf_id']);
        $cate->conf_order = $input['orderid'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' =>1,
                'msg'   =>'排序更新成功'
            ];
        }else{
            $data = [
                'status' =>0,
                'msg'   =>'排序更新失败'
            ];

        }
        return $data;
    }
    //添加表单回显
    public  function create(){
        return view('admin.config.add',compact('data'));
    }

    //添加数据
    public function store(){
        $input = Input::except('_token');
//        $input['art_time'] = time();
        $rules = [
            'conf_name' => 'required',
            'conf_title' => 'required',//必填're_password_c' => 'required|between:6,20|confirmed',//必填
        ];
        $message = [
            'conf_name.required' => '配置名称不能为空!',
            'conf_title.required' => '配置标题不能为空!',
        ];
        $validator = Validator::make($input, $rules, $message);
        if ($validator->passes()) {
            $re = Conf::create($input);
            if ($re) {
                return redirect('admin/conf');
            } else {
                return back()->withErrors('errors', '配置添加失败');
            }
        } else {
            return back()->withErrors($validator);
        }

    }
    public function edit($conf_id)
    {
        //find this Conf info;
        $link = Conf::find($conf_id);
        $tag= $link->field_type;
//        dd($tag);
        if( $tag=="input"){
            $data =[
                 '<input  type="radio" name="field_type" class="field_type" checked value="input"> 输入框',
                 '<input type="radio" name="field_type" class="field_type" value="radio">单选框',
                 ' <input type="radio" name="field_type"  class="field_type" value="textarea">文本框'
            ];

           $va=[
               "<input type='text'  id='text'  name='field_value' value='$link->field_value' >",
               '<input type="radio"   name="field_value"  value="1"/><span>开启&nbsp;&nbsp;&nbsp;&nbsp;</span>',
               ' <input type="radio"   name="field_value" value="2"/><span>关闭</span>',
               "<textarea id='textarea' >$link->field_value</textarea>"
           ];

        }else if($tag=="radio"){
            $data =[
                '<input  type="radio" name="field_type" class="field_type"  value="input"> 输入框',
                '<input type="radio" name="field_type" class="field_type" checked value="radio">单选框',
                ' <input type="radio" name="field_type"  class="field_type" value="textarea">文本框'
            ];
            if($link->field_value ==1){
            $va =[
                "<input type='text'  id='text'  name='field_value' value='$link->field_value' >",
                '<input type="radio"   name="field_value" checked value="1"/><span>开启&nbsp;&nbsp;&nbsp;&nbsp;</span>',
                ' <input type="radio"   name="field_value" value="2"/><span>关闭</span>',
                "<textarea id='textarea' >$link->field_value</textarea>"
            ];

            }else{
                $va =[
                    "<input type='text'  id='text'  name='field_value' value='$link->field_value' >",
                    '<input type="radio"   name="field_value"  value="1"/><span>开启&nbsp;&nbsp;&nbsp;&nbsp;</span>',
                    ' <input type="radio"   name="field_value" checked value="2"/><span>关闭</span>',
                    "<textarea id='textarea' >$link->field_value</textarea>"
                ];

            }
        }else{
            $data =[
                '<input  type="radio" name="field_type" class="field_type"  value="input"> 输入框',
                '<input type="radio" name="field_type" class="field_type"   value="radio">单选框',
                ' <input type="radio" name="field_type"  class="field_type" checked value="textarea">文本框'
            ];
            $va =[
                "<input type='text'  id='text'  name='field_value' value='$link->field_value' >",
                '<input type="radio"   name="field_value"  value="1"/><span>开启&nbsp;&nbsp;&nbsp;&nbsp;</span>',
                ' <input type="radio"   name="field_value" value="2"/><span>关闭</span>',
                "<textarea id='textarea' >$link->field_value</textarea>"
            ];
        }

        return view('admin.config.edit', compact( 'link','data','va'));
    }

    public function update($art_id)
    {
        $input = Input::except('_token', '_method');
        $re = Conf::where('conf_id', $art_id)->update($input);
        if ($re) {
            return redirect('admin/Conf');
        } else {
            return back()->withErrors('errors', '编辑导航信息失败!');
        }
    }

    public function destroy($conf_id)
    {
        $re = Conf::where('conf_id', $conf_id)->delete();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '删除导航栏目链成功!'
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '删除导航栏目失败!'
            ];

        }
        return $data;
    }
}
