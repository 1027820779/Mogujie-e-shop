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
	    <!-- 输入验证js -->
	    	<link rel="stylesheet" type="text/css" href="Public/validate/mzyValidate.css"/>
	    	<script src="Public/validate/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	    	<script src="Public/validate/mzyValidate.js" type="text/javascript" charset="utf-8"></script>
	    	<!-- 自定义错误提示样式 -->
   	<!-- <style type="text/css">
	    		.error_input{
				border: 2px solid #f00;
				padding: 2px;
				box-shadow: 0 0 3px #FF0000;
			}
	    	</style>   
	    	 -->
	</head>
	<body>
		<form  method="post" onsubmit="return mzy_validate(this,'<?php echo U('add')?>')">
		<div class="alert alert-success">添加分类</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称"  name="cname" rule="required" msg="请输入分类名称">
		</div>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
