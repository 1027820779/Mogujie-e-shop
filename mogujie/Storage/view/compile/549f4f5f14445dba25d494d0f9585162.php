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
		<form  method="post" action="">
		<div class="alert alert-success" style="text-align:center;"><a style="float:left;" href="<?php echo U('index')?>" class="btn btn-sm btn-primary">&lt;-返回</a><?php echo $parent['cname']?> > 添加分类</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称"  name="cname">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属分类</label>
			<select name="pid" class="form-control">
				<option value="<?php echo $parent['cid']?>"><?php echo $parent['cname']?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属类型</label>
			<select name="type_tid" class="form-control">
				<option value="<?php echo $parent['tid']?>"><?php echo $parent['tname']?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序"  name="sort" value="100">
		</div>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
