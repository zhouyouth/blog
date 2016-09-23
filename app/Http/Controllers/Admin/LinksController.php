<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

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
        //$data=Category::where('cate_pid',0)->get();
        return view('admin.links.add',compact('data'));
    }
}
