<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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
      $data=Category::where('cate_pid',0)->get();
      return view('admin.category.add',compact('data'));
  }
  //添加
    public function  store(){
      $input=Input::except('_token');
      $rules = [
          'cate_name' => 'required',//必填're_password_c' => 'required|between:6,20|confirmed',//必填
      ];
      $message=[
          'cate_name.required'=>'分类名称不能为空!',
      ];

      $validator = Validator::make($input, $rules,$message);
      if($validator->passes()){
          $re =Category::create($input);
          if($re){
              return redirect('admin/category');
          }else{
              return back()->withErrors('errors','分类添加失败');
          }

      }else{

          return back()->withErrors($validator);
      }
     public function edit($cate_id){
        $field = Category::find($cate_id);
            dd($field);
        return view('admin.category.edit');
        }
  }
}
