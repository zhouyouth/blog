<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends CommonController
{
   //article list
    public  function  index(){
       echo "123article";


   }
  //添加文章回显
   public  function create() {
       $data=Category::where('cate_pid',0)->get();
      return view('admin.article.add',compact('data'));
   }

}


