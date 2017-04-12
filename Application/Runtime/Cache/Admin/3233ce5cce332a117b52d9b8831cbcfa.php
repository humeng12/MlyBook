<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>文章管理-后台管理</title>
    <link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/main.css"/>
    <script type="text/javascript" src="/MlyBook/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/MlyBook/Public/js/jquery-1.4.2.min.js"></script>
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
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>基本操作</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/User/index"><i class="icon-font">&#xe008;</i>所有用户</a></li>
                    <li><a href="/MlyBook/index.php/Admin/User/divide"><i class="icon-font">&#xe008;</i>已分班用户</a></li>
                    <li><a href="/MlyBook/index.php/Admin/User/undivide"><i class="icon-font">&#xe008;</i>未分班用户</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/Cate/lst"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Message/lst"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Job/lst"><i class="icon-font">&#xe012;</i>求职信息</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/System/lst"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Admin/lst"><i class="icon-font">&#xe006;</i>管理员管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Privilege/lst"><i class="icon-font">&#xe037;</i>权限列表</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Role/lst"><i class="icon-font">&#xe046;</i>角色列表</a></li>
                    <li><a href="system.html"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                </ul>
            </li>
                 
        </ul>
    </div>
</div>
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/MlyBook/index.php/Admin/Index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['type'] != 1): ?>style="display:none;"<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php if($vo['parentid'] != 0): ?>|<?php endif; echo str_repeat('-', $vo['level']*8); echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
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
                <div class="result-title">
                    <div class="result-list">
                        <a href="/MlyBook/index.php/Admin/Article/add" class="btn btn-primary btn2"><i class="icon-font"></i>新增文章</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i><input form="myform" formaction="/MlyBook/index.php/Admin/Article/bdel" type="submit" class="btn btn-primary btn2" value="批量删除" /></a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" id='check' type="checkbox"></th>
                            <th>ID</th>
                            <th>文章标题</th>
                            <th>是否推荐</th>
                            <th>缩略图</th>
                            <th>所属栏目</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="ids[]" value="<?php echo ($vo["id"]); ?>" class="check" type="checkbox"></td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["title"]); ?></td>
                            <td><?php if($vo['rem'] == 1): ?>推荐<?php else: ?>未推荐<?php endif; ?></td>
                            <td>
                             <?php if($vo['pic'] != ''): ?><img src="/MlyBook<?php echo ($vo["pic"]); ?>" height="50">
                            <?php else: ?>
                            暂无缩略图<?php endif; ?>
                            </td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td>
                                <a class="link-update" href="/MlyBook/index.php/Admin/Article/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" onclick="return confirm('确定删除改文章吗？');" href="/MlyBook/index.php/Admin/Article/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"><?php echo ($page); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
<script type="text/javascript">
    $("#check").click(function(){
        if($(this).attr("checked"))
        {
            $(".check").attr("checked","checked")
        }else
        {
            $(".check").removeAttr("checked")
        }
    })
</script>