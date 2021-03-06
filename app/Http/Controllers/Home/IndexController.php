<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    public function index(){
        $hot =Article::orderBy('art_view','desc')->take(6)->get();
        //图文列表5篇(带分页)
        $data = Article::orderBy('art_time','desc')->paginate(5);
        //最新发表的文章
        //点击排行
        $rank= Article::orderBy('art_view','desc')->take(5)->get();
        $new = Article::orderBy('art_time','desc')->take(8)->get();
        //友情链接
        $links =Links::orderBy('link_order','asc')->get();

       return view('home.index',compact('hot','data','rank','new','links'));
    }

    public function cat($cate_id){

        $data  = Article::where('cate_id',$cate_id)->orderby('art_time','desc')->paginate(4);
        //当前分类的子分类
        Category::where('cate_id',$cate_id)->increment('cate_view');
        $submenu = Category::where('cate_pid',$cate_id)->get();
        $cate= Category::find($cate_id);
        return view('home.list',compact('cate','data','submenu'));
  }
    public function detail($art_id){
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
         //view
         Article::where('art_id',$art_id)->increment('art_view');
        //pre
        $article['pre']=Article::where('art_id','<',$art_id)->orderby('art_id','desc')->first();
        //next
        $article['next']=Article::where('art_id','>',$art_id)->orderby('art_id','asc')->first();
        $data = Article::where('cate_id',$field->cate_id)->orderby('art_id','desc')->take(6)->get();
        return view('home.detail',compact('field','article','data'));
    }


}
