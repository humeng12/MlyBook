<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends CommonController {

    
    public function index(){

    	$user = D('user');

    	if($kw=I('kw')){
           $where='username LIKE "%'.$kw.'%"';
        }
    	$users = $user->where($where)->select();

    	$this->assign('user',$users);
        $this->display();
    }


   /**
    * @时间     2017-04-12
    * @函数描述   [查询已分班的人员信息]
    * @参数描述   [无参数]
    */
    public function divide(){


    	$user = D('user');

    	$users = $user->where('isdivide = 1')->select();

    	$this->assign('users',$users);

    	$this->display();

    }

    /**
     * @时间     2017-04-12
     * @函数描述   [查询还没分班的人员信息]
     * @参数描述   [无参数]
     */
    public function undivide(){

    	$user = D('user');

    	$users = $user->where('isdivide = 0')->select();

    	$this->assign('users',$users);

    	$this->display();
    }


    /**
     * @时间     2017-04-12
     * @函数描述   [插入分班后的信息]
     * @param  [type]     $id [userid]
     */
    public function edit($id){

    	$user=D('user');
    	if (IS_POST) {
    		
    		$data['id'] = I('id');
    		$data['classdes'] = I('classdes');
    		$data['classnum'] = I('classnum');
    		$data['isdivide'] = 1;
            $data['classid'] = I('classid');
    		$data['classtime'] = date('y-m-d h:i:s',time());

    		if ($user->create($data)) {

    			if ($user->save()) {
    				$this->success('分班成功',U('undivide'));
    			}else{
    				$this->success('分班失败');
    			}
    			
    		}else{
    			$this->error($user->getError());
    		}


    		return;
    	}

    	$users=$user->find($id);
        $this->assign('users',$users);

        $this->display();
    }
}