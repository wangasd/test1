<?php
namespace Admin\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/9
 * Time: 19:32
 */
class TypeController extends CommonController {
//Type_list
    public function type_list(){
//        select * from type and assign to type_list
        $model=M('Type');
        $data=$model->select();
        $this->assign('data',$data);
//        dump($data);die;
        $this->display();
    }
//    Type_add
    public function type_add(){
        if (IS_POST){
            $data=I('post.');
            $model=M('Type');
            $res=$model->add($data);

            if($res)$this->success('add type success');
                else $this->error('add type fail');
        }else{
            $this->display();
        }
    }

    //todo Type_delete  waiting to you

    //Type edit
    public function type_edit(){
        if(IS_POST){

            //todo tm
        }else{
            $this->display();
        }
    }
}