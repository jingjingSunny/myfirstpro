<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\CheckValRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //
        
		
        return view('/admin/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(CheckValRequest $request)
    {
    	
       	//验证用户
       	$name=$request->name;
		$password=$request->password;
		$res = DB::table('roots')
				->where('name',$name)
				->where('password',$password)
				->get();
//	    dd($res);
		if(empty($res)){
			return redirect('/admin/login');
		}else{
			//获取用户信息
			$rootid=$res[0]['id'];
			$rname=$res[0]['name'];
			$request->session()->put('rid',$rootid);
			$request->session()->put('rname',$rname);
			//跳转首页
			return redirect('/admin/index');
		}
    }

}
