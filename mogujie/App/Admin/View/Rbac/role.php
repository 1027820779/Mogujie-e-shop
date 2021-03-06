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
		<div style="text-align:center;"  class="alert alert-success"><span>权限管理 > 角色列表</span><a style="float:right;" href="{{U('Rbac/addRole')}}" class="btn btn-sm btn-info">添加角色</a></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>ID</th>
			  <th>角色名称</th>
			  <th>角色描述</th>
			  <th>开启状态</th>	
			  <th>操作</th>
			</tr>
			{{foreach from="$role" value="$v"}}
			<tr>
				<td>{{$v['id']}}</td>
				<td>{{$v['name']}}</td>
				<td>{{$v['remark']}}</td>
				{{if value="$v['status']==0"}}
					<td>开启</td>
				{{else}}
					<td>关闭</td>
				{{endif}}

				<td>
					<a href="" class="btn btn-sm btn-primary">配置权限</a>
					<a href="{{U('attr_type_edit',array('atid'=>2))}}" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='{{U('attrDelete',array('atid'=>3))}}'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
	</body>
</html>
