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
        <h1 class="page-title">权限新增</h1>
    </div>

    <div class="well">
        <!-- add form -->
        <form id="tab" action="" method="post">
            <label>权限名称：</label>
            <input type="text" name="auth_name" value="<?php echo ($data["auth_name"]); ?>" class="input-xlarge">
            <label>上级权限</label>
            <select name="pid" class="input-xlarge">
                <option value="0" <?php if($data["pid"] == 0 ): ?>selected<?php endif; ?>>顶级权限</option>


            <?php if(is_array($all)): $k = 0; $__LIST__ = $all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($k % 2 );++$k;?><option value="<?php echo ($a["id"]); ?>" <?php if($a["id"] == $data["pid"] ): ?>selected<?php endif; ?>><?php echo ($a["auth_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

            </select>
            <div>
            <label>控制器：</label>
            <input type="text" name="auth_c" value="<?php echo ($data["auth_c"]); ?>" class="input-xlarge">
            </div>
            <div>
                <label>方法：</label>
                <input type="text" name="auth_a" value="<?php echo ($data["auth_a"]); ?>" class="input-xlarge">
            </div>
            <label>是否菜单项</label>
            <select name="is_nav" class="input-xlarge">
                <option value="1" <?php if($data["is_nav"] ==1 ): ?>selected<?php endif; ?> >是</option>
                <option value="0" <?php if($data["is_nav"] ==0 ): ?>selected<?php endif; ?> >否</option>
            </select>
            
            <label></label>
            <button class="btn btn-primary" type="submit">保存</button>
        </form>
    </div>
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
<script>
$(function(){
    if($("select[name=pid]").val() != 0){
        $("input[name=auth_c]").parent().show();
        $("input[name=auth_a]").parent().show();
    }else{
        $("input[name=auth_c]").parent().hide();
        $("input[name=auth_a]").parent().hide();
    }
    $("select[name=pid]").on('change', function(){
        if($(this).val() != 0){
            $("input[name=auth_c]").parent().show();
            $("input[name=auth_a]").parent().show();
        }else{
            $("input[name=auth_c]").parent().hide();
            $("input[name=auth_a]").parent().hide();
        }
    });
})
</script>
</html>