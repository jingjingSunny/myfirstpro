<?php

namespace App\Http\Controllers\admin\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\cates\CatesController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Goods;
use DB;
use Cache;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        if($request->keywords){
            $goods = Goods::where('gName','like','%'.$request->keywords.'%')->paginate($request->num);
        }else{
            $goods = Goods::paginate($request->num ?? 10);
        }
        $rs = $goods->toArray()['data'];
        for($i=0;$i<count($rs);$i++){
            $name=DB::select('select name from cates as c where '.$rs[$i]["cateId"].'=c.id');
            if(!empty($name)){
                $rs[$i]['catesName']=$name[0]['name'];
            }else{
                $name[0]['name']=$rs[$i]['gName'];
                $rs[$i]['catesName']=$name[0]['name'];
            }
        }
        return view('/admin/goods/index',['goods'=>$goods,'rs'=>$rs,'request'=>$request]);
    }

    public function getEdit($id){
        return view();
    }
    public function getAdd(){
        $res=CatesController::getCates();

        return view('admin/goods/add',['data'=>$res]);

    }

    public function postInsert(Request $request){
        $res=$request->except('_token');
        $res['gColor']=implode(",",$res['gColor'] );
        $res['gSize']=implode(',',$res['gSize']);
        //获取图片
        if ($request->hasFile('gImg')) {
            //判断文件是否有效
            if ($request->file('gImg')->isValid()) {
                //获取文件后缀名
                $ext=$request->file('gImg')->getClientOriginalExtension();
                //拼接名字
                $newfilename = date('Ymdhis').".".$ext;
                $res['gImg']=$newfilename;
                //执行上传文件
                $request->file('gImg')->move('./admin/uploads', $newfilename);
                //插入数据到数据库
                $info=Goods::insert($res);
                if($info){
                    return redirect('admin/goods');
                }else{
                    return back()->with('error','添加失败');
                }
            }else{
                return back()->with('error','上传的无效文件');
            }
        }else{
            return back()->with('error','图片没有上传');
        }
    }

    public function postDelete($id){
            $info=Goods::find($id)->delete();
            if($info){
                return redirect('/admin/goods');
            }else{
                return back()->with('error','删除失败');
            }
        }



}