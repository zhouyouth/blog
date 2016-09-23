<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
    public  function  index(){
        $link = Links::orderBy('link_order', 'asc')->paginate(3);
        return view('admin.links.index',compact('link'));
    }
    //ajax 排序
    public  function changeOrder(){
        $input = Input::all();
        $cate = Links::find($input['link_id']);
        $cate->link_order = $input['orderid'];
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
        return view('admin.links.add',compact('data'));
    }
    //添加数据
    public function store(){
        $input = Input::except('_token');
//        $input['art_time'] = time();
        $rules = [
            'link_title' => 'required',
            'link_name' => 'required',//必填're_password_c' => 'required|between:6,20|confirmed',//必填
        ];
        $message = [
            'link_title.required' => '友情链接名称不能为空!',
            'link_name.required' => '友情链接标题不能为空!',
        ];
        $validator = Validator::make($input, $rules, $message);
        if ($validator->passes()) {
            $re = Links::create($input);
            if ($re) {
                return redirect('admin/links');
            } else {
                return back()->withErrors('errors', '友情链接添加失败');
            }
        } else {
            return back()->withErrors($validator);
        }

    }
    public function edit($art_id)
    {
        //find this links info;
        $link = Links::find($art_id);
        return view('admin.links.edit', compact( 'link'));
    }

    public function update($art_id)
    {
        $input = Input::except('_token', '_method');
        $re = Links::where('link_id', $art_id)->update($input);
        if ($re) {
            return redirect('admin/links');
        } else {
            return back()->withErrors('errors', '编辑文章失败!');
        }
    }

    public function destroy($art_id)
    {
        $re = Links::where('link_id', $art_id)->delete();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '删除友链成功!'
            ];
        } else {
                $data = [
                'status' => 1,
                'msg' => '删除友链失败!'
            ];

        }
        return $data;
    }
}
