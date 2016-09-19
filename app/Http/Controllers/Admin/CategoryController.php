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

    public  function changeOrder(){
      $input = Input::all();
      dd($input);


    }

}
