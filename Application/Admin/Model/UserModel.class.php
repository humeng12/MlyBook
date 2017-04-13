<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model
{
	protected $_validate = array(
		array('classdes','require','班级不得为空！',1), 
		array('classdes','2,19','长度不符！',3,'length'), 
		array('classnum','require','学号不得为空！',1), 
		array('classnum','','学号不得重复！',1,unique), 
		array('classtime','require','入学时间不得为空！',1), 
	);
}