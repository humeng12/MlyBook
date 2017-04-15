<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>所有用户——后台管理</title>
    <link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/main.css"/>
<script type="text/javascript" src="/MlyBook/Public/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/MlyBook/Public/js/jquery-3.1.1.min.js"></script>

	<title></title>		
</head>

<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="/MlyBook/index.php/Admin/Admin/edit/id/<?php echo session('id');?>">欢迎您，<?php echo session('rolename');?>:<?php echo session('username');?></a></li>
                <li><a href="/MlyBook/index.php/Admin/Admin/edit/id/<?php echo session('id');?>">修改密码</a></li>
                <li><a href="/MlyBook/index.php/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div> 

<body>
	<div class="container clearfix">
    <div class="sidebar-wrap">
    <div class="sidebar-title">
        <h1>菜单</h1>
    </div>

    <div class="sidebar-content">
        <ul class="sidebar-list">
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>基本操作</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/User/index"><i class="icon-font">&#xe008;</i>所有学员</a></li>
                    <li><a href="/MlyBook/index.php/Admin/User/divide"><i class="icon-font">&#xe008;</i>已分班学员</a></li>
                    <li><a href="/MlyBook/index.php/Admin/User/undivide"><i class="icon-font">&#xe008;</i>未分班学员</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>学员任务</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/Task/index"><i class="icon-font">&#xe008;</i>书籍目录</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Chapter/index"><i class="icon-font">&#xe008;</i>章节内容</a></li>                   
                    <!-- <li><a href="/MlyBook/index.php/Admin/Cate/lst"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Message/lst"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Job/lst"><i class="icon-font">&#xe012;</i>求职信息</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li> -->
                </ul>
            </li>
            <!-- <li>
                <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/System/lst"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Admin/lst"><i class="icon-font">&#xe006;</i>管理员管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Privilege/lst"><i class="icon-font">&#xe037;</i>权限列表</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Role/lst"><i class="icon-font">&#xe046;</i>角色列表</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                </ul>
            </li> -->
                 
        </ul>
    </div>
</div>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/MlyBook/index.php/Admin/Index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户查询</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="kw" value="<?php echo I('kw');?>" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>                          
                            <th>ID</th>
                            <th>昵称</th>
                            <th>班级</th>
                            <th>学号</th>
                            <th>入学时间</th>
                        </tr>
                        <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>                         
	                            <td><?php echo ($vo["id"]); ?></td>
	                            <td><?php echo ($vo["username"]); ?></td>
	                            <td>
	                            	<?php if($vo["classdes"] == ''): ?>暂无班级,请先分班<?php else: echo ($vo["classdes"]); endif; ?>
	                            </td>
	                            <td>
	                            	<?php if($vo["classnum"] == ''): else: echo ($vo["classnum"]); endif; ?>
	                            </td>
	                            <td>
	                            	<?php if($vo["classtime"] == ''): else: echo ($vo["classtime"]); endif; ?>
	                            </td>                      
	                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>