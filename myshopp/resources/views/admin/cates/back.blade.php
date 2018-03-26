@extends('layouts.admin.index')
@section('title', '文章回收站')
@section("style3")
    color: #c5d52b;
@endsection
@section('content')
	 <div class="container">
	 	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> 回收站</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        	<form action="/admin/user" method="get">	
	                        	<div id="DataTables_Table_1_length" class="dataTables_length">
	                        		<label>Show 
			                        	<select size="1" name="num" aria-controls="DataTables_Table_1">
			                        		<option value="10" {{ $request->num == 10 ? 'selected' : ""}}>10</option>
			                        		<option value="25" {{ $request->num == 25 ? 'selected' : ""}}>25</option>
			                        		<option value="50" {{ $request->num == 50 ? 'selected': ""}}>50</option>
			                        		<option value="100" >100</option>
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
                                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">分类id</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">分类昵称</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 213px;" aria-label="CSS grade: activate to sort column ascending">父级ID</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 266px;" aria-label="CSS grade: activate to sort column ascending">路径信息</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 266px;" aria-label="CSS grade: activate to sort column ascending">删除时间</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Engine version: activate to sort column ascending">操作</th>
                                	
                                	</tr>
                            </thead>
                            
                       	 	<tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach ($res as $k=>$v)
                        		@if($k%2==1)
                        		<tr class="odd" align="center">
                        		@else
                        		<tr class="even" align="center">
                        		@endif
                                    <td class="  sorting_1">{{$v['id']}}</td>
                                    <td class=" ">{{$v['name']}}</td>
                                    <td class=" ">{{$v['pid']}}</td>
                                    <td class=" ">{{$v['path']}}</td>
                                    <td class=" ">{{$v['deleted_at']}}</td>
                                    <td class="">
                                        <a href="/admin/cates/restores/{{$v['id']}}">恢复</a>
                                    	<form style="display: inline;" action="/admin/cates/del/{{$v['id']}}" method="get">
                                    		<button title="永久删除" type="submit" style="vertical-align: top;outline: none;border: none;background: none;" ><i class="icol-cross"></i></button>
                                    	</form>
                                    	
                                    </td>
                                </tr>
                            @endforeach
                               
                             </tbody>
                       	</table>
                             <div class="dataTables_info" id="DataTables_Table_1_info">
                             	
                             </div>
                             
                             <div class="dataTables_paginate paging_full_numbers" id="page">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
@endsection
