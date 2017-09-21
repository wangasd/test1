<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $category = M('Category') -> select();
        $this -> assign('category', $category);
        //获取指定的分类id为 23,27,37的分类及商品
        //
        $id_1=23;
        $cate_23 = M('Category') -> find($id_1);
        $goods_23 = M('Goods')->limit(5) -> where("cate_id = $id_1") -> select();
        $this -> assign('cate_23', $cate_23);
        $this -> assign('goods_23', $goods_23);

        //cate_id = $id27
        $id27=28;
        $cate_27 = M('Category') -> find($id27);
        $goods_27 = M('Goods')->limit(5) -> where("cate_id = $id27") -> select();
        $this -> assign('cate_27', $cate_27);
        $this -> assign('goods_27', $goods_27);

        //cate_id = 37
        $cate_37 = M('Category') -> find(37);
        $goods_37 = M('Goods')->limit(5) -> where("cate_id = 37") -> select();
        $this -> assign('cate_37', $cate_37);
        $this -> assign('goods_37', $goods_37);

        $this -> assign('title', '首页');
        $this -> display();
    }
    public function detail (){


        $id = I('get.id');
        $goods = M('Goods') -> find($id);
        $goods['goods_introduce']=htmlspecialchars_decode($goods['goods_introduce']);
//        foreach ($goods as $k => &$k){
//
//        }
        $this -> assign('goods', $goods);
        //单选属性
        $attr_radio = M('GoodsAttr') -> alias('t1') -> field('t1.*, t2.attr_name') -> join('left join tpshop_attribute t2 on t1.attr_id=t2.attr_id') -> where("t1.goods_id=$id and t2.attr_type=1") -> select();
        // dump($attr_radio);die;
        //组装数据

        $new_attr_radio = array();
        foreach($attr_radio as $k => $v){
            $new_attr_radio[$v['attr_id']][] = $v;
        }
        $this -> assign('new_attr_radio', $new_attr_radio);
        // dump($new_attr_radio);die;
        //获取唯一属性
        $attr_only = M('GoodsAttr') -> alias('t1') -> field('t1.*, t2.attr_name') -> join('left join tpshop_attribute t2 on t1.attr_id=t2.attr_id') -> where("t1.goods_id=$id and t2.attr_type=0") -> select();
        $this -> assign('attr_only', $attr_only);
        // dump($attr_only);die;

        //查询商品相册图片
        $goods_pics = M('Goodspics') -> where("goods_id=$id") -> select();
        $this -> assign('goods_pics', $goods_pics);

        $this -> assign('title', '商品详情');
        $this -> display();
    }
}
