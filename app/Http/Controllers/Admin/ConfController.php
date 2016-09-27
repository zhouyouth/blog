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
        var_dump($input);exit;
        $cate = Conf::find($input['conf_id']);
        $cate->nav_order = $input['orderid'];
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
                return back()->withErrors('errors', '导航栏目添加失败');
            }
        } else {
            return back()->withErrors($validator);
        }

    }
    public function edit($nav_id)
    {
        //find this Conf info;
        $link = Conf::find($nav_id);
        return view('admin.Conf.edit', compact( 'link'));
    }

    public function update($art_id)
    {
        $input = Input::except('_token', '_method');
        $re = Conf::where('nav_id', $art_id)->update($input);
        if ($re) {
            return redirect('admin/Conf');
        } else {
            return back()->withErrors('errors', '编辑导航信息失败!');
        }
    }

    public function destroy($nav_id)
    {
        $re = Conf::where('nav_id', $nav_id)->delete();
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
