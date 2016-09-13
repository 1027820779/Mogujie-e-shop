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
		<div class="alert alert-success" style="text-align:center;"><a style="float:left;" href="{{U('index')}}" class="btn btn-sm btn-primary">&lt;-返回</a>货品列表</div>
		<table style="font-size: 14px;" class="table table-hover">
			<tr class="active">
			  <th>货品ID</th>
			  {{foreach from="$data" value="$v"}}
			  <th>{{$v['atname']}}</th>
			  {{endforeach}}
			  <th>库存</th>
  			  <th>货号</th>
			  <th>操作</th>
			</tr>
			{{foreach from="$lists_d" value="$v"}}
			<tr>
				<td>{{$v['lid']}}</td>
				{{foreach from="$v['ids']" value="$va"}}
				<td>{{$va}}</td>
				{{endforeach}}
				<td>{{$v['stocks']}}</td>
				<td>{{$v['goods_number']}}</td>						
				<td>
					<a href="{{U('edit_lists',array('lid'=>$v['lid'],'tid'=>$tid,'gid'=>$gid))}}" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确认删除吗?')) location.href='{{U('deleteList',array('lid'=>$v['lid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
			<tr>
				<td>添加货品</td>
			  	{{foreach from="$data" value="$v"}}
				<td>
					<select name="ids[]" class="form-control">
						<option value="">-请选择-</option>
						{{foreach from="$v['select']" value="$value"}}
						<option value="{{$value['gtid']}}">{{$value['g_type_value']}}</option>
						{{endforeach}}	
					</select>
				</td>
				{{endforeach}}
				<td>
					<input type="text" name="goods_number" id="" value="" class="form-control"/>
				</td>
				<td>
					<input type="text" name="stocks" id="" value="" class="form-control"/>
				</td>
				<td></td>		
			</tr>
		</table>
		<input type="hidden" name="goods_gid" value="{{$gid}}">
		<input type="submit" href="" class="btn btn-sm btn-info" value="保存添加">
		</form>
	</body>
</html>
