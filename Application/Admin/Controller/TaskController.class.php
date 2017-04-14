<?php
namespace Admin\Controller;
use Think\Controller;

class TaskController extends CommonController {

    
    public function index(){


        $task = D('task');

        if($kw=I('kw')){
           $where='title LIKE "%'.$kw.'%"';
        }

        $tasks = $task->where($where)->select();

        $this->assign('tasks',$tasks);

        $this->display();
    }


    /**
     * [添加书籍基本信息]
     * @时间   2017-04-14
     */
    public function add(){

        $task = D('task');

        if (IS_POST) {
            
            $data['tasktime'] = date('y-m-d h:i:s',time());
            $data['title'] = I('title');
            $data['author'] = I('author');
            $data['degree'] = I('degree');
            $data['introduction'] = I('introduction');

            if($_FILES['image']['tmp_name']!=''){

                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录
                $upload->rootPath='./';

                $info=$upload->uploadOne($_FILES['image']);
                if(!$info) {
                    $this->error($upload->getError());
                }else{ 
                     $data['image']=$info['savepath'].$info['savename']; 
                }
            }else{
                $this->error("请上传封面图!");
            }

            if ($task->create($data)) {
                if ($task->add()) {
                    $this->success('新增任务成功！',U('index'));
                }else{
                    $this->error('新增失败！');
                }
            }else{
                $this->error($task->getError());
            }

            return;
        }


        $this->display();
    }



    /**
     * [修改书籍简介]
     * @时间     2017-04-14
     * @参数描述   [参数描述]
     * @param  [type]     $id [书籍id]
     */
    public function edit($id){

        $task = D('task');

        if (IS_POST) {
           
            $result = $task->where('id = '.I('id'))->setField('introduction',I('introduction'));

            if($result !== false){
                $this->success('简介更新成功',U('index'));
            }else{
                $this->error('简介更新失败');
            }
            return;
        }
        $tasks = $task->find($id);
        $this->assign('tasks',$tasks);
        $this->display();
    }
}