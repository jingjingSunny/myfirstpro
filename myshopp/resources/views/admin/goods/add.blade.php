@extends('layouts.admin.index')
@section('title','添加商品')
<!--@section('active','active');-->
@section("style2")
    color: #c5d52b;
@endsection
@section('content')
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="container">
	 <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>添加商品</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/goods/insert" method="post" enctype="multipart/form-data">
                        
                        {{csrf_field()}}
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商品名称</label>
                                    <div class="mws-form-item">
                                        <input name="gName" class="large" type="text">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商品图片</label>
                                    <div class="mws-form-item">
                                        <input name="gImg" class="large" type="file">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商品价格</label>
                                    <div class="mws-form-item">
                                        <input name="gPrice" class="large" type="text">
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商品库存</label>
                                    <div class="mws-form-item">
                                        <input name="gStock" class="large" type="text">
                                    </div>
                                </div>
                                
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">是否上架</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name="isSale" value="1"> <label>是</label></li>
                                            <li><input type="radio" name="isSale" value="0"> <label>否</label></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">是否精品</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name="isBest" value="1"> <label>是</label></li>
                                            <li><input type="radio" name="isBest" value="0"> <label>否</label></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">是否热销</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name="isHot" value="1"> <label>是</label></li>
                                            <li><input type="radio" name="isHot" value="0"> <label>否</label></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">是否新品</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name="isNew" value="1"> <label>是</label></li>
                                            <li><input type="radio" name="isNew" value="0"> <label>否</label></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">所属类别</label>
                                    <div class="mws-form-item">
                                        <select class="large" name="cateId">
                                            <option value="0">请选择(默认父类)</option>
                                            @foreach($data as $k=>$v)
                                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">品牌类别</label>
                                    <div class="mws-form-item">
                                        <select class="large" name="brandId">
                                            <option value="0">请选择(默认父级类别)</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商品颜色</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="checkbox" name="gColor[]" value="白色"> <label>白色</label></li>
                                            <li><input type="checkbox" name="gColor[]" value="黑色"> <label>黑色</label></li>
                                            <li><input type="checkbox" name="gColor[]" value="复古蓝"> <label>复古蓝</label></li>
                                            <li><input type="checkbox" name="gColor[]" value="中国红"> <label>中国红</label></li>
                                            <li><input type="checkbox" name="gColor[]" value="可爱粉"> <label>可爱粉</label></li>
                                            <li><input type="checkbox" name="gColor[]" value="苹果绿"> <label>苹果绿</label></li>
                                            <li><input type="checkbox" name="gColor[]" value="灰色"> <label>灰色</label></li>
                                        </ul>
                                    </div> 
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">商品大小</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="checkbox" name="gSize[]" value="xs"> <label>xs</label></li>
                                            <li><input type="checkbox" name="gSize[]" value="s"> <label>s</label></li>
                                            <li><input type="checkbox" name="gSize[]" value="m"> <label>m</label></li>
                                            <li><input type="checkbox" name="gSize[]" value="l"> <label>l</label></li>
                                            <li><input type="checkbox" name="gSize[]" value="xl"> <label>xl</label></li>
                                            <li><input type="checkbox" name="gSize[]" value="xxl"> <label>xxl</label></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                    <label class="mws-form-label">商品描述</label>
                                    <div class="mws-form-item">
                                        <textarea id="editor" type="text/plain"  name="gDesc"  class="large"></textarea>
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
<script>
    var ue = UE.getEditor('editor');
</script>
@endsection
