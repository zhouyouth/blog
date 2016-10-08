<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        //热点文章
        $hot =Article::orderBy('art_view','desc')->take(6)->get();
        //图文列表5篇(带分页)
        $data = Article::orderBy('art_time','desc')->paginate(5);
        //最新发表的文章
        //点击排行
        $rank= Article::orderBy('art_view','desc')->take(5)->get();
        $new = Article::orderBy('art_time','desc')->take(8)->get();
        //友情链接
        $links =Links::orderBy('link_order','asc')->get();
        //dd($links);
       return view('home.index',compact('hot','data','rank','new','links'));
    }

    public function cat($cate_id){
        $data  = Article::where('cate_id',$cate_id)->orderby('art_time','desc')->paginate(4);
        $cate= Category::find($cate_id);
        return view('home.list',compact('cate','data'));

  }
    public function detail(){
        return view('home.detail');

    }


}
