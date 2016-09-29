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
        $art =Article::all();
        dd($art);
       return view('home.index');
    }
    public function lis(){
        return view('home.list');

  }
    public function detail(){
        return view('home.detail');

    }


}
