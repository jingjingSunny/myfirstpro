@extends('layouts.admin.index')
@section('title', '添加文章')
<!--@section('active','active');-->
@section("style4")
    color: #c5d52b;
@endsection
@section('content')
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/lang/zh-cn/zh-cn.js"></script>


	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>添加文章</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/articles/insert" method="post" enctype="multipart/form-data">
                    		{{csrf_field()}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章标题</label>
                    				<div class="mws-form-item">
                    					<input class="large" name='title' type="text">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">所属分类</label>
                    				<div class="mws-form-item">
                    					<select class="large" name="cate_id">
                    						<option value="0">请选择(默认父类)</option>
                    						@foreach($data as $k=>$v)
                    						<option value="{{$v['id']}}">{{$v['name']}}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章配图</label>
                    				<div class="mws-form-item">
                    					<input class="large" name="picture" type="file">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章简介</label>
                    				<div class="mws-form-item">
                    					<textarea name="descr" rows=""  cols="" class="large"></textarea>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章详情</label>
                    				<div class="mws-form-item">
                    					<textarea id="editor" type="text/plain"  name="content"  class="large"></textarea>
                    					
                    				</div>
                    			</div>
                    			
                    		</div>
                    		<div class="mws-button-row">
                    			<input value="提交" class="btn btn-danger" type="submit">
                    			<input value="重置" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                <script>
                	var ue = UE.getEditor('editor');
                </script>
@endsection
