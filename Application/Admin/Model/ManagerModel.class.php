<?php
/**
 * Created by PhpStorm.
 * User: kingf
 * Date: 2017/6/3
 * Time: 23:13
 */

namespace Admin\Model;
use Think\Model;

class ManagerModel extends Model
{
    //自动验证

    protected $_validate = array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array("username",'number','用户名非法'),
        array('password','number','商品价格字段不能为空',0,'',3),
        array('emal','currency','商品价格字段格式不正确',0,'',3),
        array('nickname','require','商品数量字段不能为空',0,'',3),
    );

}