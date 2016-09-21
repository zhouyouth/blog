<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ArticleController extends CommonController
{
   //article list
    public  function  index(){
       echo "123article";
   }
  //添加文章回显
   public  function create() {
       $data=Category::tree();
      return view('admin.article.add',compact('data'));
   }
   public function store(){
     $input = Input::except('_token');
     $re = Article::create($input);
      dd($re);
   }
}


