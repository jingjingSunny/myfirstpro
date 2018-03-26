<?php
use Illuminate\Http\Request;

	function userstatus($status){
		switch($status){
			case 0:
				return $status="关闭";
			break;
			case 1:
				return $status="开启";
			break;
		}
	}
	function userauth($auth){
		switch($auth){
			case 1:
				return $auth="超级管理员";
			break;
			case 2:
				return $auth="管理员";
			break;
			case 3:
				return $auth="用户";
			break;
		}
	}

	function savesession($request,$id){
	    $request->session()->put('did',$id);
	}
?>