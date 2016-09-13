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
		<div  class="alert alert-success"><span>分类管理 > 分类列表</span></div>
		<form action="" method="post">
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>cid</th>
			  <th>分类名称</th>
			  <th>排序</th>
			  <th>类型名称</th>
			  <th>操作</th>
			</tr>
			<tr>
				{{foreach from='$cateData' value='$v'}}
				<td>{{$v["cid"]}}</td>
				<td>{{$v["_name"]}}</td>
				<td><input type="text" name="{{$v['cid']}}" id="" value="{{$v['sort']}}" class="form-control"></td>
				<td>{{$v['tname']}}</td>
				<td>
					<a href="{{U('Cate/addSon',array('cid'=>$v['cid']))}}" class="btn btn-sm btn-primary">添加子类</a>
					<a href="{{U('Cate/edit',array('cid'=>$v['cid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='{{U('Cate/del',array('cid'=>$v['cid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
		<input type="submit" href="" class="btn btn-sm btn-info" value="排序">
		</form>
	</body>
</html>
