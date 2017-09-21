<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController{
    public function Goods_list(){
        $res=M('Goods');
        $data=$res->select();
        $this->assign("data",$data);
        $this->display();
    }

    public function get_list(){
        $start = I('start', 0);
        $length = I('length', 10);
        // 接收这个搜索的条件
        $keyword = I('keyword','');
        $keyword =  '%'.$keyword. '%';
        $res=M('Goods');
        
        $map = [];
        $count = $res->count();
        $filtedCount = $count;
        
        if(!empty($keyword)){
            $map['goods_name'] =array('like' , $keyword);
            $filtedCount = $res->where($ma0)->count();
        }
        $data=$res->where($map)->limit($start,$length)->select();
        $this->ajaxReturn([
            'data'=>$data,
            'recordsTotal'=>$count,
            'recordsFiltered'=>$filtedCount

            ]);
    }

    public function Goods_add(){
        $model=D('Goods');
        if (IS_POST){
            $data=I('post.');
            if($_FILES['goods_logo']['error']==0){
                //dump(min($_FILES['goods_logo']['error']));die;
//                dump($_FILES);die;
                $data=$model->uploadLogo($_FILES['goods_logo'],$data);
            }
            if(!$data){
                $this->error($model->getError());
            }

            $model->create($data);
            $res=$model->add();


            //处理属性信息
            foreach ($data['attr_name'] as $k=>$v) {
                foreach($v as $key =>$value){
                    $attr_data[]=array(
                        'goods_id'=>$res,
                        'attr_id'=>$k,
                        'attr_value'=>$value
                    );
                }
            }

            $at_res=M('GoodsAttr')->addAll($attr_data);
            if($at_res) $this->success('add success');
            else $this->error('fila');
//                dump($attr_data);die;




            //TO 多文件上传
            if($res){

                $goodsFile['goods_pics']=$_FILES['goods_pics'];
               // dump(min($goodsFile['goods_pics']['error']));die;
                if(min($goodsFile['goods_pics']['error'])==0){
//                    dump($goodsFile);die;
                    $up_res=$model->uploads($goodsFile,$res);

//                    dump($model->getError());

                }else{
                    $this->error('goods pic has a problem');
                }



            }
        }else{

            $category = M('Category') -> select();
            $this -> assign('category', $category);
            //select all goods type an assign
            $type=M('Type')->select();
            $this->assign('type',$type);
            $this->display();
        }
    }
    // ajax to get goods has attr in attribute table
    public function getattr(){
        $model=M('Attribute');
        $type=I('post.');
//        通过ajax传过来的值获得商品属性$type是个数组eg: type_id=>3
        $data=$model->where($type)->select();
        if ($data){
            $json_data=array(
                'code'=>'1000',
                'msg' =>'ok',
                'data'=>$data
            );
        }else{
           $json_data=array(
                'code'=>'1001',
                'msg' =>'fila'
           );
        }
        $this->ajaxReturn($json_data);

    }
    public function Goods_edit(){
        $model = D('Goods');
        if(IS_POST){
            //处理post表单提交
            $data = I('post.');
            //调用save方法完成修改
            // $res = $model -> save($data);

            //对商品描述字段做特殊处理 防范xss攻击 使用htmlpurifier
            $data['goods_introduce'] = I('post.goods_introduce', '', 'remove_xss');

            // 获取旧图片地址，用于后续的删除旧图片操作
            $goods = $model -> find($data['id']);

            //图片上传功能
            //设置一个标志位,用来后面删除旧图片做判断
            $flag = 0;
            if($_FILES['goods_img']['error'] == 0){
                //直接调用模型中封装的方法
                $data = $model -> upload_logo($_FILES, $data);
                if(!$data){
                    $this -> error('上传失败');
                }
                $flag = 1;
            }
            //使用create方法自动创建数据集（才可以使用字段映射等功能）
            if(! $model -> create($data) ){
                //创建失败，获取错误信息
                $error = $model -> getError();
                $this -> error($error);
            }
            // dump($model);die;
            //调用save方法完成修改（前面使用了create,save就不需要传递参数）
            $res = $model -> save();
            if($res !== false){
                //修改成功

                //商品属性修改  addAll($attr_data)
                //属性数据在$data['attr_name']中
                //格式如下
                // $attr_data = array(
                // 	array(),
                // 	array(),
                // );
                // dump($data['attr_name']);
                foreach($data['attr_name'] as $k => $v){
                    //$k 就是attr_id 值
                    foreach($v as $attr){
                        // $attr 就是 attr_value 值
                        $attr_data[] = array(
                            //上面添加商品时返回值就是添加成功的主键id
                            'goods_id' => $data['id'],
                            'attr_id' => $k,
                            'attr_value' => $attr
                        );
                    }
                }
                // dump($attr_data);die;
                //先删除商品原来的属性
                M('GoodsAttr') -> where("goods_id={$data['id']}") -> delete();
                //多条属性数据的批量添加操作
                $attr_res = M('GoodsAttr') -> addAll($attr_data);
                //对于$attr_res 这个结果，可以不做处理了。


                //商品相册
                if($flag){
                    //删除旧图片 需要获取原始图片在数据库中保存的路径
                    //删除大图
                    unlink(WEB_ROOT . $goods['goods_big_img']);
                    //删除缩略图
                    unlink(WEB_ROOT . $goods['goods_small_img']);
                }
                //上传相册图片
                //调用Goods模型中的upload_pics方法 ，传递文件数组 和商品id
                //文件数组$_FILES中也还有goods_img字段，也是需要先删除
                //另外一种方式，只需要保证$files 结构 和$_FILES保持一直
                // dump($_FILES);die;
                $files = array($_FILES['goods_pics']);
                $model -> upload_pics($files, $data['id']);

                $this -> success('修改成功', U('Admin/Goods/goods_list'));
            }else{
                //修改失败
                $this -> error('修改失败，请重试');
            }
        }else{
            //接收get请求中的id参数
            $id = I('get.id');
            //查询$id对应的商品信息
            $goods = $model -> find($id);
            $this -> assign('goods', $goods);

            //查询商品分类信息
            $category = M('Category') -> select();
            $this -> assign('category', $category);

            //查询商品类型信息
            $type = M('Type') -> select();
            $this -> assign('type', $type);

            //获取该商品对应的商品类型对应的所有属性（tpshop_attribute表）
            $attribute = M('Attribute') -> where("type_id={$goods['type_id']}") -> select();
            // dump($attribute);
            //把每个属性中的可选值转化为数组（方便页面上遍历操作）
            foreach($attribute as $k => &$v){
                $v['attr_values'] = explode(',', $v['attr_values']);
            }
            unset($k, $v);
            // dump($attribute);die;
            $this -> assign('attribute', $attribute);
            //获取当前商品拥有的所有属性（tpshop_goods_attr表）
            $goods_attr = M('GoodsAttr') -> where("goods_id=$id") -> select();
            //对goods_attr做处理，转化成
            // array('attr_id' => array('attr_value','attr_value'))即：
            // array('10' => array('北京昌平'),'11'=>array('210g'),'12'=>array('原味','奶油','炭烧'))
            // 形式，方便页面判断
            $new_goods_attr = array();
            foreach($goods_attr as $k => $v){
                $new_goods_attr[ $v['attr_id'] ][] = $v['attr_value'];
            }
            unset($k, $v);
            // dump($new_goods_attr);die;
            $this -> assign('new_goods_attr', $new_goods_attr);
            //查询商品的相册图片
            $goods_pics = M('Goodspics') -> where(array('goods_id' => $id)) -> select();
            $this -> assign('goods_pics', $goods_pics);
            $this->display();
        }

    }

    public function Goods_detail(){
    }
    public function Goods_delete(){
        $id=I('get.id');
        $model=M('Goods');
        $res=$model->delete($id);
        if($res){
            $this->success('delete Ok');
        }else{
        }
    }
    public function goods_test()
    {
        $this->display();
    }

}