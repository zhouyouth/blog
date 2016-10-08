<?php
namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller{
      public  function __construct(){
          //热点文章
          $hot =Article::orderBy('art_view','desc')->take(6)->get();

          View::share('hot',$hot);

      }



}


