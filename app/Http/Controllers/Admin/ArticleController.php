<?php

namespace App\Http\Controllers\Admin;

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

      return view('admin.article');

   }

}


