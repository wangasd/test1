<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/15
 * Time: 19:53
 */
class UserController extends Controller{
    public function login(){
        layout(false);
        $this->display();
    }

    public function register(){
        layout(false);
        $this->display();
    }
    public function ajaxregister(){
        $data=I('post.');
        if($data['email']){
            $data['username'] = $data['email'];
        }else{
            $data['username'] = $data['phone'];
        }

        $model=D('User');
        if(!$model->create($data)){
            $error=$model->getError();
            $return = array(
                'code' => 10001,
                'msg' => $error
            );
            $this -> ajaxReturn($return);
        }else{
            $res=$model->add();
            if($res){
                //注册成功
                $return = array(
                    'code' => 10000,
                    'msg' => 'success'
                );
                $this -> ajaxReturn($return);
            }else{
                //注册失败
                $return = array(
                    'code' => 10002,
                    'msg' => '注册失败'
                );
                $this -> ajaxReturn($return);
            }
        }
    }
    public function ajaxlogin(){
        $data=I('post.');

        $username=$data['username'];
        $user=D('User')->where("username ='$username'")->find();
        if($user&&($user['password']==encrypt_password($data['password']))){
            session('user_info', $user);
            //设置登录标识之后，调用Cart模型的cookieTodb方法将cookie中的购物车数据保存到数据库
            D('Cart') -> cookieTodb();
            $return = array('code' => 10000, 'msg'=> 'success');
            $this -> ajaxReturn($return);
        }else{
            //登录失败
            $return = array('code' => 10001, 'msg'=> '用户名或密码错误');
            $this -> ajaxReturn($return);
        }
    }

    public function logout(){
        //清除session
        session(null);
        $this -> success('退出成功',U('Home/User/login'));
    }

}