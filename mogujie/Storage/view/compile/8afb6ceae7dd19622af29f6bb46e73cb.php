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
	<form action="" method="post">
		<div class="alert alert-success" style="text-align:center;"><a style="float:left;" href="<?php echo U('index')?>" class="btn btn-sm btn-primary">&lt;-返回</a>修改货品</div>
		<table style="font-size: 14px;" class="table table-hover">
			<tr class="active">
			  <th>货品ID</th>
	  		  <?php foreach ($data as $v){?>
			  <th><?php echo $v['atname']?></th>
			  <?php }?>
			  <th>库存</th>
  			  <th>货号</th>
			</tr>
			<tr>
				<td><?php echo $lid?></td>
			  	<?php foreach ($data as $v){?>
				<td>
					<select name="ids[]" class="form-control">
						<?php foreach ($v['select'] as $value){?>
						<option value="<?php echo $value['gtid']?>" 
						<?php foreach ($list_data[0]['ids'] as $vv){?>
							<?php if($value['gtid']==$vv){?>
                selected="selected"
               <?php }?>
						<?php }?>><?php echo $value['g_type_value']?></option>
						<?php }?>	
					</select>
				</td>
				<?php }?>
				<td>
					<input type="text" name="stocks" id="" class="form-control" value="<?php echo $list_data[0]['stocks']?>" />
				</td>
				<td>
					<input type="text" name="goods_number" id="" class="form-control" value="<?php echo $list_data[0]['goods_number']?>" />
				</td>	
			</tr>
		</table>
		<input type="hidden" name="goods_gid" value="<?php echo $gid?>">
		<input type="hidden" name="lid" value="<?php echo $lid?>">
		<input type="submit" href="" class="btn btn-sm btn-info" value="保存修改">
		</form>
	</body>
</html>
