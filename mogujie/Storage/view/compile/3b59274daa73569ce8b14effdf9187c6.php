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
		<div style="text-align:center;"  class="alert alert-success"><a style="float:left;" href="<?php echo U('Type/index')?>" class="btn btn-sm btn-primary">&lt;-返回</a><span><?php echo $tname?> > 属性列表</span><a style="float:right;" href="<?php echo U('Type/attr_type_add',array('tid'=>$tid))?>" class="btn btn-sm btn-info">添加属性</a></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>属性ID</th>
			  <th>属性名称</th>
			  <th>属性类别</th>
			  <th>属性值</th>	
			  <th>操作</th>
			</tr>
			<?php foreach ($attr as $v){?>
			<tr>
				<td><?php echo $v['atid']?></td>
				<td><?php echo $v['atname']?></td>
				<?php if($v['attr_cate']==0){?>
                
					<td>属性</td>
				<?php }else{?>
					<td>规格</td>
				
               <?php }?>
				<td><?php echo $v['atvalue']?></td>
				<td>
					<a href="<?php echo U('attr_type_edit',array('atid'=>$v['atid']))?>" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='<?php echo U('attrDelete',array('atid'=>$v['atid']))?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>
