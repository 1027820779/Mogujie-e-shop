<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	    	    <style>
			#page li{
				margin-right: 0px;
			}
	    </style>
	</head>
	<body>
		<div  class="alert alert-success"><span>订单管理 > 订单管理</span></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>订单ID</th>
			  <th>订单号</th>
              <th>总价格</th>
              <th>下单时间</th>
              <th>状态</th>
			  <th>操作</th>
			</tr>
			{{foreach from="$morder" value="$v"}}
			<tr>
				<td>{{$v['oid']}}</td>
				<td>{{$v['order_num']}}</td>
                <td>{{$v['all_price']}}</td>
                <td>{{date('Y-m-d',$v['create_time'])}}</td>
                <td style="font-size: 12px;{{if value='$v["order_type"]==0'}}color: #FF9F95;{{endif}}{{if value='$v["order_type"]==1'}}color: #77B8F1;{{endif}}{{if value='$v["order_type"]==2'}}color: #D8BD50;{{endif}}{{if value='$v["order_type"]==3'}}color: #1ABC9C;{{endif}}">{{if value="$v['order_type']==0"}}未付款{{endif}}{{if value="$v['order_type']==1"}}已付款{{endif}}{{if value="$v['order_type']==2"}}已发货{{endif}}{{if value="$v['order_type']==3"}}已收货{{endif}}</td>
				<td>
					<a href="{{U('seeOrder',array('oid'=>$v['oid'],'order_num'=>$v['order_num']))}}" class="btn btn-sm btn-primary">订单列表</a>
					<a {{if value="$v['order_type']==0 || $v['order_type']==2 || $v['order_type']==3"}}disabled="disabled"{{endif}} href="javascript:if(confirm('确认要发货吗?')) location.href='{{U('send',array('oid'=>$v['oid']))}}'" class="btn btn-sm btn-warning">确认发货</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
		{{if value="$total>10"}}
		<center>
			<div class="pagination">
				<ul id="page">
					{{$page}}
				</ul>
			</div>
		</center>
		{{endif}}
	</body>
</html>
