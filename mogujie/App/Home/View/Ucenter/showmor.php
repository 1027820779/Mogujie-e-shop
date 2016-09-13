<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>蘑菇街 - 我的买手街！</title>
		<link rel="icon" type="image/x-icon" href="./Public/Home/img/favicon32.ico" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/ucenter.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/myOrder.css" />
		<link rel="stylesheet" type="text/css" href="./Public/Home/css/font-awesome.min.css" />
		<link rel="stylesheet" href="./Public/Home/css/font-awesome-ie7.min.css" />
		<script type="text/javascript" src="./Public/Admin/jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			$(function(){

			});
		</script>
	</head>
	<body>
		<!--头部-->
	{{include file="VIEW_PATH/Common/header.php"}}

		<!--导航栏，二级菜单-->
		<div class="body">
			<div class="box_frame">
				<div class="left_box">
					<div class="u_a_box">
						<a href="">
							{{if value="empty($udata['awatar'])"}}
								<img src="./Public/Home/img/awatar1.jpg"  alt="">
							{{else}}
								<img  src="{{$udata['awatar']}}"/>
							{{endif}}
						</a>
						<p>{{$_SESSION['account']}}</p>
						<div class="vv">
							<span>
								<i class="vf">v</i>
								<i class='vn'>2</i>
							</span>
						</div>
					</div>
					<ul>
						<li><a href="{{U('index')}}">基本信息</a></li>
						<li><a href="{{U('changeAwatar')}}">修改头像</a></li>
						<li><a href="{{U('changePass')}}">修改密码</a></li>
						<li class="selected"><a href="{{U('myOrder')}}">我的宝贝</a></li>
						<li><a href="{{U('myAddress')}}">我的地址</a></li>
					</ul>
					<div class="qcode">
						<img src="./Public/Home/img/qcode.png" alt="">
					</div>
				</div>
				<div class="right_box">
					<div class="menu_titles">
						<a href="{{U('myOrder')}}">我的收藏({{$collect_count}})</a>
						<a class="ss_alink" href="{{U('myOrder0')}}">待付款<span>({{$morder0}})</span></a>
						<a href="{{U('myOrder2')}}">待发货<span>(2)</span></a>
						<a href="{{U('myOrder1')}}">待收货<span>(3)</span></a>
						<a href="{{U('myOrder3')}}">待评价<span>(1)</span></a>
					</div>
					<div class="order_info_frame">
						<table class="tables">
							<tr class="btr">
								<th>商品</th>
								<th>商品信息</th>
								<th>单价(￥)</th>
								<th>数量</th>
								<th>小计(￥)</th>
								<th>操作</th>
							</tr>
							{{foreach from="$morderlist_data" value="$v"}}
							<tr class="adat">
								<td>
									<a href="{{U('Content/index',array('gid'=>$v['goods_gid']))}}">
										<img src="{{$v['list_pic']}}">
										<span>{{$v['gname']}}</span>
									</a>
								</td>
								<td>{{$v['info']}}</td>
								<td>{{$v['goods_price']}}</td>
								<td>{{$v['seld_num']}}</td>
								<td>{{$v['total_price']}}</td>
								<td>
									<a style="margin:0 5px 0px 5px;" href="javascript:if(confirm('确认删除吗?')) location.href='{{U('Ucenter/delmlnt',array('olid'=>$v['olid']))}}';">删除</a>

								</td>
							</tr>
							{{endforeach}}
						</table>
						<table style="border-collapse: collapse;width: 100%;font-family: sans-serif;">
							<tr style="height: 45px;background: #f7f7f7;color: #999999;font-size: 12px;">
								<th>订单号:&nbsp;{{$m_data0['order_num']}}</th>
								<th>下单时间:&nbsp;{{date('Y-m-d',$m_data0['create_time'])}}</th>
								<th>总价格:&nbsp;{{$m_data0['all_price']}}元</th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
	    {{include file="VIEW_PATH/Common/footer.php"}}
