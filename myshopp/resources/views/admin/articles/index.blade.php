@extends('layouts.admin.index')
@section('title', '浏览文章')
<!--@section('active','active');-->
@section("style4")
    color: #c5d52b;
@endsection
@section('content')
	<div class="container">
	 	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>浏览文章</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        	<form action="/admin/articles" method="get">	
	                        	<div id="DataTables_Table_1_length" class="dataTables_length">
	                        		<label>Show 
			                        	<select size="1" name="num" aria-controls="DataTables_Table_1">
			                        		<option value="10" {{ $request->num == 10 ? 'selected' : ""}}>10</option>
			                        		<option value="25" {{ $request->num == 25 ? 'selected' : ""}}>25</option>
			                        		<option value="50" {{ $request->num == 50 ? 'selected' : ""}}>50</option>
			                        		<option value="100" {{ $request->num == 100 ? 'selected' : ""}}>100</option>
			                        	</select> entries
		                        	</label>
	                        	</div>
	                    		<div class="dataTables_filter" id="DataTables_Table_1_filter">
	                    			<label>Search: <input aria-controls="DataTables_Table_1" name="keywords" type="text" value=""></label>
	                    			<button type="submit" class="btn btn-danger">搜索</button>
	                    		</div>
                    		</form>
                        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                		id
                                	</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 285px;" aria-label="Browser: activate to sort column ascending">
                                		文章标题
                                	</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 213px;" aria-label="CSS grade: activate to sort column ascending">
                                        文章作者
                                    </th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                                		文章简介
                                	</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 137px;" aria-label="Engine version: activate to sort column ascending">
                                		文章详情
                                	</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 213px;" aria-label="CSS grade: activate to sort column ascending">
                                		文章图片
                                	</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 213px;" aria-label="CSS grade: activate to sort column ascending">
                                        文章类别
                                    </th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 266px;" aria-label="CSS grade: activate to sort column ascending">
                                		创建时间
                                	</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Engine version: activate to sort column ascending">
                                		操作
                                	</th>
                                	
                                	</tr>
                            </thead>
                           
                       	 	<tbody role="alert" aria-live="polite" aria-relevant="all">
                           	 		@foreach($test as $k=>$v)
    	                       	 		@if($k%2==0)
    	                       	 		<tr class="odd" align="center">
    	                       	 		@else
    	                       	 		<tr class="even" align="center">
    	                       	 		@endif
                           	 			<td class="  sorting_1">{{$v['id']}}</td>
                                        <td class=" ">{{$v['title']}}</td>
                                        <td class=" ">{{$v['name']}}</td>
                                        <td class=" ">{!! str_limit($v['descr'],50) !!}</td>
                                        <td class=" ">{!! str_limit($v['content'],50) !!} </td>
                                        <td class=" "><img src="/admin/uploads/{{$v['picture']}}"></td>
                                        <td class=" ">{{ $v['catesName'] }} </td>
                                        <td class=" ">{{$v['created_at']}}</td>
                                        <td class="">
                                        	<a href="/admin/articles/edit/{{$v['id']}}"><i class="icol-pencil"></i></a>
                                        	<form style="display: inline;" action="/admin/articles/delete/{{$v['id']}}" method="post">
                                        		<!--{{ method_field('DELETE') }}-->
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
                        {{($data->currentPage()-1) * ($data->perPage()-0)+1}}
                        条
                        到
                        {{($data->perPage()-0)*($data->currentPage()-1)+$data->count()}}
                        条
                        ❤
                        共
                        {{$data->total()}}
                        条
                        @else
                        共
                        {{$data->total()}}
                        条
                        @endif
                     </div>

                     <div class="dataTables_paginate paging_full_numbers" id="page">
                        {!! $data->appends($request->all())->render() !!}
                    </div>
                        
                        </div>
                    </div>
                </div>
        </div>
@endsection