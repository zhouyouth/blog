<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
   //article list
    public  function  index(){
        $article = Article::all();
      return view('admin.article.index',compact('article'));
   }
  //添加文章回显
   public  function create() {
       $data=Category::tree();
      return view('admin.article.add',compact('data'));
   }
   public function store(){
     $input = Input::except('_token');
     $input['art_time']= time();
       $rules = [
           'art_title' => 'required',
           'art_editor' => 'required',//必填're_password_c' => 'required|between:6,20|confirmed',//必填
       ];
       $message=[
           'art_title.required'=>'文章名称不能为空!',
           'art_editor.required'=>'作者不能为空!',
       ];
       $validator = Validator::make($input, $rules,$message);
       if($validator->passes()){
           $re = Article::create($input);
           if($re){
               return redirect('admin/article');
           }else{
               return back()->withErrors('errors','文章添加失败');
           }
       }else{
           return back()->withErrors($validator);
       }





   }
}


