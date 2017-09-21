<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller
{

    public function search()
    {


        $keyWords = I('index_none_header_sysc');
        $model = M('goods');
        $goodsList = $model->where("goods_name like '%$keyWords%'")->select();
        $this->assign('goodsList', $goodsList);
        $this->assign('keyWords', $keyWords);
        $this->display();


    }
    public function searchId(){
        $id=I('get.id');
        $model = M('goods');
        $goodsList = $model->where("cate_id=$id")->select();
        $this->assign('goodsList', $goodsList);
//        $this->assign('keyWords', $keyWords);
        $this->display('search');

    }
}
