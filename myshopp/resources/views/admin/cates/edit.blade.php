@extends('layouts.admin.index')
@section('title', '修改分类')
<!--@section('active','active');-->
@section("style3")
    color: #c5d52b;
@endsection
@section('content')
@section('content')
<div class="container">
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>修改分类信息</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/cates/update/{{$res['id']}}" method="post">
                    		{{csrf_field()}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">分类名称</label>
                    				<div class="mws-form-item">
                    					<input name="name" value="{{$res['name']}}" class="small" type="text">
                    				</div>
                    			</div>
                    			
                    		</div>
                    		<div class="mws-button-row">
                    			<input value="修改" class="btn btn-danger" type="submit">
                    			<input value="重置" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
</div>

@endsection