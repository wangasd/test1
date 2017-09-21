<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/7
 * Time: 23:17
 */
class RoleController extends Controller{

//select * from role table and assign to role_list
    public function role_list(){
        $model=D('Role');
        $group=$model->select();
        $this->assign('group',$group);
        $this->display();
    }
    public function setauth(){
        $model_r=D('Role');
        $model_a=M('Auth');
        if(IS_POST){
            $post=I('post.');
            $u_r=$model_r->find($post['r_id']);
            $role_auth_ids=$post['id'];// 获得权限标识字符串
//            $role_arr=explode(",",$role_auth_ids);//将其转化为数组"id in ($role_auth_ids)"
            $auth_set=$model_a->where(array('id'=>array('in',$role_auth_ids)))->select();
            foreach ($auth_set as $v) {
                if($v['auth_c']){
                    $auth_ac[]=$v['auth_c']  . '-' . $v['auth_a'];
                }
            }
            $role_auth_ac=implode(',',$auth_ac);//组装字符串
            $data['role_auth_ids']=implode(",",$role_auth_ids);
            $data['role_auth_ac']=$role_auth_ac;
            $data['role_id']=$post['r_id'];
            $res=$model_r->save($data);
            if($res) $this->success('save Ok');
            else $this->error('save file');

        }else{
            $r_id=I('get.id');
            $auth['allFrist']=$model_a->where('pid=0')->select();
            $auth['allsecond']=$model_a->where('pid <> 0')->select();
    //        dump($auth);die;
            $u_r=$model_r->find($r_id);
            $r_name=$u_r['role_name'];
            $role_auth_ids=$u_r['role_auth_ids'];// 获得权限标识字符串
            $role_arr=explode(",",$role_auth_ids);//将其转化为数组
            $this->assign('role_arr',$role_arr);//分配数组,以便于前端使用in_array判断选中状态
            $this->assign('auth',$auth);
            $this->assign('r_id',$r_id);
            $this->assign('r_name',$r_name);
            $this->display();
        }
    }

//    add role
    public function role_add(){
        $model_a=M('Auth');
        if(IS_POST){
            $model_r=D('Role');
            $data=I('post.');
            $data['role_auth_ids']=implode(',',$data['id']);

            $auth_arr=$model_a->where("id in ($data[role_auth_ids])")->select();
            $role_auth_ac='';
            foreach ($auth_arr as $item) {
                if($item['auth_a']){
                    $role_auth_ac .=$item['auth_c'] .'-' .$item['auth_a'] . ',';
                }
            }
            $data['role_auth_ac']=trim($role_auth_ac,',');
            $res=$model_r->add($data);
            if($res){
                $this->success('Ok',U('__CONTROLLER__/role_list'));

            }

            dump($data);die;
        }else{
            //select all auth from auth table set to view role_add
            $auth['allFrist']=$model_a->where('pid=0')->select();
            $auth['allsecond']=$model_a->where('pid <> 0')->select();

            $this->assign('auth',$auth);

            $this->display();


        }
    }

}