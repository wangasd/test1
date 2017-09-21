<?php
namespace Admin\Controller;

use Think\Controller;

class ManagerController extends CommonController
{


    public function manager_add()
    {
        if (IS_POST) {
            $data = I('post.');
            $model = D('Manager');
            if(!$model->create($data)){
                $error = $model->getError();
                $this->error($error);
            }
            $res = $model->add();
            if ($res) {
                $this->success('添加成功！',U('Admin/Manager/manager_list'));
            }else{
                $this->error('添加失败！');
            }
        } else {
            $this->display();
        }
    }

    public function manager_edit()
    {

        $this->display();
    }

    public function manager_list()
    {
        $model = M('Manager');
        $data = $model->select();
        $this->assign('data', $data);
        $this->display();
    }

    public function manager_delete(){
        $model = M('Manager');
        $id = I('get.id');
        $res = $model->delete($id);

        if ($res) {
            $this->success('删除成功！',U('Admin/Manager/manager_list'));
        }else{
            $this->error('删除失败！');
        }
    }


}
