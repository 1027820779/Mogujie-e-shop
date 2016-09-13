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
		<div  class="alert alert-success"><span>类型管理 > 类型列表</span></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>类型ID</th>
			  <th>类型名称</th>
			  <th>操作</th>
			</tr>
			{{foreach from="$type" value="$v"}}
			<tr>
				<td>{{$v['tid']}}</td>
				<td>{{$v['tname']}}</td>
				<td>
					<a href="{{U('Type/attr_type',array('tid'=>$v['tid']))}}" class="btn btn-sm btn-primary">属性列表</a>
					<a href="{{U('Type/edit',array('tid'=>$v['tid']))}}" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='{{U('delete',array('tid'=>$v['tid']))}}'" class="btn btn-sm btn-danger">删除</a>
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
