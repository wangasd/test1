<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title><?php echo ($title); ?></title>

	<link href="/Public/Home/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Home/css/admin.css" rel="stylesheet" type="text/css" />

	<link href="/Public/Home/css/demo.css" rel="stylesheet" type="text/css" />

	<link href="/Public/Home/css/hmstyle.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.nav-cont .nav-extra{background: url(/Public/Home/images/extra.png);}
	</style>
	<script src="/Public/Home/js/jquery.min.js"></script>
	<script src="/Public/Home/js/amazeui.min.js"></script>
	<script type="text/javascript " src="/Public/Home/js/quick_links.js "></script>
</head>
<body>
<!--顶部导航条 -->
<div class="am-container header">
	<ul class="message-l">
		<div class="topMessage">
			<div class="menu-hd">
				<?php if($_SESSION['user_info']== null ): ?><a href="/index.php/Home/User/login" target="_top" class="h">亲，请登录</a>
					<a href="/index.php/Home/User/register" target="_top">免费注册</a>
					<?php else: ?>
					<a href="javascript:void(0);" target="_top" class="h">Hi,
						<?php if($_SESSION['user_info']['username']!= '' ): echo ($_SESSION['user_info']['username']); ?>
							<?php elseif($_SESSION['user_info']['email']!= '' ): ?>
							<?php echo ($_SESSION['user_info']['email']); ?>
							<?php else: ?>
							<?php echo (encrypt_phone($_SESSION['user_info']['phone'])); endif; ?>
					</a>
					<a href="/index.php/Home/User/logout" target="_top">退出</a><?php endif; ?>
			</div>
		</div>
	</ul>
	<ul class="message-r">
		<div class="topMessage home">
			<div class="menu-hd"><a href="/index.php/Home/Index/index" target="_top" class="h">商城首页</a></div>
		</div>
		<div class="topMessage my-shangcheng">
			<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
		</div>
		<div class="topMessage mini-cart">
			<div class="menu-hd"><a id="mc-menu-hd" href="/index.php/Home/Cart/cart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
		</div>
		<div class="topMessage favorite">
			<div class="menu-hd"><a href="/index.php/Home/Shoucang/shoucang" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
		</div>
	</ul>
</div>
<!--悬浮搜索框-->
<div class="nav white">
	<div class="logo"><img src="/Public/Home/images/logo.png" /></div>
	<div class="logoBig">
		<li><img src="/Public/Home/images/logobig.png" /></li>
	</div>
	<div class="search-bar pr">
		<a name="index_none_header_sysc" href="#"></a>
		<form action="/index.php/Home/Search/search">
			<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
			<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
		</form>
	</div>
</div>
<div class="clear"></div>
<!-- 以上内容是公共的头部 -->
<!-- 主体内容 -->


<!--主体部分-->
<div class="hmtop">
	<div class="banner">
		<!--轮播 -->
		<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
			<ul class="am-slides">
				<li class="banner1"><a href="introduction.html"><img src="/Public/Home/images/ad1.jpg" /></a></li>
				<li class="banner2"><a><img src="/Public/Home/images/ad2.jpg" /></a></li>
				<li class="banner3"><a><img src="/Public/Home/images/ad3.jpg" /></a></li>
				<li class="banner4"><a><img src="/Public/Home/images/ad4.jpg" /></a></li>

			</ul>
		</div>
		<div class="clear"></div>
	</div>

	<div class="shopNav">
		<div class="slideall">

			<div class="long-title"><span class="all-goods">全部分类</span></div>
			<div class="nav-cont">
				<ul>
					<li class="index"><a href="#">首页</a></li>
					<li class="qc"><a href="#">闪购</a></li>
					<li class="qc"><a href="#">限时抢</a></li>
					<li class="qc"><a href="#">团购</a></li>
					<li class="qc last"><a href="#">大包装</a></li>
				</ul>
				<div class="nav-extra">
					<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
					<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
				</div>
			</div>

			<!--侧边导航 -->
			<div id="nav" class="navfull">
				<div class="area clearfix">
					<div class="category-content" id="guide_2">

						<div class="category">
							<ul class="category-list" id="js_climit_li">
								<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if($vol["pid"] == 0 ): ?><li class="appliance js_toggle relative ">
											<div class="category-info">
												<h3 class="category-name b-category-name"><i><img src="/Public/Home/images/cake.png"></i><a class="ml-22" title="<?php echo ($vol["cate_name"]); ?>"><?php echo ($vol["cate_name"]); ?></a></h3>
												<em>&gt;</em></div>
											<div class="menu-item menu-in top">
												<div class="area-in">
													<div class="area-bg">
														<div class="menu-srot">
															<div class="sort-side">
																<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_second): $mod = ($i % 2 );++$i; if($cate_second["pid"] == $vol["id"] ): ?><dl class="dl-sort">
																			<dt><span title="<?php echo ($cate_second["cate_name"]); ?>"><?php echo ($cate_second["cate_name"]); ?></span></dt>
																			<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_third): $mod = ($i % 2 );++$i; if($cate_third["pid"] == $cate_second["id"] ): ?><dd><a title="<?php echo ($cate_third["cate_name"]); ?>" href="/index.php/Home/Search/searchId/id/<?php echo ($cate_third["id"]); ?>"><span><?php echo ($cate_third["cate_name"]); ?></span></a></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>

																		</dl><?php endif; endforeach; endif; else: echo "" ;endif; ?>

															</div>
															<div class="brand-side">
																<dl class="dl-sort"><dt><span>实力商家</span></dt>
																	<dd><a rel="nofollow" title="呵官方旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >呵官方旗舰店</span></a></dd>
																	<dd><a rel="nofollow" title="格瑞旗舰店" target="_blank" href="#" rel="nofollow"><span >格瑞旗舰店</span></a></dd>
																	<dd><a rel="nofollow" title="飞彦大厂直供" target="_blank" href="#" rel="nofollow"><span  class="red" >飞彦大厂直供</span></a></dd>
																	<dd><a rel="nofollow" title="红e·艾菲妮" target="_blank" href="#" rel="nofollow"><span >红e·艾菲妮</span></a></dd>
																	<dd><a rel="nofollow" title="本真旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >本真旗舰店</span></a></dd>
																	<dd><a rel="nofollow" title="杭派女装批发网" target="_blank" href="#" rel="nofollow"><span  class="red" >杭派女装批发网</span></a></dd>
																</dl>
															</div>
														</div>
													</div>
												</div>
											</div>
											<b class="arrow"></b>
										</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>

				</div>
			</div>
			<!--轮播 -->
			<script type="text/javascript">
				(function() {
					$('.am-slider').flexslider();
				});
				$(document).ready(function() {
					$("li").hover(function() {
						$(".category-content .category-list li.first .menu-in").css("display", "none");
						$(".category-content .category-list li.first").removeClass("hover");
						$(this).addClass("hover");
						$(this).children("div.menu-in").css("display", "block")
					}, function() {
						$(this).removeClass("hover")
						$(this).children("div.menu-in").css("display", "none")
					});
					$('#js_climit_li li').first().addClass('first')
					$('#js_climit_li li').last().addClass(function () {
						console.log('ooooooooooo')
						return "last"
					})
				})
			</script>

			<!--小导航 小屏幕使用 -->
			<div class="am-g am-g-fixed smallnav">
				<div class="am-u-sm-3">
					<a href="sort.html"><img src="/Public/Home/images/navsmall.jpg" />
						<div class="title">商品分类</div>
					</a>
				</div>
				<div class="am-u-sm-3">
					<a href="#"><img src="/Public/Home/images/huismall.jpg" />
						<div class="title">大聚惠</div>
					</a>
				</div>
				<div class="am-u-sm-3">
					<a href="#"><img src="/Public/Home/images/mansmall.jpg" />
						<div class="title">个人中心</div>
					</a>
				</div>
				<div class="am-u-sm-3">
					<a href="#"><img src="/Public/Home/images/moneysmall.jpg" />
						<div class="title">投资理财</div>
					</a>
				</div>
			</div>

			<!--走马灯 -->

			<div class="marqueen">
				<span class="marqueen-title">商城头条</span>
				<div class="demo">
					<ul>
						<li class="title-first">
							<a target="_blank" href="#">
								<img src="/Public/Home/images/TJ2.jpg"></img>
								<span>[特惠]</span>商城爆品1分秒
							</a>
						</li>
						<li class="title-first">
							<a target="_blank" href="#">
								<span>[公告]</span>商城与广州市签署战略合作协议
								<img src="/Public/Home/images/TJ.jpg"></img>
								<p>XXXXXXXXXXXXXXXXXX</p>
							</a>
						</li>

						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="./person/index.html">
									<img src="/Public/Home/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">小叮当</span>
									<a href="#"><p>点击更多优惠活动</p></a>
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="login.html">登录</a>
								<a class="am-btn-warning btn" href="register.html">注册</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>
						</div>
						<li>
							<a target="_blank" href="#">
								<span>[特惠]</span>洋河年末大促，低至两件五折
							</a>
						</li>
						<li>
							<a target="_blank" href="#">
								<span>[公告]</span>华北、华中部分地区配送延迟
							</a>
						</li>
						<li>
							<a target="_blank" href="#">
								<span>[特惠]</span>家电狂欢千亿礼券 买1送1！
							</a>
						</li>
					</ul>
					<div class="advTip"><img src="/Public/Home/images/advTip.jpg"/></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<script type="text/javascript">
			if ($(window).width() < 640) {
				function autoScroll(obj) {
					$(obj).find("ul").animate({
						marginTop: "-39px"
					}, 500, function() {
						$(this).css({
							marginTop: "0px"
						}).find("li:first").appendTo(this);
					})
				}
				$(function() {

					setInterval('autoScroll(".demo")', 3000);
				})
			}
		</script>
	</div>
	<div class="shopMainbg">
		<div class="shopMain" id="shopmain">

			<!--今日推荐 -->

			<div class="am-g am-g-fixed recommendation">
				<div class="clock am-u-sm-3" ">
				<img src="/Public/Home/images/2016.png "></img>
				<p>今日<br>推荐</p>
			</div>
			<div class="am-u-sm-4 am-u-lg-3 ">
				<div class="info ">
					<h3>真的有鱼</h3>
					<h4>开年福利篇</h4>
				</div>
				<div class="recommendationMain ">
					<img src="/Public/Home/images/tj.png "></img>
				</div>
			</div>
			<div class="am-u-sm-4 am-u-lg-3 ">
				<div class="info ">
					<h3>囤货过冬</h3>
					<h4>让爱早回家</h4>
				</div>
				<div class="recommendationMain ">
					<img src="/Public/Home/images/tj1.png "></img>
				</div>
			</div>
			<div class="am-u-sm-4 am-u-lg-3 ">
				<div class="info ">
					<h3>浪漫情人节</h3>
					<h4>甜甜蜜蜜</h4>
				</div>
				<div class="recommendationMain ">
					<img src="/Public/Home/images/tj2.png "></img>
				</div>
			</div>

		</div>
		<div class="clear "></div>
		<!--热门活动 -->

		<div class="am-container activity ">
			<div class="shopTitle ">
				<h4>活动</h4>
				<h3>每期活动 优惠享不停 </h3>
				<span class="more ">
                              	<a class="more-link " href="# ">全部活动</a>
                            </span>
			</div>

			<div class="am-g am-g-fixed ">
				<div class="am-u-sm-3 ">
					<div class="icon-sale one "></div>
					<h4>秒杀</h4>
					<div class="activityMain ">
						<img src="/Public/Home/images/activity1.jpg "></img>
					</div>
					<div class="info ">
						<h3>春节送礼优选</h3>
					</div>
				</div>

				<div class="am-u-sm-3 ">
					<div class="icon-sale two "></div>
					<h4>特惠</h4>
					<div class="activityMain ">
						<img src="/Public/Home/images/activity2.jpg "></img>
					</div>
					<div class="info ">
						<h3>春节送礼优选</h3>
					</div>
				</div>

				<div class="am-u-sm-3 ">
					<div class="icon-sale three "></div>
					<h4>团购</h4>
					<div class="activityMain ">
						<img src="/Public/Home/images/activity3.jpg "></img>
					</div>
					<div class="info ">
						<h3>春节送礼优选</h3>
					</div>
				</div>

				<div class="am-u-sm-3 last ">
					<div class="icon-sale "></div>
					<h4>超值</h4>
					<div class="activityMain ">
						<img src="/Public/Home/images/activity.jpg "></img>
					</div>
					<div class="info ">
						<h3>春节送礼优选</h3>
					</div>
				</div>

			</div>
		</div>
		<div class="clear "></div>

		<!--甜点-->

		<div class="am-container ">
			<div class="shopTitle ">
				<h4><?php echo ($cate_23['cate_name']); ?></h4>
				<h3>你是我的优乐美么？不，我是你小鱼干</h3>
				<div class="today-brands ">
					<a href="# ">小鱼干</a>
					<a href="# ">海苔</a>
					<a href="# ">鱿鱼丝</a>
					<a href="# ">海带丝</a>
				</div>
				<span class="more ">
                    			<a class="more-link " href="# ">更多美味</a>
                        	</span>
			</div>
		</div>
		<div class="am-g am-g-fixed flood method3 ">
			<ul class="am-thumbnails ">
				<?php if(is_array($goods_23)): $i = 0; $__LIST__ = $goods_23;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol_23): $mod = ($i % 2 );++$i;?><li>
						<div class="list ">
							<a href="/index.php/Home/Index/detail/id/<?php echo ($vol_23['id']); ?>" target="_blank">
								<img src="<?php echo ($vol_23['goods_small_img']); ?> " />
								<div class="pro-title "><?php echo ($vol_23['goods_name']); ?></div>
								<span class="e-price ">￥<?php echo ($vol_23['goods_price']); ?></span>
							</a>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>

		</div>

		<div class="clear "></div>
		<!--坚果-->

		<div class="am-container ">
			<div class="shopTitle ">
				<h4><?php echo ($cate_27['cate_name']); ?></h4>
				<h3>你是我的优乐美么？不，我是你小鱼干</h3>
				<div class="today-brands ">
					<a href="# ">小鱼干</a>
					<a href="# ">海苔</a>
					<a href="# ">鱿鱼丝</a>
					<a href="# ">海带丝</a>
				</div>
				<span class="more ">
                    			<a class="more-link " href="# ">更多美味</a>
                        	</span>
			</div>
		</div>
		<div class="am-g am-g-fixed flood method3 ">
			<ul class="am-thumbnails ">
				<?php if(is_array($goods_27)): $i = 0; $__LIST__ = $goods_27;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol_27): $mod = ($i % 2 );++$i;?><li>
						<div class="list ">
							<a href="/index.php/Home/Index/detail/id/<?php echo ($vol_27['id']); ?>" target="_blank">
								<img src="<?php echo ($vol_27['goods_small_img']); ?> " />
								<div class="pro-title "><?php echo ($vol_27['goods_name']); ?></div>
								<span class="e-price ">￥<?php echo ($vol_27['goods_price']); ?></span>
							</a>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>

		</div>


		<!-- 海味 -->
		<div class="am-container ">
			<div class="shopTitle ">
				<h4><?php echo ($cate_37['cate_name']); ?></h4>
				<h3>你是我的优乐美么？不，我是你小鱼干</h3>
				<div class="today-brands ">
					<a href="# ">小鱼干</a>
					<a href="# ">海苔</a>
					<a href="# ">鱿鱼丝</a>
					<a href="# ">海带丝</a>
				</div>
				<span class="more ">
                    			<a class="more-link " href="# ">更多美味</a>
                        	</span>
			</div>
		</div>
		<div class="am-g am-g-fixed flood method3 ">
			<ul class="am-thumbnails ">
				<?php if(is_array($goods_37)): $i = 0; $__LIST__ = $goods_37;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol_37): $mod = ($i % 2 );++$i;?><li>
						<div class="list ">
							<a href="/index.php/Home/Index/detail/id/<?php echo ($vol_37['id']); ?>" target="_blank">
								<img src="<?php echo ($vol_37['goods_small_img']); ?> " />
								<div class="pro-title "><?php echo ($vol_37['goods_name']); ?></div>
								<span class="e-price ">￥<?php echo ($vol_37['goods_price']); ?></span>
							</a>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>

		</div>
	</div>
</div>
</div>
</div>
<!--引导 小屏幕使用 -->

<div class="navCir">
	<li class="active"><a href="home3.html"><i class="am-icon-home "></i>首页</a></li>
	<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
	<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
	<li><a href="./person/index.html"><i class="am-icon-user"></i>我的</a></li>
</div>

<!-- 以下内容是公共的尾部 -->
<!-- 底部内容 -->
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
<!--右侧菜单 -->
<div class=tip>
	<div id="sidebar">
		<div id="wrap">
			<div id="prof" class="item ">
				<a href="# ">
					<span class="setting "></span>
				</a>
				<div class="ibar_login_box status_login ">
					<div class="avatar_box ">
						<p class="avatar_imgbox "><img src="/Public/Home/images/no-img_mid_.jpg " /></p>
						<ul class="user_info ">
							<li>用户名：sl1903</li>
							<li>级&nbsp;别：普通会员</li>
						</ul>
					</div>
					<div class="login_btnbox ">
						<a href="# " class="login_order ">我的订单</a>
						<a href="# " class="login_favorite ">我的收藏</a>
					</div>
					<i class="icon_arrow_white "></i>
				</div>

			</div>
			<div id="shopCart " class="item ">
				<a href="# ">
					<span class="message "></span>
				</a>
				<p>
					购物车
				</p>
				<p class="cart_num ">0</p>
			</div>
			<div id="asset " class="item ">
				<a href="# ">
					<span class="view "></span>
				</a>
				<div class="mp_tooltip ">
					我的资产
					<i class="icon_arrow_right_black "></i>
				</div>
			</div>

			<div id="foot " class="item ">
				<a href="# ">
					<span class="zuji "></span>
				</a>
				<div class="mp_tooltip ">
					我的足迹
					<i class="icon_arrow_right_black "></i>
				</div>
			</div>

			<div id="brand " class="item ">
				<a href="#">
					<span class="wdsc "><img src="/Public/Home/images/wdsc.png " /></span>
				</a>
				<div class="mp_tooltip ">
					我的收藏
					<i class="icon_arrow_right_black "></i>
				</div>
			</div>

			<div id="broadcast " class="item ">
				<a href="# ">
					<span class="chongzhi "><img src="/Public/Home/images/chongzhi.png " /></span>
				</a>
				<div class="mp_tooltip ">
					我要充值
					<i class="icon_arrow_right_black "></i>
				</div>
			</div>

			<div class="quick_toggle ">
				<li class="qtitem ">
					<a href="# "><span class="kfzx "></span></a>
					<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
				</li>
				<!--二维码 -->
				<li class="qtitem ">
					<a href="#none "><span class="mpbtn_qrcode "></span></a>
					<div class="mp_qrcode " style="display:none; "><img src="/Public/Home/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
				</li>
				<li class="qtitem ">
					<a href="#top " class="return_top "><span class="top "></span></a>
				</li>
			</div>

			<!--回到顶部 -->
			<div id="quick_links_pop " class="quick_links_pop hide "></div>

		</div>

	</div>
	<div id="prof-content " class="nav-content ">
		<div class="nav-con-close ">
			<i class="am-icon-angle-right am-icon-fw "></i>
		</div>
		<div>
			我
		</div>
	</div>
	<div id="shopCart-content " class="nav-content ">
		<div class="nav-con-close ">
			<i class="am-icon-angle-right am-icon-fw "></i>
		</div>
		<div>
			购物车
		</div>
	</div>
	<div id="asset-content " class="nav-content ">
		<div class="nav-con-close ">
			<i class="am-icon-angle-right am-icon-fw "></i>
		</div>
		<div>
			资产
		</div>

		<div class="ia-head-list ">
			<a href="# " target="_blank " class="pl ">
				<div class="num ">0</div>
				<div class="text ">优惠券</div>
			</a>
			<a href="# " target="_blank " class="pl ">
				<div class="num ">0</div>
				<div class="text ">红包</div>
			</a>
			<a href="# " target="_blank " class="pl money ">
				<div class="num ">￥0</div>
				<div class="text ">余额</div>
			</a>
		</div>

	</div>
	<div id="foot-content " class="nav-content ">
		<div class="nav-con-close ">
			<i class="am-icon-angle-right am-icon-fw "></i>
		</div>
		<div>
			足迹
		</div>
	</div>
	<div id="brand-content " class="nav-content ">
		<div class="nav-con-close ">
			<i class="am-icon-angle-right am-icon-fw "></i>
		</div>
		<div>
			收藏
		</div>
	</div>
	<div id="broadcast-content " class="nav-content ">
		<div class="nav-con-close ">
			<i class="am-icon-angle-right am-icon-fw "></i>
		</div>
		<div>
			充值
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	$(function(){
		$.ajax({
			'url':'/index.php/Home/Cart/ajaxgetnum',
			'type':'post',
			'data':'',
			'dataType':'json',
			'success':function(response){
				console.log(response);
				if(response.code != 10000){
					alert(response.msg);
					return;
				}else{
					//在页面显示数量
					$('#J_MiniCartNum').text(response.total_number);
				}
			}
		});
	});
</script>
</html>