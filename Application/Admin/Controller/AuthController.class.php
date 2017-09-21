<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date:
 * Time: 22:58
 */
class   AuthController extends CommonController {
//    show all auth to a list
    public function auth_list(){
        $model=M('auth');
        $data=$model->select();

//        递归无限极排序
        $data=$this->recursion($data);
//        dump($data);die;
        $this->assign('data',$data);
        $this->display();
    }


    /**
     * auth add
     */
    public function auth_add(){
        $model=D('Auth');
        if(IS_POST){
            $data=I('post.');
//            dump($data);die;
            $res=$model->add($data);
            if($res){
                $this->success('add auth Ok');
            }else{
                $this->error('add file');
            }
        }else{

            //获取所有顶级权限
            $top = M('Auth') -> where("pid =0") -> select();
            $this -> assign('top', $top);
            $this -> display();
        }
    }



    /**
     *edit auth
     */
    public function auth_edit(){
        $model=M('Auth');
        if(IS_POST){

        }else{

            $id=I('get.id');
            $data=$model->find($id);
            $all=$model->select();
//            dump($all);die;
            $this->assign('all',$all);
            $this->assign('data',$data);
            $this->display();

        }

    }




//    无限极分类
//    public $recu;
    public function recursion($data,$p=0,$level=0){

        foreach ($data as $k => $v) {
            static $recu;
            if($v['pid']==$p){
                $v['level']=$level;
                $recu[]=$v;
//                $this->$recu;
                $this->recursion($data,$v['id'],$level+1);
            }
        }
//        return $this->recu;
        return $recu;

    }


}