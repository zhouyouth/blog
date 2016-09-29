<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
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
        dd($data);
       return view('home.index');
    }
    public function lis(){
        return view('home.list');

  }
    public function detail(){
        return view('home.detail');

    }


}
