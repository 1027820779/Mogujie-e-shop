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
		<div  class="alert alert-success"><span>商品管理 > 商品列表</span></div>
		<table style="font-size: 14px;" class="table table-hover">
			<tr class="active">
			  <th>ID</th>
			  <th>商品名称</th>
			  <th>价格</th>
			  <th>库存</th>
  			  <th>点击次数</th>
			  <th>商品图</th>
			  <th>操作</th>
			</tr>
			<?php foreach ($gooddata as $v){?>
			<tr>
				<td><?php echo $v['gid']?></td>
				<td><?php echo $v['gname']?></td>
				<td>
					<p style="font-size: 14px;line-height: 14px;margin-bottom: 0px;">市场价：<span style="text-decoration:line-through;">¥<?php echo $v['mark_price']?></span></p>
					<p style="font-size: 14px;line-height: 14px;margin-bottom: 0px;">商城价：<span>¥<?php echo $v['goods_price']?></span></p>
				</td>
				<td><?php echo $v['stock_num']?></td>
				<td><?php echo $v['click']?></td>
				<td><img src="<?php echo $v['list_pic']?>" width="40" height="60" alt=""></td>
				<td>
					<a href="<?php echo U('lists',array('gid'=>$v['gid'],'tid'=>$v['type_tid']))?>" class="btn btn-sm btn-primary">货品列表</a>
					<a href="<?php echo U('edit',array('gid'=>$v['gid'],'tid'=>$v['type_tid']))?>" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='<?php echo U('delete',array('gid'=>$v['gid']))?>';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
				<?php if($total>10){?>
                
		<center>
			<div class="pagination">
				<ul id="page">
					<?php echo $page?>
				</ul>
			</div>
		</center>
		
               <?php }?>
	</body>
</html>
