<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/1
 * Time: 10:13
 */
class IndexController extends CommonController{
    public function index(){
        $this->display();
    }
    public function test(){

    	$this->display();
    }
    public function iframe()
    {
        
        $this->display();
    }

    public function json(){
    	$json = [];
    	$json[0]['keywords'] = '王彦春';
    	$json[0]['words'] = '王彦春王往往复复走家得彦春王彦春王彦春';

    	$json[1]['keywords'] = '往复';
    	$json[1]['words'] = '玄关往往复复走家得福adfadf啊';

    	$json[2]['keywords'] = '循环';
    	$json[2]['words'] = '循环如果若往复复走家得福a嘎达 啊打发 多大额额 额额额额额';

    	$json[3]['keywords'] = '总共';
    	$json[3]['words'] = '啊啊啊啊啊往复复走家得福a啊啊啊啊啊';

    	$json[4]['keywords'] = '测试测试';
    	$json[4]['words'] = 'a爱上对方往复复走家得福a过后就哭了';

    	$json[5]['keywords'] = '也是眼瞅';
    	$json[5]['words'] = '儿童任往复复走家得福a天野ui任天野';

    	$json[6]['keywords'] = '眼睛';
    	$json[6]['words'] = '为离开你施往复复走家得福a工队时代光华';

    	$json[7]['keywords'] = '星星都';
    	$json[7]['awords'] = '人更好你好地往复吗复走家得福a替换色 热热身';
    	$res = ['code' =>1,'data'=>$json];

    	$this->ajaxReturn($res);
    }

}