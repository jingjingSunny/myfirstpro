<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Users;
use DB;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	if($request->keywords){
    		$user = Users::where('username','like','%'.$request->keywords.'%')->paginate($request->num);
			
    	}else{
    		
    		$user = Users::paginate($request->num ?? 10);
    	}
        
        return view('/admin/user/user',['res'=>$user,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/user/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
	        'username' => 'required',
	        'password'=>'required',
	        'surepass'=>'required | same:password',
	        'status'=>'required',
	        'auth'=>'required'
    	],[
    		'username.required'=>'用户名不能为空',
    		'password.required'=>'密码不能为空',
    		'surepass.required'=>'确认不能为空',
    		'surepass.same'=>'密码不一致',
    		'status.required'=>'请选择用户状态',
    		'auth.required'=>'请选择用户权限'
    	]);
		
		//获取用户信息
		$data=$request->except(['_token','surepass']);
		
		//加密密码
		$data['password']=Hash::make($data['password']);
		$res=Users::insert($data);
		if($res){
			return redirect('/admin/user');
		}else{
			return back();
		}
//      $nickname = $request->nickname;
//		$userpass = $request->userpass;
//		$phone=$request->phone;
//		
//		$res=DB::table('user')
//			->insert([
//				'nickname'=>$nickname,
//				'userpass'=>$userpass,
//				'phone'=>$phone,
//				'insert_at'=>date("Y-m-d h:i:s")
//			]);
//		if($res){
//			return redirect('/admin/user');
//		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view("errors/404");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询用户信息
        $res=Users::find($id)
        			->toArray();
		if($res){
			return view('/admin/user/edit',['res'=>$res]);
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
	        'username' => 'required',
	        'password'=>'required',
	        'status'=>'required',
	        'auth'=>'required'
    	],[
    		'username.required'=>'用户名不能为空',
    		'password.required'=>'密码不能为空',
    		'status.required'=>'请选择用户状态',
    		'auth.required'=>'请选择用户权限'
    	]);
		
		//获取用户信息
		$data=$request->except(['_token','surepass']);
		
		//加密密码
		$data['password']=Hash::make($data['password']);
		 $res=Users::where('id',$id)
		 			->update([
		 				'username'=>$data['username'],
		 				'password'=>$data['password'],
		 				'status'=>$data['status'],
		 				'auth'=>$data['auth']
		 			]);
//		$res=DB::table('user')
//			->where('id',$id)
//			->update([
//				'nickname'=>$nickname,
//				'userpass'=>$userpass,
//				'phone'=>$phone,
//				'insert_at'=>date("Y-m-d h:i:s")
//			]);
        if($res){
        	return redirect('/admin/user');
        }
		
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $res=Users::find($id);
        $res->delete();
        if ($res->trashed()){
          return redirect("/admin/user");
        }else{
            return back()->with('error','删除失败');
        }
    }
    public function returnback(Request $request){
        //查找软删除信息
        $res=Users::onlyTrashed()->get()->toArray();
        //更改用户状态
        for($i=0;$i<count($res);$i++){
            $res[$i]['status']=0;
        }
        return view('admin/user/back',['res'=>$res,'request'=>$request]);
    }
    public function restore($id){
        $res = Users::withTrashed()->find($id);
        $info=$res->restore();
        if($info){
            return redirect('admin/user');
        }

    }
    public function delete($id){
        Users::withTrashed()->find($id)->forceDelete();
        return redirect('admin/user/backs'); 
    }
        
}
