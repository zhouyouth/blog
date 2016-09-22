<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    public  function  index(){
        $link = Links::orderBy('link_id', 'desc')->paginate(3);
        return view('admin.links.index',compact('link'));
    }
    //ajax 排序
    public  function changeOrder(){
        $input = Input::all();
        echo "123";exit;
        $cate = Links::find($input['link_id']);
        $cate->link_order = $input['orderid'];
        $re = $cate->update();
        //var_dump($re);exit;
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
}
