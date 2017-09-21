<?php
namespace Admin\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/9
 * Time: 20:59
 */

class AttributeController extends CommonController {
//Attribute add
    public function attribute_add(){
        if(IS_POST){
            $data=I('post.');
            $model=M('Attribute');
            $res=$model->add($data);
            if($res) $this->success('add Attribute success',U('Admin/Attribute/attribute_list'));
            else $this->error('add fila try agin');
        }else{
            $type=M('Type')->select();
            $this->assign('type',$type);
            $this->display();
        }
    }
    public function attribute_list(){
        $attr=M('Attribute')->select();
        $this->assign('attr',$attr);
        $this->display();

    }
}
