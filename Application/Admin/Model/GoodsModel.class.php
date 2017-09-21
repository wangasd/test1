<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{

    protected $_auto =array(array('goods_create_time','time',1,'function'));

    public function uploadLogo($fil,$data){
            $config=array(
                'exts'=>array('jpg','png','gif','jpeg'),
                'rootPath'=> WEB_ROOT . UPLOADS_PATH,
            );
            $upload= new \Think\Upload($config);

            $up_res=$upload->uploadOne($fil);
            if(!$up_res){
                dump($upload->getError());
                return;
            }
            //create img dir
            $data['goods_big_img']= UPLOADS_PATH . $up_res['savepath'] . $up_res['savename'];
            $img= new \Think\Image();


            //create thumb img small img
            $img->open(WEB_ROOT . $data['goods_big_img']);
            $img->thumb(160,140);
            $save_path= UPLOADS_PATH . $up_res['savepath'] .thum . $up_res['savename'];
            $img->save(WEB_ROOT . $save_path);
            $data['goods_small_img'] =$save_path;
            return $data;
    }
    public function uploads($files,$goods_id){

        //实例化文件上传类
        $config = array(
            'maxSize' => 2 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)(单位byte)
            'exts' => array('jpg','png','gif','jpeg'), //允许上传的文件后缀
            'rootPath' => WEB_ROOT . UPLOADS_PATH, //保存根路径
        );


        $upload = new \Think\Upload($config);
//        dump($_FILES);
//        dump($files);die;
        //使用upload方法完成多文件的上传
        $res = $upload -> upload($files);

//
//        dump($res);die;
        if(!$res){
            return false;
        }
        //上传成功，需要对$res进行处理，要上传成功的图片地址都保存到数据库tpshop_goodspics表
        //多文件上传，需要同时向数据库插入多条记录  add()  addAll($data)
        //如何组装多条数据的数组
        $data = array();
        foreach($res as $k => $v){
            $data[$k]['goods_id'] = $goods_id;
            $data[$k]['pics_origin'] = UPLOADS_PATH . $v['savepath'] . $v['savename'];

            //生成缩略图
            $image = new \Think\Image();
            $image -> open(WEB_ROOT . $data[$k]['pics_origin']);
            //生成大图 800 * 800
            $image -> thumb(800, 800);
            $image -> save(WEB_ROOT . UPLOADS_PATH . $v['savepath'] . 'big_' . $v['savename']);
            //生成中图 350 * 350
            $image -> thumb(350, 350);
            $image -> save(WEB_ROOT . UPLOADS_PATH . $v['savepath'] . 'mid_' . $v['savename']);
            //生成中图 50 * 50
            $image -> thumb(50, 50);
            $image -> save(WEB_ROOT . UPLOADS_PATH . $v['savepath'] . 'sma_' . $v['savename']);

            $data[$k]['pics_big'] = UPLOADS_PATH . $v['savepath'] . 'big_' . $v['savename'];
            $data[$k]['pics_mid'] = UPLOADS_PATH . $v['savepath'] . 'mid_' . $v['savename'];
            $data[$k]['pics_sma'] = UPLOADS_PATH . $v['savepath'] . 'sma_' . $v['savename'];
        }
        //添加多条数据到数据表
        $result = M('Goodspics') -> addAll($data);
        if($result){
            return true;
        }else{
            return false;
        }

    }

}