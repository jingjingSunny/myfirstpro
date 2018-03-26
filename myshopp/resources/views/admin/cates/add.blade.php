@extends('layouts.admin.index')
@section('title', '添加分类')
<!--@section('active','active');-->
@section("style3")
    color: #c5d52b;
@endsection
@section('content')
@section('content')
<div class="container">
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>添加分类</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/cates/insert" method="post">
                    		{{csrf_field()}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">分类名称</label>
                    				<div class="mws-form-item">
                    					<input name="name" class="small" type="text">
                    				</div>
                    			</div>
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">类别</label>
                    				<div class="mws-form-item">
                    					<select class="small" name="pid">
                    						<option value="0">请选择(父类)</option>
                    						@foreach($data as $k=>$v)
                    						<option value="{{$v['id']}}"  {{ $id==$v['id'] ? "selected":"" }}>{{$v['name']}}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input value="添加" class="btn btn-danger" type="submit">
                    			<input value="重置" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
</div>

@endsection