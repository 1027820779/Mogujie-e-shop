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
		<div class="alert alert-success" style="text-align:center;"><a style="float:left;" href="<?php echo U('index')?>" class="btn btn-sm btn-primary">&lt;-返回</a>编辑<?php echo $cate['cname']?></div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称"  name="cname" value="<?php echo $cate['cname']?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属分类</label>
			<select name="pid" class="form-control">
                <option value="0">顶级分类</option>
				<?php foreach ($cateData as $v){?>
				<option value="<?php echo $v['cid']?>" <?php if($v['cid']==$cate['cid']){?>
                selected="selected"
               <?php }?>><?php echo $v['_name']?></option>
				<?php }?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属类型</label>
			<select name="type_tid" class="form-control">
				<?php foreach ($typeData as $v){?>
				<option value="<?php echo $v['tid']?>" <?php if($v['tid']==$cate['type_tid']){?>
                selected="selected"
               <?php }?>><?php echo $v['tname']?></option>
				<?php }?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序"  name="sort" value="<?php echo $cate['sort']?>">
		</div>
            <input name="cid" value="<?php echo $cid?>" type="hidden"/>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
