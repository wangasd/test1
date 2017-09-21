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
        <h1 class="page-title">管理员列表</h1>
    </div>

    <div class="well">
        <!-- search button -->
        <form class="form-search">
            <div class="row-fluid" style="text-align: left;">
                <div class="pull-left span4 unstyled">
                    <p> 用户名：<input class="input-medium" type="text"></p>
                </div>
                <div class="pull-left span4 unstyled">
                    <p> 等级：
                        <select class="span2">
                            <option value="1">超级管理员</option>
                            <option value="2">普通管理员</option>
                        </select>
                    </p>
                </div>
                <div class="pull-left span4 unstyled">
                    <p> 开始时间：<input class="input-medium" type="text" onclick="WdatePicker()"></p>
                </div>
            </div>
            <button type="submit" class="btn">查找</button>
            <a class="btn btn-primary" onclick="javascript:window.location.href='/index.php/Admin/Manager/manager_add'">新增</a>
        </form>
    </div>
    <div class="well">
        <!-- table -->
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>用户名</th>
                    <th>昵称</th>
                    <th>等级</th>
                    <th>邮箱</th>
                    <th>是否可用</th>
                    <th>上次登录时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($data)): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><tr class="success">
                    <td><?php echo ($val["id"]); ?></td>
                    <td><?php echo ($val["username"]); ?></td>
                    <th><?php echo ($val["nickname"]); ?></th>
                    <td><?php echo ($val["status"]); ?></td>
                    <td><?php echo ($val["email"]); ?></td>
                    <td>可用</td>
                    <td><?php echo ($val["last_login_time"]); ?></td>
                    <td>
                        <a href="edit.html"><i class="icon-pencil"></i></a>
                        <a href="#myModal<?php echo ($val["id"]); ?>" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                    </td>
                </tr>
                <!-- delete showmodaldialog -->
                <div class="modal small hide fade" id="myModal<?php echo ($val["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">删除</h3>
                    </div>
                    <div class="modal-body">
                        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定删除该数据吗？</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                        <button class="btn btn-danger" data-dismiss="modal" onclick="location.href='/index.php/Admin/Manager/manager_delete/id/<?php echo ($val["id"]); ?>'">删除</button>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            </tbody>
        </table>
        <!-- pagination -->
        <div class="pagination">
            <ul>
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
    <!-- delete showmodaldialog -->
    <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">删除</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="icon-warning-sign modal-icon"></i>确定删除该数据吗？</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
            <button class="btn btn-danger" data-dismiss="modal">删除</button>
        </div>
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