<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/16
 * Time: 23:21
 */
class ShoucangController extends Controller {

    public function shoucang(){
        if (session('?user_info')) {
            $user_id = $user_id = session('user_info.id');
            $model=D('Shoucang');
            $fav=$model->where("user_id = $user_id")->select();
            $fav_id='';
            foreach ($fav as $k => $v) {
                $fav_id .=$v['goods_id'].',';
            }
            $fav_id= trim($fav_id,',');

            $favGoods=M('Goods')->where("id in ( $fav_id )")->select();
            $this->assign('favGoods',$favGoods);
            $this->display();
        }else{
            $this->redirect('Home/User/login');
        }

    }


    public function ajaxdelsc(){
            $data = I('post.');
            $goods_id=$data['goods_id'];
            $user_id = $user_id = session('user_info.id');
            $model = D('Shoucang');
            $res=$model->where("goods_id = $goods_id and user_id = $user_id")->delete();

            if($res){
                $return = array(
                    'code' => 10000,
                    'msg' => '删除成功'
                );
                $this->ajaxReturn($return);
            }else{
                $return = array(
                    'code' => 10001,
                    'msg' => '删除失败'
                );
                $this->ajaxReturn($return);
            }
    }

    public function ajaxsc()
    {
         $data = I('post.');
        if (session('?user_info')) {
            $model = D('Shoucang');
            $data['user_id'] = $user_id = session('user_info.id');
            $res=$model->add($data);
            if($res){
                $return = array(
                    'code' => 10000,
                    'msg' => '收藏成功'
                );
                $this->ajaxReturn($return);
            }else{
                $return = array(
                    'code' => 10001,
                    'msg' => '收藏失败'
                );
                $this->ajaxReturn($return);
            }
//            dump($data);
        }else {
            //这里登录成功之后要跳回到收藏
            session('back_url', U("Home/Search/search/index_none_header_sysc/{$data['keyWords']}"));
            $return = array(
                'code' => 20000,
                'msg' => '请先登录'
            );
            $this->ajaxReturn($return);
        }
    }
}