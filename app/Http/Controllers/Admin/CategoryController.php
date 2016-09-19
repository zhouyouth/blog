<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;

class CategoryController extends CommonController
{
    //cate list
    public function index()
    {
        //dd("hello");
        $category = Category::tree();

//        var_dump($category);exit;

        return view('admin.category.index')->with('category', $category);

    }
//ajax 排序
    public  function changeOrder(){
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['orderid'];
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
  public function  create(){
      return view('admin.category.add');
  }
}
