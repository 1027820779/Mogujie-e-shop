<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="Public/Admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="Public/Admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
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
		<form action="" method="post">
		<div class="alert alert-success">品牌管理 > 品牌列表</div>
		<table class="table table-hover">
			<tr class="active">
			  <th>品牌ID</th>
			  <th>品牌名称</th>
			  <th>LOGO</th>
			  <th>排序</th>
  			  <th  style="text-align:center;">是否热门</th>
			  <th>操作</th>
			</tr>
			{{foreach from="$brandData" value="$v"}}
			<tr>
				<td>{{$v["bid"]}}</td>
				<td>{{$v["bname"]}}</td>
				<td><img src="{{$v['logo']}}" alt=""></td>
				<td><input type="text" name="{{$v['bid']}}" id="" value="{{$v['bsort']}}" class="form-control"></td>
				<td style="text-align:center;">{{if value="$v['is_hot']==1"}}<i style="color:#1caf9a;" class="icon-flag"></i>{{endif}}</td>
				<td>
					<a href="{{U('edit',array('bid'=>$v['bid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='{{U('del',array('bid'=>$v['bid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
		<input type="submit" href="" class="btn btn-sm btn-info" value="排序">
		</form>
	</body>
</html>
