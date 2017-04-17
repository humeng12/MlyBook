<?php
namespace Admin\Controller;
use Think\Controller;


class ApiController extends CommonController {

    /**
     * @时间     2017-04-17
     * @函数描述   [当支付成功后把数据插入用户表和订单表]
     */
    public function uploadUserInfo(){

    	if (!IS_POST) {
    		$this->apiReturn(3,'请求类型错误');
    		exit();	
    	}


    	$paytime = $_POST['paytime'];
    	if (!$paytime) {
    		$this->apiReturn(3,'参数错误,无支付时间');
    		exit();	
    	}
    	$paytype = $_POST['paytype'];
    	if (!$paytype) {
    		$this->apiReturn(3,'参数错误,无支付类型');
    		exit();	
    	}
    	$username = $_POST['username'];
    	if (!$username) {
    		$this->apiReturn(3,'参数错误,无昵称');
    		exit();	
    	}
    	$weixinid = $_POST['weixinid'];
    	if (!$weixinid) {
    		$this->apiReturn(3,'参数错误,无微信ID');
    		exit();	
    	}


    	$user = D('user');

    	$userid = $user->where('weixin_id = '."'".$weixinid."'")->getField('id');

    	if (!$userid || $userid == 0) {
    		$userid = 1;
    	}

    	$data['username'] = $username;
    	$data['weixin_id'] = $weixinid;


    	if ($user->create($data)) {
    		
    		if ($user->add()) {


    			$pay = D('pay');

    			$paydata['paytime'] = $paytime;
    			$paydata['paytype'] = $paytype;
    			$paydata['userid'] = $userid;

    			if ($pay->create($paydata)) {

    				if ($pay->add()) {
    					$this->apiReturn(0,'成功');exit();
    				}else{
    					$this->apiReturn(3,'数据操作失败');exit();
    				}
    				
    			}else{
    				$this->apiReturn(3,$pay->getError());exit();
    			}
    		}else{
    			$this->apiReturn(3,'数据操作失败');exit();
    		}
    	}else{
    		$this->apiReturn(3,$user->getError());exit();
    	}
    }






    /**
     * @时间     2017-04-17
     * @函数描述   [查询某个学员的成就表信息]
     */
    public function getUserInfo(){

    	if (!IS_POST) {
    		$this->apiReturn(3,'请求类型错误');
    		exit();	
    	}

    	
    	$weixinid = $_POST['weixinid'];
    	if (!$weixinid) {
    		$this->apiReturn(3,'参数错误');
    		exit();	
    	}
    	

    	$user = D('user');

    	$achs = $user->join('mly_achieve on mly_user.id = mly_achieve.userid','right')->where('weixin_id = '."'".$weixinid."'")->field('readday,readtime,readnum')->select();

    	$this->apiReturn('0','成功',$achs);exit();

    }



    /**
     * @时间     2017-04-17
     * @函数描述   [获取学员阅读到哪本书 第几章 第几节]
     * @参数描述   [weixinid]
     */
    public function getWeekBook(){

    	if (!IS_POST) {
    		$this->apiReturn(3,'请求类型错误');
    		exit();	
    	}

    	$weixinid = $_POST['weixinid'];
    	if (!$weixinid) {
    		$this->apiReturn(3,'参数错误');
    		exit();	
    	}

    	$user = D('user');

    	//$weixinid = 'oC_AjuGs-Zk1dXSXIp-XWrXZZQYE';

    	$schedule = $user->join('mly_read_schedule on mly_user.id = mly_read_schedule.userid','right')
    						->where('weixin_id = '."'".$weixinid."'")
    						->field('bookid,capter,section')->select();

    	$arrayCount = count($schedule);

    	$bookid = 1;
    	$capter = 1;
    	$section = 1;

    	if ($arrayCount > 0) {
    		
    		$bookid = $schedule['bookid'];
    		$capter = $schedule['capter'];
    		$section = $schedule['section'];
    	}


    	$book = D('task');

    	$bookInfo = $book->join('mly_week_task on mly_task.id = mly_week_task.bookid = '.$bookid,'right')->where('section = '.$section)->select();

    	$this->apiReturn('0','成功',$bookInfo);exit();
    }
}

