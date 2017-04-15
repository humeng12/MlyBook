<?php
namespace Admin\Controller;
use Think\Controller;

class ChapterController extends CommonController {

    
    public function index(){

        $weektask = D('week_task');

        $where = 1;
        if($kid = I('kid')){
            $where .= ' and bookid='.$kid;
        }

        if($cnum = I('cnum')){
            $where .= ' and chapter='.$cnum;
        }

        if($snum = I('snum')){
            $where .= ' and section='.$snum;
        }

        $count=$weektask->where($where)->count();// 查询满足要求的总记录数
        echo $weektask->getLastSql();
        $Page=new \Think\Page($count,10);
        $show= $Page->show();// 分页显示输出
        $list = $weektask->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        //$weektasks = $weektask->select();
        //$this->assign('weektasks',$weektasks);

        $this->display();
    }



    public function edit($id){


        $weektask = D('week_task');

        $oneMess = $weektask->field('content')->find($id);
        $this->assign('oneMess',$oneMess);

        $this->display();

    }
}