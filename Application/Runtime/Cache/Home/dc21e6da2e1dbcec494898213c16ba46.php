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

<link href="/Public/Home/css/cartstyle.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/optstyle.css" rel="stylesheet" type="text/css" />

<div class="clear"></div>

<!--购物车 -->
<div class="concent">
	<div id="cartTable">
		<div class="cart-table-th">
			<div class="wp">
				<div class="th th-chk">
					<div id="J_SelectAll1" class="select-all J_SelectAll">

					</div>
				</div>
				<div class="th th-item">
					<div class="td-inner">商品信息</div>
				</div>
				<div class="th th-price">
					<div class="td-inner">单价</div>
				</div>
				<div class="th th-amount">
					<div class="td-inner">30天销量</div>
				</div>
				<div class="th th-sum">
					<div class="td-inner">库存数量</div>
				</div>
				<div class="th th-op">
					<div class="td-inner">操作</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>



		<tr class="item-list">
			<div class="bundle  bundle-last ">
				<!--<div class="bundle-hd">-->
				<div class="bundle-hd">
					<div class="bd-promos">
						<div class="bd-has-promo">在此分类下搜索:<span class="bd-has-promo-content">当前分类 :</span></div>



								<a class="selected" href="javascript:void(0);" target="_blank">所有分类<span class="gt"></span></a><br><br>
								<a href="javascript:void(0);" target="_blank">手机<span class="gt"></span></a>
								<a href="javascript:void(0);" target="_blank">食品<span class="gt"></span></a>
								<a href="javascript:void(0);" target="_blank">数码3C<span class="gt"></span></a>
								<a href="javascript:void(0);" target="_blank">鼠标<span class="gt"></span></a>
								<a href="javascript:void(0);" target="_blank">键盘<span class="gt"></span></a>
								<a href="javascript:void(0);" target="_blank"><span class="gt"></span></a>


					</div>


						<!--<div class="bd-has-promo">在此分类下搜索:<span class="bd-has-promo-content">当前分类 :</span>&nbsp;&nbsp;</div>-->
						<!--<div class="act-promo">-->
							<!--<select name="" id="">-->
								<!--<option value="0">+请选择分类+</option>-->
							<!--</select>-->
							<!--&lt;!&ndash;<a href="javascript:void(0);" target="_blank">所有分类<span class="gt"></span></a>&ndash;&gt;-->
						<!--</div>-->


						<span class="list-change theme-login">编辑</span>
					</div>
				</div>
				<!--</div>-->


				<div class="clear"></div>
				<div class="bundle-main">


					<?php if(is_array($goodsList)): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><ul class="item-content clearfix" goods_id="<?php echo ($vol["id"]); ?>" goods_attr_ids="<?php echo ($vol["goods_name"]); ?>" cart_id="<?php echo ((isset($vol["id"]) && ($vol["id"] !== ""))?($vol["id"]):0); ?>">






							<li class="td td-item">
								<div class="item-pic">
									<a href="/index.php/Home/Index/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" data-title="<?php echo ($vol["goods_name"]); ?>" class="J_MakePoint" data-point="tbcart.8.12">
										<img src="<?php echo ($vol["goods_small_img"]); ?>" class="itempic J_ItemImg"></a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="/index.php/Home/Index/detail/id/<?php echo ($vol["id"]); ?>" target="_blank" title="<?php echo ($vol["goods_name"]); ?>" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($vol["goods_name"]); echo ($vol["goods_name"]); ?></a>
									</div>
								</div>
							</li>

							<li class="td td-info">
								<div class="item-props item-props-can">
									<?php if(is_array($vol["goods_attr"])): $i = 0; $__LIST__ = $vol["goods_attr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attr): $mod = ($i % 2 );++$i;?><span class="sku-line"><?php echo ($attr["attr_name"]); ?>：<?php echo ($attr["attr_value"]); ?> </span><?php endforeach; endif; else: echo "" ;endif; ?>
									<span tabindex="0" class="btn-edit-sku theme-login">修改</span>
									<i class="theme-login am-icon-sort-desc"></i>
								</div>
							</li>

							<li class="td td-price">
								<div class="item-price price-promo-promo">
									<div class="price-content">
										<div class="price-line">
											<em class="price-original"><?php echo ($vol["goods_price"]); ?></em>
										</div>
										<div class="price-line">
											<em class="J_Price price-now" tabindex="0"><?php echo ($vol["goods_price"]); ?></em>
										</div>
									</div>
								</div>
							</li>
							<li class="td td-amount">
								<div class="amount-wrapper ">
									<div class="item-amount ">
										<div class="sl">
											<em class="J_Price price-now" tabindex="0"><?php echo ($vol['goods_number'] /10); ?></em>
										</div>
									</div>
								</div>
							</li>
							<li class="td td-sum">
								<div class="td-inner">
									<em tabindex="0" class="J_ItemSum number row_price">库存:<?php echo ($vol["goods_number"]); ?></em>
								</div>
							</li>
							<li class="td td-op">
								<div class="td-inner">

									<a title="加入购物车" class="btn-cart" href="javascript:void(0);"> 加入购物车</a>
									<a title="加入收藏夹" class="btn-fav" href="javascript:void(0);"> 加入收藏夹</a>

								</div>
							</li>
						</ul><?php endforeach; endif; else: echo "" ;endif; ?>

				</div>
			</div>
		</tr>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>




</div>
<script type="text/javascript">
	$(function(){

		var changenum = function(new_number, element){
			//分析ajax请求需要的数据  goods_id goods_attr_ids
			var goods_id = $(element).closest('ul').attr('goods_id');
			var goods_attr_ids = $(element).closest('ul').attr('goods_attr_ids');
			var data = {
				'goods_id': goods_id,
				'goods_attr_ids': goods_attr_ids,
				'number': new_number
			};
			var _this = element;
			发送ajax请求
			$.ajax({
				'url':'/index.php/Home/Search/ajaxchangenum',
				'type':'post',
				'data': data,
				'dataType':'json',
				'success':function(response){
					console.log(response);
					if(response.code != 10000){
						alert(response.msg);
						return;
					}else{
						//先修改当前行数量
						$(_this).closest('ul').find('.current_number').val(new_number);
						//修改当前行总金额
						var now_price = parseFloat($(_this).closest('ul').find('.price-now').text());
						var row_price = now_price * new_number;
						$(_this).closest('ul').find('.row_price').text(row_price);
						//修改头部的购物车数量
						$('#J_MiniCartNum').text(response.total_number);

						//调用changetotal方法
						changetotal();
					}
				}
			});
		}


		//收藏商品shoucang
		$('.btn-fav').click(function(){
			//准备参数
			var goods_id = $(this).closest('ul').attr('goods_id');
//			var goods_attr_ids = $(this).closest('ul').attr('goods_attr_ids');
			var keyWords = '<?php echo ($keyWords); ?>';

			var data = {
				'goods_id':goods_id,
				'keyWords':keyWords
			};
			var _this = this;
			//发送ajax
			$.ajax({
				'url':'/index.php/Home/Shoucang/ajaxsc',
				'type':'post',
				'data':data,
				'dataType':'json',
				'success':function(response){
					console.log(response);
					if(response.code != 10000){

						if(response.code == 20000) {
							alert(response.msg);
							location.href='/index.php/Home/User/login'

						}else{
							alert(response.msg);
							return;
						}

					}else{
						alert('收藏成功');


					}

				}
			});
		});
		//给全选checkbox 绑定onchange事件
		$('.check-all').change(function(){
			// var checked_value = $(this).attr('checked');
			//获取全选checkbox的选中状态
			var checked_value = $(this).prop('checked');
			// console.log(checked_value);
			//设置每一行的checkbox的选中状态和全选的状态一致
			$('.row_check').prop('checked', checked_value)
			//调用changetotal函数重新计算总数量和价格
			changetotal();
		});

		//给结算绑定onclick事件
		$('#J_Go').click(function(){
			//获取到所有的选中的行 通过checkbox
			var checked_checkbox = $('.row_check:checked');
			if(checked_checkbox.length == 0 ){
				return;
			}
			//遍历，获取到选中行的ul标签上cart_id属性值
			//把所有的cart_id 拼接成 ‘1,2’形式，作为一个参数值传递到url上
			var cart_ids = '';
			$.each(checked_checkbox, function(i,v){
				var cart_id = $(v).closest('ul').attr('cart_id');
				cart_ids += cart_id + ',';
			})
			//去除最后的逗号
			cart_ids = cart_ids.slice(0, -1);
			var url = "/index.php/Home/Search/flow2/cart_ids/" + cart_ids;
			//跳转页面到url
			location.href = url;
		});
	});
</script>
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