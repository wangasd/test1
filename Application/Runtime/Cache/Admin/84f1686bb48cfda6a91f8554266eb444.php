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
<style type="text/css">
    table img{max-width: 100px;}
</style>
</head>
<body>

<!--导航条侧边栏-->

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
        <h1 class="page-title">商品列表</h1>
    </div>

    <div class="well">
        <!-- search button -->
        <form class="form-search">
            <div class="row-fluid" style="text-align: left;">
                <div class="pull-left span4 unstyled">
                    <p> 商品名称：<input class="input-medium" type="text"></p>
                </div>
            </div>
            <button type="submit" class="btn">查找</button>
            <a class="btn btn-primary" onclick="javascript:window.location.href='/index.php/Admin/Goods/goods_add'">新增</a>
        </form>
    </div>
    <div class="well">
        <!-- table -->
              <table class="table table-border table-bordered table-bg">
                    <thead>
                        <tr>
                            <th scope="col" colspan="9">会员列表</th>
                        </tr>
                        <tr class="text-c">
                            <th width="25"><input type="checkbox" name="" value=""></th>
                            <th width="40">ID</th>
                            <th width="150">登名</th>
                            <th width="80">价格</th>
                            <th>头像</th>
                            <th>邮箱</th>
                            <th>QQ</th>
                            <th width="130">加入时间</th>
                            <th width="100">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

        <div id="example_filter"></div>



     


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
<script src="/Public/Admin/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
// 使用这个datatable从服务器获取数据
var dataTable = $('.table').dataTable({
    searching: false,
    serverSide: true, // 通过ajax从服务器获取数据
    ajax: {
        url: "/index.php/Admin/Goods/get_list",
        type: "post",
        data: function(formData) {
            // formData._token = "{{csrf_token()}}";
            // // 这个搜索条件
            // formData.datemin = $('#datemin').val();
            // formData.datemax = $('#datemax').val();
            // formData.keyword = $('#keyword').val();
        }
    },
    columns: [
        {data: "id"},
        {data: "id"},
        {data: "goods_name"},
        {data: "goods_price"},
        {data: "id"},
        {data: "id"},
        {data: "id"},
        {data: "id"},
        {data: "id"},
        
    ],
    createdRow: function(dom, data) {
        var $tr = $(dom);

        console.log(data);
        // 我们期望这个表格中的显示出这个复选框
        $tr.find('td:first').html("<input type='checkbox' value='" + data.id + "' />");
        // 这个会员的类型显示成对应的文字
        //$tr.find('td:eq(2)').html(data.goods_name);
        //$tr.find('td:eq(3)').html(data.type == 1 ? "老师" : "学生");
        //这个会员的头像显示成一张预览图
        $tr.find('td:eq(4)').html("<img width='50' height='50' src='" + data.avatar + "' />");
        $tr.addClass('text-c');
    }
});

function search()
{
    // 刷新这个datatable的ajax请求，让这个datatable重新发起这个ajax请求
    dataTable.api().ajax.reload();

}



</script>
</html>