@extends('layouts.admin.index')
@section('title', '商品管理')
@section("style5")
    color: #c5d52b;
@endsection
@section('content')

<style type="text/css">
		.tc{display: block;color: black;}
        .tc a:hover{opacity: 0.6;}
</style>
	 <div class="container">
	 	<div class="mws-panel grid_8">
        	<div class="mws-panel-header">
            	<span><i class="icon-table"></i>商品信息</span>
            </div>
            <div class="mws-panel-body no-padding">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                	<form action="/admin/goods" method="get">	
                    	<div id="DataTables_Table_1_length" class="dataTables_length">
                    		<label>Show 
	                        	<select size="1" name="num" aria-controls="DataTables_Table_1">
	                        		<option value="10" {{ $request->num == 10 ? 'selected' : ""}}>10</option>
	                        		<option value="25" {{ $request->num == 25 ? 'selected' : ""}}>25</option>
	                        		<option value="50" {{ $request->num == 50 ? 'selected': ""}}>50</option>
	                        		<option value="100" {{ $request->num == 100 ? 'selected' : ""}}>100</option>
	                        	</select> entries
                        	</label>
                    	</div>
                		<div class="dataTables_filter" id="DataTables_Table_1_filter">
                			<label>Search: <input aria-controls="DataTables_Table_1" name="keywords" type="text" value="{{$request->keywords}}"></label>
                			<button type="submit" class="btn btn-danger">搜索</button>
                		</div>
            		</form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                        	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">商品id</th>
                        	
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">商品名称</th>
                        	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">商品价格</th>
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">商品图片</th>
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">商品库存</th>
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">是否上架</th>
                        	<!--<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">是否精品</th>-->
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">是否热卖</th>
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">是否新品</th>
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">所属分类</th>
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">品牌ID</th>

                        	<!--<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Engine version: activate to sort column ascending">商品描述</th>-->
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">销售量</th>
                        	<!--<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">商品访问量</th>-->
                        	<!--<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">商品评价数</th>-->
                        	<!--<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">商品颜色</th>-->
                        	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">操作</th>
                        	</tr>
                        	
                    </thead>
                    
               	 	<tbody role="alert" aria-live="polite" aria-relevant="all">
                	@foreach ($rs as $k=>$v)
                		@if($k%2==1)
                		<tr class="odd" align="center">
                		@else
                		<tr class="even" align="center">
                		@endif
                            <td class="  sorting_1">{{$v['id']}}</td>
                            <td class=" ">{{str_limit($v['gName'],6)}}</td>
							<td class=" ">{{$v['gPrice']}}</td>
                            <td class=" "><img src="/admin/uploads/{{$v['gImg']}}"></td>
                            <td class=" ">{{$v['gStock']}}</td>
                            <td class=" ">{{$v['isSale']==0 ? "否":"是"}}</td>
                            <!--<td class=" ">{{$v['isBest']==0 ? "否":"是"}}</td>-->
                            <td class=" ">{{$v['isHot']==0 ? "否":"是"}}</td>
                            <td class=" ">{{$v['isNew']==0 ? "否":"是"}}</td>
                            <td class=" ">{{$v['catesName']}}</td>
                            <td class=" ">{{$v['brandId']}}</td>
                            <!--<td class=" ">{{ str_limit($v['gDesc'],5)}}</td>-->
                            <td class=" ">{{$v['saleNum']}}</td>
                            <!--<td class=" ">{{$v['visitNum']}}</td>-->
                            <!--<td class=" ">{{$v['appraiseNum']}}</td>-->
                            <!--<td class=" ">{{$v['gColor']}}</td>-->
                            <td class="">
                               <a   {{savesession($request,$v['id']) }}  class="tc">详情</a>
                            	<a   href="/admin/goods/edit/{{$v['id']}}"><i class="icol-pencil"></i></a>
                            	<form style="display: inline;" action="/admin/goods/delete/{{$v['id']}}" method="post">
                            		{{ csrf_field() }}
                            		<button  type="submit" style="vertical-align: top;outline: none;border: none;background: none;" ><i class="icol-cross"></i></button>
                            	</form>
                            	
                            </td>
                        </tr>
                    @endforeach
                       
                     </tbody>
               	</table>
                     <div class="dataTables_info" id="DataTables_Table_1_info">
                     	@if(!$request->keywords)
                     	从
                     	{{($goods->currentPage()-1) * ($goods->perPage()-0)+1}}
                     	条
                     	到
                     	{{($goods->perPage()-0)*($goods->currentPage()-1)+$goods->count()}}
                     	条
                     	❤
                     	共
                     	{{$goods->total()}}
                     	条
                     	@else
                     	共
                     	{{$goods->total()}}
                     	条
                     	@endif
                     </div>
                     
                     <div class="dataTables_paginate paging_full_numbers" id="page">
                     	{!! $goods->appends($request->all())->render() !!}
                    </div>
                </div>
            </div>
        </div>
	 </div>
        <link rel="stylesheet" type="text/css" href="/tanchuang/css/normalize.css" />


        <div id="gray"></div>

        <div class="popup" id="popup">
            <div class="top_nav" id='top_nav'>
                <div align="center">
                    <span>信息展示</span>
                    <a class="guanbi"></a>

                </div>
            </div>
            <div class="min">
                <div class="tc_login">
                    <span>{{$request->session()->get('did')}}</span>
                </div>
            </div>
        </div>
        <script src="/tanchuang/js/jquery-1.11.0.min.js" type="text/javascript"></script>
     	<script type="text/javascript">
     		//窗口效果
     		//点击登录class为tc 显示
     		$(".tc").click(function(){
     			$("#gray").show();
     			$("#popup").show();//查找ID为popup的DIV show()显示#gray
     			tc_center();
                $.get()
     		});

     		//点击关闭按钮
     		$("a.guanbi").click(function(){

     			$("#gray").hide();
     			$("#popup").hide();//查找ID为popup的DIV hide()隐藏
     		})

     		//窗口水平居中
     		$(window).resize(function(){
     			tc_center();
     		});

     		function tc_center(){
     			var _top=($(window).height()-$(".popup").height())/2;
     			var _left=($(window).width()-$(".popup").width())/2;

     			$(".popup").css({top:_top,left:_left});
     		}
     		</script>

     		<script type="text/javascript">
     		$(document).ready(function(){

     			$(".top_nav").mousedown(function(e){
     				$(this).css("cursor","move");//改变鼠标指针的形状
     				var offset = $(this).offset();//DIV在页面的位置
     				var x = e.pageX - offset.left;//获得鼠标指针离DIV元素左边界的距离
     				var y = e.pageY - offset.top;//获得鼠标指针离DIV元素上边界的距离
     				$(document).bind("mousemove",function(ev){ //绑定鼠标的移动事件，因为光标在DIV元素外面也要有效果，所以要用doucment的事件，而不用DIV元素的事件

     					$(".popup").stop();//加上这个之后

     					var _x = ev.pageX - x;//获得X轴方向移动的值
     					var _y = ev.pageY - y;//获得Y轴方向移动的值

     					$(".popup").animate({left:_x+"px",top:_y+"px"},10);
     				});

     			});

     			$(document).mouseup(function() {
     				$(".popup").css("cursor","default");
     				$(this).unbind("mousemove");
     			});
     		})
     		</script>


@endsection