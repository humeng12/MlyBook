<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『童老师ThinkPHP』后台管理</title>
    <link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/main.css"/>
<script type="text/javascript" src="/MlyBook/Public/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/MlyBook/Public/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/MlyBook/Public/layui/css/layui.css"/>

</head>
<body>
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
<div class="container clearfix">
    <div class="sidebar-wrap">
    <div class="sidebar-title">
        <h1>菜单</h1>
    </div>

    <div class="sidebar-content">
        <ul class="sidebar-list">
            <!-- <li>
                <a href="#"><i class="icon-font">&#xe003;</i>微信相关操作</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/WeiXin/index"><i class="icon-font">&#xe008;</i>发送简单信息</a></li>
                </ul>
            </li> -->
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
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>欢迎收看童老师ThinkPHP视频教程第三季度<span><a target="_blank" style="color:#f00; margin:0 20px;" href="http://www.chuanke.com/s2260700.html">点此查看视频教程</a></span></span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="#"><i class="icon-font">&#xe001;</i>新增作品</a>
                    <a href="#"><i class="icon-font">&#xe005;</i>新增博文</a>
                    <a href="#"><i class="icon-font">&#xe048;</i>新增作品分类</a>
                    <a href="#"><i class="icon-font">&#xe041;</i>新增博客分类</a>
                    <a href="#"><i class="icon-font">&#xe01e;</i>作品评论</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>系统基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                    </li>
                    <li>
                        <label class="res-lab">运行环境</label><span class="res-info">Apache/2.2.21 (Win64) PHP/5.3.10</span>
                    </li>
                    <li>
                        <label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
                    </li>
                    <li>
                        <label class="res-lab">静静设计-版本</label><span class="res-info">v-0.1</span>
                    </li>
                    <li>
                        <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                    </li>
                    <li>
                        <label class="res-lab">北京时间</label><span class="res-info">2014年3月18日 21:08:24</span>
                    </li>
                    <li>
                        <label class="res-lab">服务器域名/IP</label><span class="res-info">localhost [ 127.0.0.1 ]</span>
                    </li>
                    <li>
                        <label class="res-lab">Host</label><span class="res-info">127.0.0.1</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">ThinkPHP交流群：</label><span class="res-info">484519446</span>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>