<?php
namespace Admin\Model;
use Think\Model;

header("Content-type:text/html;charset=utf-8");

class TaskModel extends Model
{
	protected $_validate = array(
		array('tasktime','require','时间不得为空！',1), 
		//array('classdes','2,19','长度不符！',3,'length'), 
		array('title','require','标题不得为空！',1),  
		array('author','require','请填写作者名称！',1),  
		array('degree','require','请选择书籍难度！',1),
		array('introduction','require','请输入书籍的简介！',1),
	);


}