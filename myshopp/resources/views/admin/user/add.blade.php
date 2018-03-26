@extends('layouts.admin.index')
@section('title', '用户管理')
<!--@section('active','active');-->
@section("style2")
    color: #c5d52b;
@endsection
@section('content')
	 <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-magic"></i> Vertical Wizard Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div class="wizard-nav wizard-nav-vertical">
                        	<ul>
                        	<!--<li data-wzd-id="wzd_1c8pnm7u91h3bc92tu_0" class="current"><span><i class="icol-accept"></i> Member Profile</span></li>-->
                        	<!--<li data-wzd-id="wzd_1c8pnm7u91h3bc92tu_1"><span><i class="icol-delivery"></i> Membership Type</span></li>-->
                        	<li data-wzd-id="wzd_1c8pnm7u91h3bc92tu_2"><span><i class="icol-user"></i>添加用户</span></li>
                        	</ul>
                        	<button type="button" class="btn responsive-prev-btn" disabled="disabled"><i class="icon-caret-left"></i></button>
                        	<button type="button" class="btn responsive-next-btn"><i class="icon-caret-right"></i>
                        		
                        	</button>
                        </div>
                        @if (count($errors) > 0)
						    <div class="mws-form-message error">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						
                        <form action="/admin/user" method="post"  class="mws-form wzd-vertical wizard-form wizard-form-vertical" novalidate="novalidate">
                            
                            {{csrf_field()}}
                            <fieldset class="wizard-step mws-form-inline" data-wzd-id="wzd_1c8pnm7u91h3bc92tu_0" style="display: block;">
                                <legend class="wizard-label" style="display: none;"><i class="icol-accept"></i> Member Profile</legend>
                                <div id="" class="mws-form-row">
                                    <label class="mws-form-label">用户昵称 <span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <input type="text" name="username" class="required large" >
                                    </div>
                                </div>
                                <div id="" class="mws-form-row">
                                    <label class="mws-form-label">用户密码 <span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <input type="password" name="password" class="required large" >
                                    </div>
                                </div>
                                <div id="" class="mws-form-row">
                                    <label class="mws-form-label">确认密码 <span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <input type="password" name="surepass" class="required large" >
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">用户状态<span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <li><input id="male" name="status" value="0" class="required" type="radio"> <label for="male">关闭</label></li>
                                            <li><input id="female" name="status" value="1" type="radio"> <label for="female">开启</label></li>
                                        </ul>
                                        <label class="error plain" generated="true" for="gender" style="display:none"></label>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">用户权限<span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <li><input id="male" name="auth" value="1" class="required" type="radio"> <label for="male">超管理员</label></li>
                                            <li><input id="female" name="auth" value="2" type="radio"> <label for="female">普通管理员</label></li>
                                            <li><input id="female" name="auth" value="3" type="radio"> <label for="female">普通用户</label></li>
                                        </ul>
                                        <label class="error plain" generated="true" for="gender" style="display:none"></label>
                                    </div>
                                </div>
                            </fieldset>
		                    <div class="mws-button-row">
		                    	<!--<button type="button" class="btn" disabled="disabled">Prev</button>-->
		                    	<button type="submit" class="btn">提交</button>
		                    	<!--<button type="button" class="btn btn-primary pull-right" name="wizard-submit">提交</button>-->
		                    	<!--<button type="button" class="btn btn-primary pull-right" name="wizard-submit" >Submit</button>-->
		                    </div>
                        </form>
                    </div>
                </div>
@endsection
