<?php

namespace App\Http\Controllers\admin\articles;

use App\Http\Controllers\admin\cates\CatesController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckValRequest;
use App\model\Articles;
use DB;
use Storage;

class ArticlesController extends Controller
{
    public function getIndex(Request $request){

    	//查询文章
    	if($request->keywords){
    		$data = Articles::where('title','like','%'.$request->keywords.'%')->paginate($request->num);

    	}else{

    		$data= Articles::paginate($request->num ?? 10);
    	}
            $test=$data->toArray()['data'];
            for($i=0;$i<count($test);$i++){
                //找作者
                $name=DB::table('roots')->select('name')->where('id',$test[$i]['user_id'])->get()[0]['name'];
                $test[$i]['name']=$name; 
                //找类别
                $catesname=DB::select('select name from cates as c where '.$test[$i]["cate_id"].'=c.id');

                if(empty($catesname)){
                    $test[0]['name']=$test[$i]['title'];
                    $test[$i]['catesName']=$test[0]['name'];
                }else{
                    $test[$i]['catesName']=$catesname[0]['name'];
                    
                }
                
            }
    	return view('admin/articles/index',['data'=>$data,'test'=>$test,'request'=>$request]);
    }
	
	public function getAdd(){
		$res=CatesController::getCates();
		return view('admin/articles/add',['data'=>$res]);
	}
	public function postInsert(CheckValRequest $request){
		//获取用户输入信息
		$res=$request->except('_token');
		//判断是否上传文件
		if ($request->hasFile('picture')) {
    		//判断文件是否有效
    		if ($request->file('picture')->isValid()) {
    			
			    //获取图片后缀名
				$ext=$request->file('picture')->getClientOriginalExtension();
				$newfilename=date('Ymdhis').".".$ext;
			 //    //执行上传图片
			    $request->file('picture')->move('./admin/uploads', $newfilename);
				
				//拼装数据
				$res['picture']=$newfilename;
				$res['user_id']=$request->session()->get('rid');
				
				$info=Articles::insert($res);
				if($info){
					return redirect('/admin/articles');
				}else{
					return back()->with('error','添加失败');
				}
				
			}else{
				return back()->with('error','请上传有效的图片');
			}
		}else{
			return back()->with('error','还没有上传图片哟');
		}
	}

    public function getEdit($id){
        //查询数据
        $cates=CatesController::getCates();
        $res=Articles::where('id',$id)->first()->toArray();
        //查询分类
        if($res['cate_id']==0){
            $res['catesName']=$res['title'];
        }else{
            //匹配分类
           $jieguo=DB::select('select c.name from  cates as  c  where '.$res["cate_id"].'=c.id');
           $res['catesName']=$jieguo[0]['name'];
        }
        // dd($res);
        return view('admin/articles/edit',['res'=>$res,'cates'=>$cates]);
    }

    public function postUpdate(Request $request,$id){
        $res = $request->except('_token');
        //处理图片
        $picture=DB::table('articles')
                       ->select('picture')
                       ->where('id',$id)
                       ->get();
        // dd($request->all());
        if($request->hasFile('picture')){
            //判断文件是否有效
            if ($request->file('picture')->isValid()) {
                //删除原图
                $path = public_path();
                unlink($path.'\admin\uploads\\'.$picture[0]['picture']);
                //获取图片后缀名
                $ext=$request->file('picture')->getClientOriginalExtension();
                $newfilename=date('Ymdhis').".".$ext;
             //    //执行上传图片
                $request->file('picture')->move('./admin/uploads', $newfilename);
                
                //拼装数据
                $res['picture']=$newfilename;
                $res['updated_at']=date('Y-m-d H:i:s');
                
                $info=Articles::where('id',$id)->update($res);
                if($info){
                    return redirect('/admin/articles');
                }else{
                    return back()->with('error','添加失败');
                }
                
            }else{
                return back()->with('error','请上传有效的图片');
            }
           
        }else{

             //使用原图
            $res['picture']=$picture[0]['picture'];
            // 修改时间
            $res['updated_at']=date('Y-m-d H:i:s');
            // dd($res);
            $info=Articles::where('id',$id)->update($res);
            if($info){
                return redirect('/admin/articles');
            }else{
                return back()->with('error','修改失败');
            }

        }
        
        // dd(Storage::size('\admin\uploads\\'.$res['picture']));
    }
    //删除
    public function postDelete($id){
        $info=Articles::find($id)->delete();
        if($info){
            return redirect('/admin/articles');
        }else{
            return back()->with('error','删除失败');
        }
    }

}
