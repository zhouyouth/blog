<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/zhou', function(){
     echo "svn hook ok 20160916 18:41   ";
});
Route::get('admin/code', "Admin\LoginController@code");
//Route::any('admin/test', "Admin\LoginController@test");

Route::any('admin/login', "Admin\LoginController@login");


Route::group(['middleware' => ['admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('index', "IndexController@index");
    Route::get('info', "IndexController@info");
    Route::get('quit', "LoginController@quit");
    Route::any('pass', "IndexController@pass");

} );






