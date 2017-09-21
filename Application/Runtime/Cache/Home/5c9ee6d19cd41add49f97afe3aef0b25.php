<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link href="/Public/Home/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Public/Home/css/dlstyle.css" rel="stylesheet" type="text/css" />
		<script src="/Public/Home/js/jquery.min.js"></script>
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/Public/Home/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/Public/Home/images/big.jpg" /></div>
				<div class="login-box">

					<h3 class="title">登录商城</h3>

					<div class="clear"></div>
						
					<div class="login-form">
					  	<form>
						   	<div class="user-name">
							    <label for="user"><i class="am-icon-user"></i></label>
							    <input type="text" name="" id="user" placeholder="邮箱/手机/用户名">
             				</div>
             				<div class="user-pass">
							    <label for="password"><i class="am-icon-lock"></i></label>
							    <input type="password" name="" id="password" placeholder="请输入密码">
             				</div>
          				</form>
       				</div>
            
            		<div class="login-links">
                		<label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
						<a href="#" class="am-fr">忘记密码</a>
						<a href="register.html" class="zcnext am-fr am-btn-default">注册</a>
						<br />
            		</div>
					<div class="am-cf">
						<input type="button" name="" id="login_btn" value="登 录" class="am-btn am-btn-primary am-btn-sm">
					</div>
					<div class="partner">		
							<h3>合作账号</h3>
						<div class="am-btn-group">
							<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
							<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
							<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
						</div>
					</div>	

				</div>
			</div>
		</div>


		<div class="footer ">
			<div class="footer-hd ">
				<p>
					<a href="# ">恒望科技</a>
					<b>|</b>
					<a href="# ">商城首页</a>
					<b>|</b>
					<a href="# ">支付宝</a>
					<b>|</b>
					<a href="# ">物流</a>
				</p>
			</div>
			<div class="footer-bd ">
				<p>
					<a href="# ">关于恒望</a>
					<a href="# ">合作伙伴</a>
					<a href="# ">联系我们</a>
					<a href="# ">网站地图</a>
				</p>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		$(function(){
			$('#login_btn').click(function(){
				//获取页面输入
				var username = $('#user').val();
				var password = $('#password').val();
				//请求参数
				var data = {
					'username':username,
					'password':password
				};
				//发送ajax
				$.ajax({
					'url':'/index.php/Home/User/ajaxlogin',
					'type':'post',
					'data': data,
					'dataType':'json',
					'success':function(response){
						console.log(response);
						if(response.code != 10000){
							alert(response.msg);
							return;
						}else{
							var back_url = "<?php echo (session('back_url')); ?>";
							if(back_url){
								window.location.href = back_url;
							}else{
								window.location.href = '/index.php/Home/Index/index';
							}
						
						}
					}
				});
			});
		});
	</script>
</html>