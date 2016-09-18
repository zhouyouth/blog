<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;

class CategoryController extends CommonController
{
    //cate list
    public function index()
    {
        //dd("hello");
        $category = Category::all();
        $data = $this->getTree($category);

        return view('admin.category.index')->with('category', $category);

    }

    public function  getTree($data)
    {
        $arr= array();
        foreach ($data as $k=> $v) {
            if ($v->cate_pid==0) {
               //$arr[]=$data[$k];
                $arr[]=$v;
                foreach($data as $m => $n){
                  if($n->cate_pid ==$v->cate_id){
                      $arr[] = $n;
                  }

                }
            }
        }
       return $arr;
    }


}
