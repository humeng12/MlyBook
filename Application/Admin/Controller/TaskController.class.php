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

            if($_FILES['pic']['tmp_name']!=''){

                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录
                $upload->rootPath='./';

                $info=$upload->uploadOne($_FILES['pic']);
                if(!$info) {
                    $this->error($upload->getError());
                }else{ 
                     $data['pic']=$info['savepath'].$info['savename']; 
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



    /**
     * 添加书籍章节内容
     * @param  [type] $id [书籍id]
     */
    public function chapter($id){

        //取出书籍的名称
        $task = D('task');
        $title = $task->where('id = '.$id)->field('title')->find();
        $this->assign('title',$title);

        $weektask = D('week_task');

        //取出已输入的章节数
        $chapterNum = $weektask->where('bookid = '.$id)->field('chapter')->max('chapter');
        $sectionNum = $weektask->where('bookid = '.$id)->field('section')->max('section');

        //下一节数
        $nextSecNum = (int)$sectionNum + 1;

        $this->assign('chapterNum',$chapterNum);
        $this->assign('sectionNum',$sectionNum);
        $this->assign('nextSecNum',$nextSecNum);

        if (IS_POST) {
            
            $data['bookid'] = $id;
            $data['uploadtime'] = date('y-m-d h:i:s',time());

            $chapter = I('chapter');
            if (empty($chapter)) {
                $this->error('请输入第几章');
                return;
            }

            if (!preg_match("/^\d*$/",$chapter)) {
                $this->error('请输入纯数字');
                return; 
            }

            $section = I('section');
            if (empty($section)) {
                $this->error('请输入第几节');
                return;
            }

            if (!preg_match("/^\d*$/",$section)) {
                $this->error('请输入纯数字');
                return; 
            }

            $content = I('content');
            if (empty($content)) {
                $this->error('请输入章节内容');
                return;
            }

            $data['chapter'] = $chapter;
            $data['section'] = $section;
            $data['content'] = $content;

            if ($weektask->create($data)) {
                
                if ($weektask->add()) {
                    $this->success('添加章节内容成功',U('index'));
                }else{
                    $this->error('添加章节内容失败');
                }
            }else{
                 $this->error($weektask->getError());   
            }


            return;
        }

        $this->display();
    }
}