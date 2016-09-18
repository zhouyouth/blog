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
        $category = $this->getTree($category,'cate_id','cate_pid','0','┃━━━');
//        var_dump($category);exit;

        return view('admin.category.index')->with('category', $category);

    }

    public function  getTree($data,$id,$pid,$leve=0,$cate_tag)
    {
        $arr= array();
        foreach ($data as $k=> $v) {
            if ($v->$pid==$leve) {
                $v['_cate_name']= $v['cate_name'];
               //$arr[]=$data[$k];
                $arr[]=$v;
                foreach($data as $m => $n){
                  if($n->$pid ==$v->$id){
                      $n['_cate_name'] = "  ".$cate_tag.$n['cate_name'];
                      $arr[] = $n;
                  }

                }
            }
        }
       return $arr;
    }


}
