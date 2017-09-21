<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/18
 * Time: 19:37
 */
class TextController extends Controller{
//    根据用户名name查询
    public function ajaxName(){
        $search=I('post.');
        $model=M('Order');
        if(isset($search['name'])){

            $name=$search['name'];
            //三表联查,模糊查询
            $goods_list = $model->alias('t1')->field('t1.*, t2.usernaem,t3.goods_name')->join("join tpshop_user t2 on t1.user_id=t2.id")->join("join tpshop_order_goods t3 on t1.id=t2.order_id")->where("t3.goods_name like %$name%")->select();
        }else{

            $time_end=$search[0]>$search[1]?$search[1]:$search[0];
            $time_begin=$search[0]>$search[1]?$search[0]:$search[1];

            $goods_list = $model->alias('t1')->field('t1.*, t2.username,t3.goods_name')->join("join tpshop_user t2 on t1.user_id=t2.id")->join("join tpshop_order_goods t3 on t1.id=t3.order_id")->where("t1.time <$time_begin and t1.time >$time_end")->select();

        }

        //组装数据
        $return = array(
            'code' => 10000,
            'data' => "$goods_list"
        );
        $this -> ajaxReturn($return);

    }

}
































