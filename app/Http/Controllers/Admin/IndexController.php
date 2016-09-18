<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\http\Model\User;
use Illuminate\Support\Facades\Crypt;

class IndexController extends Controller
{
    public function index()
    {
        //echo "123";
        return view('admin.index');
    }

    public function info()
    {
        //echo get_cfg_var('upload_max_filesize');exit;
        return view('admin.info');
    }

    //更改超级管理员密码
    public function  pass()
    {
        if ($input = Input::all()) {
            $rules = [
                'new_password' => 'required|between:6,20|confirmed',//必填're_password_c' => 'required|between:6,20|confirmed',//必填
            ];
            $message=[
                'new_password.required'=>'新密码不能为空!',
                'new_password.between'=>'新密码必须在6-20位之间!',
                'new_password.confirmed'=>'确认密码和密码不一致!',

            ];
            $validator = Validator::make($input, $rules,$message);
            if($validator->passes()){
              $user = User::first();

              $_password = Crypt::decrypt($user->user_pass);
              if($input['user_pass']==$_password){
                 $user->user_pass = Crypt::encrypt($input['new_password']);
                 $user->update();
                  return redirect("admin/info");
              }
            } else {
               // dd($validator);
                return back()->withErrors($validator);
            }
        }else {
            return view('admin.pass');
        }
//

    }
}
