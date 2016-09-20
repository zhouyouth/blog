<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
   //upload piture
    public  function  upload(){

        echo "图片上传";
    }
    public  function  index(){

        echo "index";
    }
}
