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
  public function  store(){
      $input=Input::all();
      $rules = [
          'cate_name' => 'required',//必填're_password_c' => 'required|between:6,20|confirmed',//必填
      ];
      $message=[
          'cate_name.required'=>'新密码不能为空!',


      ];

      $validator = Validator::make($input, $rules,$message);
      dd($validator);
//      if($validator->passes()){
//          $user = User::first();
//
//          $_password = Crypt::decrypt($user->user_pass);
//          if($input['user_pass']==$_password){
//              $user->user_pass = Crypt::encrypt($input['new_password']);
//              $user->update();
//              return back()->with('errors','密码修改成功!');
//          }else{
//              return back()->with('errors','原密码错误!');
//          }
//      } else {
//          // dd($validator);
//          return back()->withErrors($validator);
//      }


  }
}
