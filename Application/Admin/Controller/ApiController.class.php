<?php
namespace Admin\Controller;
use Think\Controller;


class ApiController extends CommonController {


    public function getInfo(){


    	$param = I('param.');

    	if (!in_array('name', $param)) {
    		$this->apiReturn(3,'不包含');
    		exit();	
    	}

    	if (isset($_PARAM['name'])) {
    		$this->apiReturn(3,'参数错误');
    		exit();	
    	}


    	$achieve = D('achieve');
    	$achs = $achieve->select();
        
        if($achs){
            $this->apiReturn(0,'读取用户信息成功',$achs);
            exit();
        }else{
        	$this->apiReturn(1,'无数据');
        	exit();
        }
    }
}

