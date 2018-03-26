@extends('layouts.admin.index')
@section('title', '浏览分类')
<!--@section('active','active');-->
@section("style3")
    color: #c5d52b;
@endsection
@section('content')
<div class="container">
    <div class="mws-panel grid_8 mws-collapsible">
    	<div class="mws-panel-header">
        	<span><i class="icon-table"></i>浏览分类</span>
        </div>
            <div class="mws-panel-inner-wrap">
            	<div class="mws-panel-body no-padding">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                        <form method="get" action="/admin/cates/index">
                        	<div id="DataTables_Table_0_length" class="dataTables_length">
                        		<label>显示
                        			<select size="1" name="num" aria-controls="DataTables_Table_0">
                        				<option value="10" {{ $request->num == 10 ? 'selected' : ""}}>10</option>
                        				<option value="25" {{ $request->num == 25 ? 'selected' : ""}}>25</option>
                                        <option value="50" {{ $request->num == 50 ? 'selected' : ""}}>50</option>
                        				<option value="100" {{ $request->num == 100 ? 'selected' : ""}}>100</option>
                        			</select> 条
                        		</label>
                        	</div>
                        	<div class="dataTables_filter" id="DataTables_Table_0_filter">
                    			<label>搜索: <input name="keywords" aria-controls="DataTables_Table_0" type="text"></label>
                    			<button type="submit" class="btn btn-danger">搜索</button>
                        	</div>
                        </form>
                		<table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 97px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                		分类ID
                                	</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 137px;" aria-label="Browser: activate to sort column ascending">
                                		分类昵称
                                	</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 126px;" aria-label="Platform(s): activate to sort column ascending">
                                		父级ID
                                	</th>
                                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 81px;" aria-label="Engine version: activate to sort column ascending">
                                		路径信息
                                	</th>
                                	<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 101px;" aria-label="">
                                		操作
                                	</th>
                                </tr>
                            </thead>
                    
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                            	@foreach($res as $k=>$v)
                            	@if($k%2==0)
                            	<tr class="odd" align="center">
                            	@else
                            	<tr class="even" align="center">
                            	@endif
                                    <td class=" sorting_1">{{$v['id']}}</td>
                                    <td class=" ">{{$v['name']}}</td>
                                    <td class=" ">{{$v['pid']}}</td>
                                    <td class=" ">{{$v['path']}}</td>
                                    <td class=" ">
                                        <span class="btn-group">
                                            <!-- <a href="/admin/cates/add/{{$v['id']}}" class="btn btn-small"><i class="icon-search"></i></a> -->
                                            <a href="/admin/cates/edit/{{$v['id']}}" class="btn btn-small"><i class="icon-pencil"></i></a>
                                            <a href="/admin/cates/delete/{{$v['id']}}" class="btn btn-small"><i class="icon-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
            			</table>
                        <div class="dataTables_info" id="DataTables_Table_1_info">
                            @if(!$request->keywords)
                            从
                            {{($res->currentPage()-1) * ($res->perPage()-0)+1}}
                            条
                            到
                            {{($res->perPage()-0)*($res->currentPage()-1)+$res->count()}}
                            条
                            ❤
                            共
                            {{$res->total()}}
                            条
                            @else
                            共
                            {{$res->total()}}
                            条
                            @endif
                         </div>
                         <div class="dataTables_paginate paging_full_numbers" id="page">
                            {!! $res->appends($request->all())->render() !!}
                        </div>
                	</div>
                </div>
            </div>
    </div>
</div>
@endsection