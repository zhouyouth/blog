<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;

class CategoryController extends CommonController
{
    //cate list
    public  function index(){
     //dd("hello");
      $dategorys = Category::all();
        dd($dategorys);


    }

}
