<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{
    public  function  index(){
        $navs = Navs::orderBy('nav_order', 'asc')->paginate(3);
        return view('admin.navs.index',compact('navs'));
    }
    //ajax 排序
    public  function changeOrder(){
        $input = Input::all();
        $cate = Navs::find($input['nav_id']);
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
        return view('admin.navs.add',compact('data'));
    }
    //添加数据
    public function store(){
        $input = Input::except('_token');
//        $input['art_time'] = time();
        $rules = [
            'nav_alias' => 'required',
            'nav_name' => 'required',//必填're_password_c' => 'required|between:6,20|confirmed',//必填
        ];
        $message = [
            'nav_alias.required' => '导航栏目不能为空!',
            'nav_name.required' => '导航栏目标题不能为空!',
        ];
        $validator = Validator::make($input, $rules, $message);
        if ($validator->passes()) {
            $re = Navs::create($input);
            if ($re) {
                return redirect('admin/navs');
            } else {
                return back()->withErrors('errors', '导航栏目添加失败');
            }
        } else {
            return back()->withErrors($validator);
        }

    }
    public function edit($art_id)
    {
        //find this Navs info;
        $link = Navs::find($art_id);
        return view('admin.navs.edit', compact( 'link'));
    }

    public function update($art_id)
    {
        $input = Input::except('_token', '_method');
        $re = Navs::where('link_id', $art_id)->update($input);
        if ($re) {
            return redirect('admin/navs');
        } else {
            return back()->withErrors('errors', '编辑文章失败!');
        }
    }

    public function destroy($art_id)
    {
        $re = Navs::where('link_id', $art_id)->delete();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '删除导航栏目链成功!'
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '删除友链链接失败!'
            ];

        }
        return $data;
    }
}
