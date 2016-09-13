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
		<div  class="alert alert-success"><span>订单管理 > 订单管理</span></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>订单ID</th>
			  <th>订单号</th>
              <th>总价格</th>
              <th>下单时间</th>
              <th>状态</th>
			  <th>操作</th>
			</tr>
			<?php foreach ($morder as $v){?>
			<tr>
				<td><?php echo $v['oid']?></td>
				<td><?php echo $v['order_num']?></td>
                <td><?php echo $v['all_price']?></td>
                <td><?php echo date('Y-m-d',$v['create_time'])?></td>
                <td style="font-size: 12px;<?php if($v["order_type"]==0){?>
                color: #FF9F95;
               <?php }?><?php if($v["order_type"]==1){?>
                color: #77B8F1;
               <?php }?><?php if($v["order_type"]==2){?>
                color: #D8BD50;
               <?php }?><?php if($v["order_type"]==3){?>
                color: #1ABC9C;
               <?php }?>"><?php if($v['order_type']==0){?>
                未付款
               <?php }?><?php if($v['order_type']==1){?>
                已付款
               <?php }?><?php if($v['order_type']==2){?>
                已发货
               <?php }?><?php if($v['order_type']==3){?>
                已收货
               <?php }?></td>
				<td>
					<a href="<?php echo U('seeOrder',array('oid'=>$v['oid'],'order_num'=>$v['order_num']))?>" class="btn btn-sm btn-primary">订单列表</a>
					<a <?php if($v['order_type']==0 || $v['order_type']==2 || $v['order_type']==3){?>
                disabled="disabled"
               <?php }?> href="javascript:if(confirm('确认要发货吗?')) location.href='<?php echo U('send',array('oid'=>$v['oid']))?>'" class="btn btn-sm btn-warning">确认发货</a>
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
