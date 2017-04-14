<?php
namespace Admin\Controller;
use Think\Controller;


//添加章节内容

class ChapterController extends CommonController {

    
    public function index(){

         $this->display();
    }



    public function add(){

        $task = D('task');

        $taskids = $task->field('id,title')->select();

        $this->assign('taskids',$taskids);

        
        $this->display();
    }

}