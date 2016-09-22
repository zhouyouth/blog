<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{
    public  function  index(){
        $link = Links::orderBy('link_id', 'desc')->paginate(1);
        return view('admin.links.index',compact('link'));
    }
}