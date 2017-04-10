<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/main.css"/>
    <script type="text/javascript" src="/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/Public/js/jquery-1.4.2.min.js"></script>
    
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
	<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
	<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
	<script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>
 	
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="/index.php/Admin/Admin/edit/id/<?php echo session('id');?>">欢迎您，<?php echo session('rolename');?>:<?php echo session('username');?></a></li>
                <li><a href="/index.php/Admin/Admin/edit/id/<?php echo session('id');?>">修改密码</a></li>
                <li><a href="/index.php/Admin/Admin/logout">退出</a></li>
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
        
            
                   
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Cate/index');?>"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                        <li><a href="/index.php/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="/index.php/Admin/Message/lst"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="/index.php/Admin/Job/lst"><i class="icon-font">&#xe012;</i>求职信息</a></li>
                        <li><a href="/index.php/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/Admin/System/lst"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="/index.php/Admin/Admin/lst"><i class="icon-font">&#xe006;</i>管理员管理</a></li>
                        <li><a href="/index.php/Admin/Privilege/lst"><i class="icon-font">&#xe037;</i>权限列表</a></li>
                        <li><a href="/index.php/Admin/Role/lst"><i class="icon-font">&#xe046;</i>角色列表</a></li>
                        <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
             
            </ul>
        </div>
    </div> 
    
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list">
            	<i class="icon-font"></i>
            	<a href="">首页</a>
            	<span class="crumb-step">&gt;</span>
            	<a class="crumb-name" href="/index.php/Admin/Link/lst">链接管理</a>
            	<span class="crumb-step">&gt;</span><span>新增链接</span>
            </div>
        </div>
        
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>网站名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text"/>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>网站地址：</th>
                                <td><input class="common-text" name="url" size="50" value="" type="text"/></td>
                            </tr>
                            <tr>
                                <th>网站描述：</th>
                                <td><textarea name="des" class="common-textarea" cols="75" rows="6"></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit"/>
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button"/>
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
   
</div>
</body>
</html>