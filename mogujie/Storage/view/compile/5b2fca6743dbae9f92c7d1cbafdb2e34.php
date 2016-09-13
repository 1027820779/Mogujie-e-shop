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
		<div  class="alert alert-success"><span>会员管理 > 会员管理</span></div>
		<table style="font-family: -webkit-pictograph;" class="table table-hover">
			<tr class="active">
			  <th>用户ID</th>
			  <th>头像</th>
			  <th>用户名</th>
			  <th>真是姓名</th>
              <th>邮箱</th>
              <th>手机号</th>
              <th>状态</th>
			  <th>操作</th>
			</tr>
			<?php foreach ($user as $v){?>
			<tr>
				<td><?php echo $v['uid']?></td>
                <td><?php if($v['awatar']==''){?>
                <img style="width: 40px;height: 40px;" src="./Public/Home/img/awatar1.jpg"><?php }else{?><img style="width: 40px;height: 40px;" src="<?php echo $v['awatar']?>">
               <?php }?></td>
				<td><?php echo $v['account']?></td>
                <td><?php echo $v['uname']?></td>
                <td><?php echo $v['email']?></td>
                <td><?php echo $v['phone']?></td>
                <td<?php if($v['lock']==0){?>
                style="font-size: 12px;color: #1ABC9C;"
               <?php }?><?php if($v['lock']==1){?>
                style="font-size: 12px;color: #FF9F95;"
               <?php }?>><?php if($v['lock']==0){?>
                正常
               <?php }?><?php if($v['lock']==1){?>
                锁定
               <?php }?></td>
				<td>
                    <?php if($v['lock']==0){?>
                
                    <a href="javascript:if(confirm('确认要锁定吗?')) location.href='<?php echo U('addLock',array('uid'=>$v['uid']))?>'" class="btn btn-sm btn-warning">锁定</a>
                    
               <?php }?>
                    <?php if($v['lock']==1){?>
                
                    <a href="javascript:if(confirm('确认要解除锁定吗?')) location.href='<?php echo U('removeLock',array('uid'=>$v['uid']))?>'" class="btn btn-sm btn-primary">解除</a>
                    
               <?php }?>
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
