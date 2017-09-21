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
        <h1 class="page-title">商品类型列表</h1>
    </div>

    <div class="well">
    <a class="btn btn-primary" onclick="javascript:window.location.href='type_add'">新增</a>
        <!-- table -->
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>商品类型名称</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tlist): $mod = ($k % 2 );++$k;?><tr class="success">
                <td><?php echo ($tlist["type_id"]); ?></td>
                <td><?php echo ($tlist["type_name"]); ?></td>
                <td><a href="type_edit/id/<?php echo ($tlist["type_id"]); ?>" class="tablelink">编辑</a> <a href="type_delete/id/<?php echo ($tlist["type_id"]); ?>" class="tablelink"> 删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>
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
<!-- 日期控件 -->
<script src="/Public/Admin/js/calendar/WdatePicker.js"></script>
</html>