<?php
namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller{
      public  function __construct(){
          //导航
          $navs =  Navs::all();
          //热点文章
          $hot =Article::orderBy('art_view','desc')->take(6)->get();

          //点击排行
          $rank= Article::orderBy('art_view','desc')->take(5)->get();
          $new = Article::orderBy('art_time','desc')->take(8)->get();
          //友情链接
          $links =Links::orderBy('link_order','asc')->get();
          View::share('hot',$hot);
          View::share('new',$new);
          View::share('rank',$rank);
          View::share('links',$links);
          View::share('navs',$navs);
      }



}


