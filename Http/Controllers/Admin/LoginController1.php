<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';
use App\Http\Model\User;

class LoginController extends CommonController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login()
    {
        //echo "你哈!";exit;
        if ($input = Input::all()) {
            //var_dump($input);
            $code = new \Code();
            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', '验证码错误!');
            }else{

                $user= User::first();
//                dd(\Crypt::decrypt($user->user_pass));
               if($user->user_name!=$input['user_name'] || \Crypt::decrypt($user->user_pass)!=$input['user_pass']){

                   return back()->with('msg', '用户名或者密码错误');
               }
                   session(['user'=>$user]);
                   return  redirect('admin/index');
            }
        } else {
            //session(['user'=>null]);
            return view('admin.login');
        }
    }

    public function code()
    {
        $code = new \Code();
        $code->make();
    }

    public function crypt()
    {
        //after crypt encode <250
        $str="admin";
        dd(session('user'));
        echo \Crypt::encrypt($str);

    }
    public  function  quit(){
        session(['user'=>null]);
        return  redirect('admin/login');
    }
}
