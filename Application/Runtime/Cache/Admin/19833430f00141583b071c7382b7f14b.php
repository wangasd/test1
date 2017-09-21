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

    <style>  
        #iframeTop{  
            width: 100%;  
            height: 70px;  
        }  
        #iframeLeft{  
            width: 15%;  
            height: 700px;  
            float: left;  
        }  
        #iframeContent{  
            width: 84%;  
            height: 700px;  
        }  
    </style> 

</head>
<body>


<div>  
    <div id="iframeTop" name="iframeTop" frameborder="0" src="view/top.html"> <a href="/index.php/admin/goods/goods_test" target="iframeContent">goods_test</a></div>  
    <iframe id="iframeLeft" name="iframeLeft" frameborder="0" src="view/left.html"></iframe>  
    <iframe id="iframeContent" name="iframeContent" frameborder="0" src="test"></iframe>  
</div>  


    <!-- footer -->
    <footer>
        <hr>
        <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
    </footer>

</body>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="/Public/Admin/js/jquery-1.8.1.min.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<!--UEDITOR-->
</html>