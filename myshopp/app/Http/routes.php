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

Route::get('/', function () {
    return view('welcome');
});
//登录页
Route::controller('/admin/login','LoginController');

//进入页面时判断是否登录--中间件
Route::group(['middleware'=>'admin_log'],function(){
	Route::resource('admin/index','admin\index\IndexController');
	//后台用户
	
	Route::get('admin/user/backs', 'admin\user\UserController@returnback'); //回收站
	Route::get('admin/user/restores/{id}', 'admin\user\UserController@restore');	
	Route::get('admin/user/delete/{id}', 'admin\user\UserController@delete');
	Route::resource('admin/user','admin\user\UserController');
	
	//分类
	Route::get('admin/cates/backs', 'admin\cates\CatesController@returnback'); //回收站
	Route::get('admin/cates/restores/{id}', 'admin\cates\CatesController@restore');
	Route::get('admin/cates/del/{id}', 'admin\cates\CatesController@del');
	Route::controller('admin/cates','admin\cates\CatesController');

	//文章
	Route::controller('admin/articles','admin\articles\ArticlesController');
	//商品
	Route::controller('admin/goods','admin\goods\GoodsController');
});

Route::any('/login', function()
	{
		if(Request::session()->has('rid')){
			return back();
		}
		
	    if (Request::getMethod() == 'POST')
	    {
	        $rules = ['captcha' => 'required|captcha'];
	        $validator = Validator::make(Input::all(), $rules);
	        if ($validator->fails())
	        {
	           echo "<script>alert('验证码错误');location.href='/login'</script>";
	        }
	        else
	        {
				//获取登陆信息
				$rootname = Request::input('name');
				$rootpass = Request::input('password');
				
				//验证
				$res=DB::select("select * from roots where name=? && password=?",[$rootname,$rootpass]);
				if(empty($res)){
					echo "<script>alert('用户名不存在或密码输入错误');location.href='/login'</script>";
				}else{
					Request::session()->put('rid',$res[0]['id']);
					Request::session()->put('rname',$res[0]['name']);
					echo "<script>location.href='/admin/index'</script>";
				}
				
	        }
	    }

	    return view('/admin/login');
	});