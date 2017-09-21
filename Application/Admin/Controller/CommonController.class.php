<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/3
 * Time: 20:19
 */
class CommonController extends Controller{
    public function __construct()
    {
        parent::__construct();
        if(!session('?manager_user')){
            $this->error('Plase Login',U('Admin/Login/login'));
        }

        $this->getNav();
    }

    public function getNav()
    {
        if(session('?s_frist')&&session('?s_secent')){


        }else{
    	    $role_id=session('manager_user.role_id');
            $model=M('auth');
            if($role_id==1){
                $frist=$model->where(array('pid'=>'0'))->select();
                $secent=$model->where('pid<>0')->select();
//                dump($secent);die;
            }else{
                $model_r=M('role');
                $res=$model_r->where(array('role_id'=>$role_id))->find();
                $role_auth_ids=$res['role_auth_ids'];
                $frist=$model->where("id in ($role_auth_ids) and pid = 0 ")->select();
                $secent=$model->where("id in ($role_auth_ids) and pid != 0 ")->select();

            }
            session('s_frist',$frist);
            session('s_secent',$secent);

        }


    }



}