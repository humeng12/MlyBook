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
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/index.php/Admin/cate/lst">栏目管理</a><span class="crumb-step">&gt;</span><span>新增栏目</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo ($cateres["id"]); ?>" />
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>上级分类：</th>
                            <td>
                                <select name="parentid" id="catid" class="required">
                                    <option value="0">顶级栏目</option>
                                    <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo['id'] == $cateres['id']): ?>style="display:none;"<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php if($vo['parentid'] != 0): ?>|<?php endif; echo str_repeat('-', $vo['level']*8); echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>栏目名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="name" size="50" value="<?php echo ($cateres["name"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>关键词：</th>
                                <td><input class="common-text" name="keywords" size="50" value="<?php echo ($cateres["keywords"]); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th>描述：</th>
                                <td><textarea name="des" class="common-textarea" cols="55" rows="5"><?php echo ($cateres["des"]); ?></textarea></td>
                            </tr>
                            <tr>
                                <th>栏目类型：</th>
                                <td>
                                <input class="common-text" name="type" size="50" value="1" <?php if($cateres['type'] == 1): ?>checked="checked"<?php endif; ?>  type="radio">列表
                                <input class="common-text" name="type" size="50" value="2" <?php if($cateres['type'] == 2): ?>checked="checked"<?php endif; ?> type="radio">单页
                                <input class="common-text" name="type" size="50" value="3" <?php if($cateres['type'] == 3): ?>checked="checked"<?php endif; ?> type="radio">留言
                                <input class="common-text" name="type" size="50" value="4" <?php if($cateres['type'] == 4): ?>checked="checked"<?php endif; ?> type="radio">招聘
                                <input class="common-text" name="type" size="50" value="5" <?php if($cateres['type'] == 5): ?>checked="checked"<?php endif; ?> type="radio">车辆列表
                                <input class="common-text" name="type" size="50" value="6" <?php if($cateres['type'] == 6): ?>checked="checked"<?php endif; ?> type="radio">荣誉列表
                                <input class="common-text" name="type" size="50" value="7" <?php if($cateres['type'] == 7): ?>checked="checked"<?php endif; ?> type="radio">求职表


                                </td>
                            </tr>
                            <tr>
                                <th>栏目级别：</th>
                                <td>
                                <input class="common-text" name="class" size="50" value="1" <?php if($cateres['class'] == 1): ?>checked="checked"<?php endif; ?> type="radio">顶级
                                <input class="common-text" name="class" size="50" value="2" <?php if($cateres['class'] == 2): ?>checked="checked"<?php endif; ?> type="radio">二级
                                <input class="common-text" name="class" size="50" value="3" <?php if($cateres['class'] == 3): ?>checked="checked"<?php endif; ?> type="radio">三级
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>是否PC端：</th>
                                <td><input name="pc" value="1" <?php if($cateres['pc'] == 1): ?>checked="checked"<?php endif; ?> type="checkbox"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="pic" id="" type="file">
                                <?php if($cateres['pic'] != ''): ?><img src="<?php echo ($cateres["pic"]); ?>" height="50" />
                                    <?php else: ?>
                                    暂无缩略图<?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10">
                                    <?php echo ($cateres["content"]); ?>
                                </textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:1500,initialFrameHeight:400,});
    


</script>