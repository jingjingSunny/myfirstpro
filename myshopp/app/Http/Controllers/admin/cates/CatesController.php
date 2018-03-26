<?php

namespace App\Http\Controllers\admin\cates;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\Cates;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class CatesController extends Controller
{
/*
            考虑到我们的商城主页视图界面当中的分类信息遍历相对困难,因此,我们需要采用一种方式,
        将我们的分类数据拼装成一个可以直接使用的数组! 案例如下:
        
        $cates = [
                    [
                        'id'=>1,
                        'name'=>'服装',
                        'sub'=>[
                                    [
                                        'id'=>3,
                                        'name'=>'男装',
                                        'sub'=>[
                                                    [
                                                        'id'=>'5',
                                                        'name'=>'羽绒服',
                                                        'sub'=>[],
                                                    ],
                                                    [
                                                        'id'=>'6',
                                                        'name'=>'毛呢外套',
                                                    ],
                                               ],
                                    ],
                                    [
                                        'id'=>4,
                                        'name'=>'女装',
                                    ],
                               ],
                    ],
                    [
                        'id'=>2,
                        'name'=>'箱包'
                    ],
                ]
    */
	public static function getCatesforeach($pid){
		//查询第一层数据
		$res=Cates::where('pid',$pid)->get()->toArray();
		$data=[];
		//遍历
		foreach($res as $k=>$v){
			$v['sub']=self::getCatesforeach($v['id']);
			$data[]=$v;
		}
		return $data;
	}
	
	
	
	public static function getCates(){
		$cates=Cates::select(DB::raw('*,concat(path,",",id) npath'))
						->groupBy('npath')
						->get()
						->toArray();
						
		//获取path的逗号数量
		foreach($cates as $k=>$v){
			$len=substr_count($v['path'], ",");
			$cates[$k]['name']=str_repeat("|----", $len).$v['name'];
		}
		return $cates;
	} 
	
	
    public function getIndex(Request $request){
//  	dd(self::getCatesforeach(0));
		if($request->keywords){
    		$res = Cates::where('name','like','%'.$request->keywords.'%')->paginate($request->num);
			
    	}else{
    		$res = Cates::paginate($request->num ?? 10);
    	}
    	// dd($res);
		// $res=self::getCates();

    	return view('admin/cates/index',['res'=>$res,"request"=>$request]);
    }
	
	public function getAdd($id=""){
		$data=self::getCates();
    	return view('admin/cates/add',['data'=>$data,'id'=>$id]);
    }
	
	public function postInsert(Request $request){
		$data=$request->except('_token');
		if($request->pid==0){
			
			$data['path']=0;
			
			$res=Cates::insert($data);
		}else{
			//获取父级path
			$path=Cates::where('id',$data['pid'])
						->first()
						->toArray()['path'];
			//拼接path
			$path=$path.','.$data['pid'];
			$data['path']=$path;
			$res=Cates::insert($data);
		}
		if($res){
				return redirect('admin/cates')->with('success',$data['name']."添加成功");
			}else{
				return back()->width('error',$data['name']."添加失败");
			}
	}
	public function getDelete($id){
		
		$res=Cates::where('pid',$id)
			->get()
			->toArray();
		if(!empty($res)){

			return back()->with('error','该类别下有子类信息,谨慎删除！');
			
		}else{
		    $info=Cates::find($id);
                    $info->delete();
			if($info->trashed()){
				return redirect('admin/cates/index')->with('success',"删除成功");
			}else{
				return back()->width('error','删除失败！');
			}
		}
	}
	public function getEdit($id){
		$res=Cates::select('id','name')->where('id',$id)->first()->toArray();
		return view('admin/cates/edit',['res'=>$res]);
	}
	public function postUpdate(Request $request,$id){
		
		$res=Cates::where('id',$id)->update(['name'=>$request->name]);
		if($res){
			return redirect('admin/cates/index')->with('success',"修改成功");
		}else{
			return back()->width('error','修改失败！');
		}
	}

	//回收站
	public function returnback(Request $request){
            //查找软删除信息
            $res=Cates::onlyTrashed()->get()->toArray();
            //dd($res);
            return view('admin/cates/back',['res'=>$res,'request'=>$request]);
        }

    //恢复
    public function restore($id){

            $res = Cates::withTrashed()->find($id);
            $info=$res->restore();
            if($info){
                return redirect('admin/cates');
            }

    }
    //永久删除
    public function del($id){
            Cates::withTrashed()->find($id)->forceDelete();
            return redirect('admin/cates/backs');
        }
}
