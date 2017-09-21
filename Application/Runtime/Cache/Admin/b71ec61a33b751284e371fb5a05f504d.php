<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>后台管理系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/main.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap-responsive.min.css">
</head>
<body>

<!-- 上 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <ul class="nav pull-right">
                <li id="fat-menu" class="dropdown">
                    <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user icon-white"></i> admin
                        <i class="icon-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="/index.php/Admin/Login/logout">安全退出</a></li>
                    </ul>
                </li>
            </ul>
            <a class="brand" href="/index.php/Admin/Index/index"><span class="first">后台管理系统</span></a>
            <ul class="nav">
                <li class="active"><a href="/index.php/Admin/Index/index">首页</a></li>
                <li><a href="javascript:void(0);">系统管理</a></li>
                <li><a href="javascript:void(0);">权限管理</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- 左 -->
<div class="sidebar-nav">

    <?php if(is_array($_SESSION['s_frist'])): $k = 0; $__LIST__ = $_SESSION['s_frist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$frist): $mod = ($k % 2 );++$k;?><a href="#error-menu<?php echo ($k); ?>" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i><?php echo ($frist["auth_name"]); ?></a>
        <ul id="error-menu<?php echo ($k); ?>" class="nav nav-list collapse">

            <?php if(is_array($_SESSION['s_secent'])): $c_k = 0; $__LIST__ = $_SESSION['s_secent'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$secent): $mod = ($c_k % 2 );++$c_k; if($secent["pid"] == $frist["id"] ): ?><li><a href="/index.php/Admin/<?php echo ($secent["auth_c"]); ?>/<?php echo ($secent["auth_a"]); ?>"><?php echo ($secent["auth_name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>

    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-exclamation-sign"></i>系统管理</a>
    <ul id="dashboard-menu" class="nav nav-list collapse">
        <li><a href="javascript:void(0);">密码修改</a></li>
    </ul>
</div>
<!-- 右 -->
<div class="content">
    <div class="header">
        <h1 class="page-title">商品新增</h1>
    </div>
    
    <!-- add form -->
    <!-- add form -->
    <form action="/index.php/Admin/Goods/goods_add" method="post" id="tab" enctype="multipart/form-data">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#basic" data-toggle="tab">基本信息</a></li>
            <li role="presentation"><a href="#desc" data-toggle="tab">商品描述</a></li>
            <li role="presentation"><a href="#attr" data-toggle="tab">商品属性</a></li>
            <li role="presentation"><a href="#pics" data-toggle="tab">商品相册</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="basic">
                <div class="well">
                    <label>商品名称：</label>
                    <input type="text" name="goods_name" class="input-xlarge">
                    <label>商品价格：</label>
                    <input type="text" name="goods_price" class="input-xlarge">
                    <label>商品数量：</label>
                    <input type="text" name="goods_number" class="input-xlarge">
                    <label>商品分类：</label>
                    <select name="cate_id" class="input-xlarge">
                        <option value="0">==请选择==</option>
                        <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <label>商品logo：</label>
                    <input type="file" name="goods_logo" value="" class="input-xlarge">
                </div>
            </div>
            <div class="tab-pane fade in" id="desc">
                <div class="well">
                    <label>商品简介：</label>
                    <textarea id='ueditor' name="goods_introduce" style="height:300px;width:600px;"></textarea>
                </div>
            </div>
            <div class="tab-pane fade in" id="attr">
                <div class="well">
                    <label>商品分类：</label>
                    <select name="type_id" id="type_sel" class="input-xlarge">
                        <option value="0">--请选择分类--</option>

                        <?php if(is_array($type)): $k = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><option value="<?php echo ($val["type_id"]); ?>"><?php echo ($val["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <div id="attr_type">




                    </div>
                </div>
            </div>
            <div class="tab-pane fade in" id="pics">
                <div class="well">
                    <div>[<a href="javascript:void(0);" class="add">+</a>]商品图片：<input type="file" name="goods_pics[]" value="" class="input-xlarge"></div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">保存</button>
        </div>
    </form>
    <!-- footer -->
    <footer>
        <hr>
        <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
    </footer>
</div>
</body>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="/Public/Admin/js/jquery-1.8.1.min.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<!--UEDITOR-->
<script src="/Public/Admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/Public/Admin/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
    $(function(){
        var ue = UE.getEditor('ueditor');
        $('.add').click(function(){
            var add_div = '<div>[<a href="javascript:void(0);"" class="sub">-</a>]商品图片：<input type="file" name="goods_pics[]" value="" class="input-xlarge"></div>';
            //after在指定元素的后面追加元素
            $(this).parent().after(add_div);
        });
        //绑定事件方法 jq1.8版本及以前的版本 使用live方法， jq1.9及以后版本使用on方法
        $('.sub').live('click',function(){
            //remove 删除元素
            $(this).parent().remove();
        });
        $('#type_sel').live('change',function () {
            var value_attr = $(this).val();
            if (value_attr == 0){
                console.log(value_attr);
                alert(value_attr);
                //隐藏所有
            }else{
//                ajax 通过type获取属性
                $.ajax({
                    'url':'/index.php/Admin/Goods/getattr',
                    'type':'post',
                    'data':{'type_id':value_attr},
                    'dataType':'json',
                    'success':function (response) {
                        console.log(response);

                        if(response.code!=1000){
                            alert(response.msg);
                            return;
                        }else{
                            var attr_data=response.data;
                            var str='';
                            $.each(attr_data,function (k, v) {
                                console.log(k,v);
                                str += "<label>" + v.attr_name + "</label>";
                                if(v.attr_input_type == 0){
                                    //输入框
                                    // str += "<label>" + v.attr_name + "</label>";
                                    str += "<input type='text' name='attr_name[" + v.attr_id + "][]' class='input-xlarge'>";
                                }else if(v.attr_input_type == 1){
                                    //下拉列表
                                    str += "<select name='attr_name[" + v.attr_id + "][]'>";
                                    //拼接option标签代码
                                    $.each(v.attr_values.split(','), function(index, value){
                                        str += "<option value='" + value + "'>" + value + "</option>"
                                    });
                                    str += "</select>";
                                }else{
                                    //多选框
                                    $.each(v.attr_values.split(','), function(index, value){
                                        str += "<input type='checkbox' value='" + value + "' name='attr_name[" + v.attr_id + "][]'>" + value;
                                    });
                                }
                                //html代码拼接完成，需要显示到页面
                                $('#attr_type').html(str);
                            })
                        }

                    }

                })

            }
        })
    });
    //实例化ue编辑器


</script>
</html>