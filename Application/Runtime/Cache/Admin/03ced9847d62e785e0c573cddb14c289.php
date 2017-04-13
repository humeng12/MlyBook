<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加任务-后台管理</title>
    <link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/MlyBook/Public/css/main.css"/>
<script type="text/javascript" src="/MlyBook/Public/js/libs/modernizr.min.js"></script>
<script type="text/javascript" src="/MlyBook/Public/js/jquery-1.4.2.min.js"></script>

    <script type="text/javascript" charset="utf-8" src="/MlyBook/Public/ueditor1.4.3.3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/MlyBook/Public/ueditor1.4.3.3/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/MlyBook/Public/ueditor1.4.3.3/lang/zh-cn/zh-cn.js"></script>

   
    <style type="text/css">
		/* starbox */
		.starbox{width:480px;height:30px;padding: 0;margin: 0;}
		.fl{float:left;display:inline;}
		.s_name{float:left;display:block;width:60px;text-align:right;}
		.star_ul{background:url(/MlyBook/Public/images/star.png) no-repeat 0 -150px;width:132px;z-index:10;position:relative;height:25px;}
		.star_ul li{float:left;margin-right:1px;width:25px;height:25px;}
		.star_ul li a{display:block;height:25px;position:absolute;left:0;top:0;text-indent:-999em;}
		.star_ul li .active-star{background:url(/MlyBook/Public/images/star.png) no-repeat;}
		.star_ul li .one-star{width:25px;background-position:0 -120px;z-index:50;}
		.star_ul li .two-star{width:51px;background-position:0 -90px;z-index:40;}
		.star_ul li .three-star{width:79px;background-position:0 -60px;z-index:30;}
		.star_ul li .four-star{width:105px;background-position:0 -30px;z-index:20;}
		.star_ul li .five-star{width:129px;margin-right:0;background-position:0 0;z-index:10;}
		.s_result{padding:6px 0 0 5px;}

		.square_ul{background:url(/MlyBook/Public/images/star.png) no-repeat 0 -222px;width:146px;z-index:10;position:relative;height:20px;}
		.square_ul li{float:left;margin-right:1px;width:29px;height:20px;}
		.square_ul li a{display:block;height:20px;position:absolute;left:0;top:0;text-indent:-999em;}
		.square_ul li .active-square{background:url(/MlyBook/Public/images/star.png) no-repeat;}
		.square_ul li .square-1{width:29px;background-position:0 -243px;z-index:50;}
		.square_ul li .square-2{width:58px;background-position:0 -264px;z-index:40;}
		.square_ul li .square-3{width:87px;background-position:0 -285px;z-index:30;}
		.square_ul li .square-4{width:116px;background-position:0 -306px;z-index:20;}
		.square_ul li .square-5{width:145px;margin-right:0;background-position:0 -327px;z-index:10;}
		.s_result_square{padding:4px 0 0 9px;}
	</style>


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
                    <li><a href="/MlyBook/index.php/Admin/User/index"><i class="icon-font">&#xe008;</i>所有学员</a></li>
                    <li><a href="/MlyBook/index.php/Admin/User/divide"><i class="icon-font">&#xe008;</i>已分班学员</a></li>
                    <li><a href="/MlyBook/index.php/Admin/User/undivide"><i class="icon-font">&#xe008;</i>未分班学员</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>学员任务</a>
                <ul class="sub-menu">
                    <li><a href="/MlyBook/index.php/Admin/Task/index"><i class="icon-font">&#xe008;</i>总任务</a></li>
                    <!-- <li><a href="/MlyBook/index.php/Admin/Cate/lst"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Message/lst"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Job/lst"><i class="icon-font">&#xe012;</i>求职信息</a></li>
                    <li><a href="/MlyBook/index.php/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    <li><a href="design.html"><i class="icon-font">&#xe033;</i>广告管理</a></li> -->
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
            	<div class="crumb-list"><i class="icon-font"></i><a href="/MlyBook/index.php/Admin/Index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/MlyBook/index.php/Admin/Task/index">总任务</a><span class="crumb-step">&gt;</span><span>新增任务</span></div>
            </div>


            <div class="result-wrap">
            	<div class="result-content">
            		<form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
	                    <table class="insert-tab" width="100%">
	                        <tbody>
	                            <tr>
	                                <th><i class="require-red">*</i>添加时间：</th>
	                                <td><input class="common-text required" id="title" name="tasktime" size="50" value="" type="text"></td>
	                            </tr>
	                            <tr>
	                                <th><i class="require-red">*</i>书籍标题：</th>
	                                <td><input class="common-text" name="title" size="50" value="" type="text"></td>
	                            </tr>
	                            <tr>
	                                <th><i class="require-red">*</i>书籍作者：</th>
	                                <td><input class="common-text" name="author" size="50" value="" type="text"></td>
	                            </tr>
	                            <tr>
	                                <th><i class="require-red">*</i>书籍封面：</th>	                 
	                                <td style="float: left;">
		                                <input name="image" type="file" id="doc" onchange="setImagePreview();" /> 
		                                <img id="preview"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <th><i class="require-red">*</i>阅读难度：</th>	                     
	                                <!-- <td><input id="input-21b" value="4" type="number" class="rating" min=0 max=5 step=0.2 data-size="lg"/></td> -->

	                                <td>
										<div class="starbox">												
											<ul class="star_ul fl">
												<li><a class="one-star" title="很差" href="#"></a></li>
												<li><a class="two-star" title="差" href="#"></a></li>
												<li><a class="three-star" title="还行" href="#"></a></li>
												<li><a class="four-star" title="好" href="#"></a></li>
												<li><a class="five-star" title="很好" href="#"></a></li>
											</ul>
											<span class="s_result fl">请打分</span>
										</div>      
                             		</td>	                               
	                            </tr>
	                            <tr>
	                                <th><i class="require-red">*</i>书籍简介：</th>
	                                <td><textarea name="introduction" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
	                            </tr>
	                            <tr>
	                                <th></th>
	                                <td>
	                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
	                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </form>
            	</div>
            </div>
        </div>
	</div>
</body>
</html>


<script type="text/javascript">
$(function(){
	
	$('.star_ul a').hover(function(){
		$(this).addClass('active-star');
		$('.s_result').css('color','#c00').html($(this).attr('title'))
	},function(){
		$(this).removeClass('active-star');
		$('.s_result').css('color','#333').html('请打分')
	});
	
	$('.star_ul a').click(function(){
		alert($('.s_result').html());
	});
	
	$('.square_ul a').hover(function(){
		$(this).addClass('active-square');
		$(this).parents('.starbox').find('.s_result_square').css('color','#c00').html($(this).attr('title'))
	},function(){
		$(this).removeClass('active-square');
		$(this).parents('.starbox').find('.s_result_square').css('color','#333').html('请打分')
	});
	
	$('.square_ul a').click(function(){
		alert($(this).parents('.starbox').find('.s_result_square').html());
	});
})
</script>



<script>

	UE.getEditor('content',{initialFrameWidth:1400,initialFrameHeight:400,});

    jQuery(document).ready(function () {
    	setImagePreview();

    	var iframeHeight = function () {
            var _height = $(window).height() - 34;
            $('#content').height(_height);
        }
        window.onresize = iframeHeight;
        $(function () {
            iframeHeight();
        });

	});


   	//下面用于图片上传预览功能
	function setImagePreview() {
		var docObj=document.getElementById("doc");
		var imgObjPreview=document.getElementById("preview");

		if (docObj.files && docObj.files[0]){

			imgObjPreview.style.width = "50px";
			imgObjPreview.style.height = "80px";

			if (window.navigator.userAgent.indexOf("Chrome") >= 1 || window.navigator.userAgent.indexOf("Safari") >= 1) { 
				imgObjPreview.src = window.webkitURL.createObjectURL(docObj.files[0]); 
			} 
			else { 
				imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]); 
			} 
		}else{
			
			//IE下，使用滤镜 
			docObj.select(); 
			docObj.blur(); 
			var imgSrc = document.selection.createRange().text;

			imgObjPreview.style.width = "50px";
			imgObjPreview.style.height = "80px";

			try { 
				imgObjPreview.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)"; 
				imgObjPreview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc; 
			} catch (e) { 
				alert("您上传的图片格式不正确，请重新选择！"); 
				return false; 
			} 
		}
		
		return true;
	}
 
</script>