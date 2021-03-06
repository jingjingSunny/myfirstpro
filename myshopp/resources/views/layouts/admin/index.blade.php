<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="/tanchuang/css/demo.css">
<link type="text/css" rel="stylesheet" href="/tanchuang/css/style.css" />

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/css/myuser.css" media="screen">
	

<title>后台管理--@yield('title')</title>

</head>

<body>


	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- 用户登录--- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                       	 ❤{{Session::get('rname')}} 
                    </div>
                    <ul>
                    	<!--<li><a href="#">简介</a></li>-->
                        <!--<li><a href="/admin/index">修改密码</a></li>-->
                        <li>
                        	<form style="display: inline;" action="/admin/index/{{Session::get('rid')}}" method="post">
                        		{{ method_field('DELETE') }}
                        		{{csrf_field()}}
                        		<button style="vertical-align:baseline;background-color: transparent;color: white;border: none;" type="submit">退出</button>
                        	</form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li  ><a style='@section("style1") @show' href="/admin/index"><i class="icon-home"></i>首页</a></li>
                    <!--<li><a href="charts.html"><i class="icon-graph"></i> Charts</a></li>
                    <li><a href="calendar.html"><i class="icon-calendar"></i> Calendar</a></li>
                    <li><a href="files.html"><i class="icon-folder-closed"></i> File Manager</a></li>
                    <li><a href="table.html"><i class="icon-table"></i> Table</a></li>-->
                    <li >
                        <a style='@section("style2") @show'><i class="icon-users"></i>用户管理</a>
                        <ul >
                        	<li><a href="/admin/user">浏览用户</a></li>
                            <li><a href="/admin/user/create">用户添加</a></li>
                            <li><a href="/admin/user/backs">回收站</a></li>
                        </ul>
                    </li>
                    <li >
                        <a style='@section("style3") @show'><i class="icon-list"></i>分类管理</a>
                        <ul >
                        	<li><a href="/admin/cates/">浏览分类</a></li>
                            <li><a href="/admin/cates/add">添加分类</a></li>
                            <li><a href="/admin/cates/backs">回收站</a></li>
                        </ul>
                    </li>
                    <li >
                        <a style='@section("style4") @show'><i class="icon-archive"></i>文章管理</a>
                        <ul >
                        	<li><a href="/admin/articles/">浏览文章</a></li>
                            <li><a href="/admin/articles/add">添加文章</a></li>
                        </ul>
                    </li>
                    <li >
                        <a style='@section("style5") @show'><i class="icon-archive"></i>商品管理</a>
                        <ul >
                            <li><a href="/admin/goods/index">浏览商品</a></li>
                            <li><a href="/admin/goods/add">添加商品</a></li>
                        </ul>
                    </li>
                    <!--<li><a href="widgets.html"><i class="icon-cogs"></i> Widgets</a></li>
                    <li><a href="typography.html"><i class="icon-font"></i> Typography</a></li>
                    <li><a href="grids.html"><i class="icon-th"></i> Grids &amp; Panels</a></li>
                    <li><a href="gallery.html"><i class="icon-pictures"></i> Gallery</a></li>
                    <li><a href="error.html"><i class="icon-warning-sign"></i> Error Page</a></li>
                    <li>
                        <a href="icons.html">
                            <i class="icon-pacman"></i> 
                            Icons <span class="mws-nav-tooltip">2000+</span>
                        </a>
                    </li>-->
                </ul>
            </div>         
        </div>
        
        
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        	@if(session('success'))
		        <div class="mws-form-message success">
		        	{{ session('success') }}
		        </div>
	        @endif
	        @if(session('error'))
		        <div class="mws-form-message error">
		        	{{ session('error') }}
		        </div>
	        @endif
        	@section('content')
        	@show
        	<!-- Inner Container Start -->
            
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Sunny^晴的博客❤
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/js/libs/jquery.placeholder.min.js"></script>
    <script src="/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/jui/jquery-ui.custom.min.js"></script>
    <script src="/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- [if lt IE 9]> -->
    <script src="js/libs/excanvas.min.js"></script>
    <!-- <![endif] -->
    <script src="/plugins/flot/jquery.flot.min.js"></script>
    <script src="/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/plugins/validate/jquery.validate-min.js"></script>
    <script src="/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) charts -->
    
    <script src="/js/demo/demo.dashboard.js"></script>

</body>
</html>