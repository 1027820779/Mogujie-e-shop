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
		<div class="alert alert-success" style="text-align:center;"><a style="float:left;" href="<?php echo U('index')?>" class="btn btn-sm btn-primary">&lt;-返回</a>编辑<?php echo $oldData['bname']?></div>
		<div class="form-group">
			<label for="exampleInputEmail1">名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text"  name="bname" value="<?php echo $oldData['bname']?>">
		</div>
		
		<script src="Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				// 点击关闭图片按钮
				$(".close_img").click(function(){
					// 删除图片元素
					var str='<label for="exampleInputEmail1">logo</label><input id="exampleInputEmail1" class="form-control" type="file" name="logo">';
					$("#upload_box").html(str);
				})
			})
		</script>
		<div class="form-group" id="upload_box">
			<!-- 如果有缩略图的时候 -->
			<?php if($oldData['logo']){?>
                
			<img src="<?php echo $oldData['logo']?>" width='81' alt="">
			<a href="javascript:;" class="close_img">X</a>
			<input type="hidden" name="logo" value="<?php echo $oldData['logo']?>"/>
			<?php }else{?>
			<label for="exampleInputEmail1">logo</label>
			<input id="exampleInputEmail1" class="form-control" type="file" name="logo">
			
               <?php }?>
		</div>
		<div id="">
			<label for="">是否热门</label>
			<br />
			<label class="checkbox checkbox-inline" for="checkbox">
				<input id="checkbox" class="custom-checkbox" type="radio" <?php if($oldData['is_hot']==1){?>
                checked="checked"
               <?php }?> data-toggle="radio" value="1" name="is_hot"> 是
			</label>
			<label class="checkbox checkbox-inline" for="checkbox1">
				<input id="checkbox1" class="custom-checkbox" type="radio" data-toggle="radio" <?php if($oldData['is_hot']==0){?>
                checked="checked"
               <?php }?> value="0" name="is_hot"> 否
			</label>
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序"  name="bsort" value="<?php echo $oldData['bsort']?>">
		</div>
		
		<input type="hidden" name="bid" value="<?php echo $oldData['bid']?>"/>

		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
