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
		<form action="" method="post" id="addTag">
			<div class="alert alert-success">添加角色</div>
			<div class="form-group">
				<label for="exampleInputEmail1">角色名称</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入角色名称"  name="name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">开启状态</label>
			</div>
			<div class="form-group">
				<label class="radio-inline">
				  <input type="radio" name="status" id="inlineRadio1" value="0" checked="checked"> 开启
				</label>
				<label class="radio-inline">
				  <input type="radio" name="status" id="inlineRadio2" value="1"> 关闭
				</label>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">角色描述</label>
				<textarea name="remark" rows="5" cols=""  class="form-control" placeholder="请输入该角色的描述"></textarea>
			</div>
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
