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
	</head>
	<body>
		<div style="text-align:center;"  class="alert alert-success"><a style="float:left;" href="{{U('index')}}" class="btn btn-sm btn-primary">&lt;-返回</a><span>订单列表</span><span style="float:right;">订单号:{{$order_num}}</span></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>货品ID</th>
			  <th>货品名称</th>
              <th>总数</th>
              <th>单个价格</th>
              <th>价格总额</th>
			  <th>规格</th>
			</tr>
			{{foreach from="$mdata" value="$v"}}
			<tr>
				<td>{{$v['olid']}}</td>
				<td>{{$v['gname']}}</td>
                <td>{{$v['seld_num']}}</td>
                <td>{{$v['goods_price']}}</td>
                <td>{{$v['total_price']}}</td>
                <td>{{$v['info']}}</td>
			</tr>
			{{endforeach}}
		</table>
		<div style="font-size: 14px;color: #787878;background:#F5F5F5;border-color: #EBEBEB;" class="alert alert-success">备注:{{$translate}}</div>
	</body>
</html>
