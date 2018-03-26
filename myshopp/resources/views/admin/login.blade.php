<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/css/mws-theme.css" media="screen">

<title>用户登录</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>登录</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
            	<span style="color: white;">注-->昵称：静静     密码：123456</span>
                <form class="mws-form" action="/login" method="post">
                	{{csrf_field()}}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input value="{{old('rootname')}}" type="text" name="name" class="mws-login-username required" placeholder="管理员昵称">
                          	<span style="color: white;">{{$errors->first('rootname')}}</span>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input  type="password" name="password" class="mws-login-password required" placeholder="管理员密码">
               				<span style="color: white;">{{$errors->first('password')}}</span>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input style="width:140px" type="password" name="captcha" class="mws-login-password required" placeholder="验证码">
               				<span style="color: white;">{{$errors->first('password')}}</span>
               				{!! captcha_img() !!}
                        </div>
                    </div>
                    
                   
                    <div class="mws-form-row">
                        <input type="submit" value="登录" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--点击切换图片-->
    <script>
    	var img = document.getElementsByTagName('img')[0];
    	img.onclick=function(){
    		this.src = '{!! captcha_src() !!}'+Math.random(0,1);
    	}
    </script>

    <!-- JavaScript Plugins -->
    <script src="/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/js/libs/jquery.placeholder.min.js"></script>
    <script src="/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/js/core/login.js"></script>

</body>
</html>
