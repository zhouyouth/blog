<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
       return view('home.index');
    }
    public function lis(){
        return view('home.list');

  }
    public function detail(){
        return view('home.detail');

    }


}
