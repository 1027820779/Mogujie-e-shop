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
		<form action="" method="post" enctype="multipart/form-data">
		<div class="alert alert-success">品牌管理 > 添加品牌</div>
		<div class="form-group">
			<label for="exampleInputEmail1">品牌名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text"  name="bname">
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">logo</label>
			<input id="exampleInputEmail1" class="form-control" type="file" name="logo">
		</div>
		<div id="">
			<label for="">是否热门</label>
			<br />
			<label class="checkbox checkbox-inline" for="checkbox">
				<input id="checkbox" class="custom-checkbox" type="radio" checked="checked" data-toggle="radio" value="1" name="is_hot"> 是
			</label>
			<label class="checkbox checkbox-inline" for="checkbox1">
				<input id="checkbox1" class="custom-checkbox" type="radio" data-toggle="radio" value="0" name="is_hot"> 否
			</label>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序"  name="bsort" value="100">
		</div>
		
	
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
