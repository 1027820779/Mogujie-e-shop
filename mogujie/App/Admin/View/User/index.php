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
		<div  class="alert alert-success"><span>会员管理 > 会员管理</span></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>用户ID</th>
			  <th>头像</th>
			  <th>用户名</th>
			  <th>真是姓名</th>
              <th>邮箱</th>
              <th>手机号</th>
              <th>状态</th>
			  <th>操作</th>
			</tr>
			{{foreach from="$user" value="$v"}}
			<tr>
				<td>{{$v['uid']}}</td>
                <td>{{if value="$v['awatar']==''"}}<img style="width: 40px;height: 40px;" src="./Public/Home/img/awatar1.jpg">{{else}}<img style="width: 40px;height: 40px;" src="{{$v['awatar']}}">{{endif}}</td>
				<td>{{$v['account']}}</td>
                <td>{{$v['uname']}}</td>
                <td>{{$v['email']}}</td>
                <td>{{$v['phone']}}</td>
                <td{{if value="$v['lock']==0"}}style="font-size: 12px;color: #1ABC9C;"{{endif}}{{if value="$v['lock']==1"}}style="font-size: 12px;color: #FF9F95;"{{endif}}>{{if value="$v['lock']==0"}}正常{{endif}}{{if value="$v['lock']==1"}}锁定{{endif}}</td>
				<td>
                    {{if value="$v['lock']==0"}}
                    <a href="javascript:if(confirm('确认要锁定吗?')) location.href='{{U('addLock',array('uid'=>$v['uid']))}}'" class="btn btn-sm btn-warning">锁定</a>
                    {{endif}}
                    {{if value="$v['lock']==1"}}
                    <a href="javascript:if(confirm('确认要解除锁定吗?')) location.href='{{U('removeLock',array('uid'=>$v['uid']))}}'" class="btn btn-sm btn-primary">解除</a>
                    {{endif}}
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
