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
			<div class="alert alert-success">添加属性</div>
			<input type="hidden" name="atid" value="{{$atid}}">
			<div class="form-group">
				<label for="exampleInputEmail1">属性名称</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入属性名称"  name="atname" value="{{$attr['atname']}}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">属性类别</label>
			</div>
			<div class="form-group">
				<label class="radio-inline">
				  <input type="radio" name="attr_cate" id="inlineRadio1" value="0" {{if value="$attr['attr_cate']==0"}} checked="checked" {{endif}}> 属性
				</label>
				<label class="radio-inline">
				  <input type="radio" name="attr_cate" id="inlineRadio2" value="1" {{if value="$attr['attr_cate']==1"}} checked="checked" {{endif}}> 规格
				</label>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">属性值</label>
				<textarea name="atvalue" rows="5" cols=""  class="form-control" placeholder="请输入标签按照,分开">{{$attr['atvalue']}}</textarea>
			</div>
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
