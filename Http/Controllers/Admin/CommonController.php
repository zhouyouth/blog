<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
   //upload piture
    public static function  upload(){

        echo "图片上传";
    }
    public static function  index(){

        echo "index";
    }
}
