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
	    <!-- flash uploader -->
	    <script type="text/javascript" src="Public/uploadify/jquery-1.8.2.min.js"></script>
	    <script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="Public/uploadify/uploadify.css">
		<!--载入验证文件-->
		<link rel="stylesheet" type="text/css" href="Public/myvalidate/mzyValidate.css" />
		<script src="Public/myvalidate/mzyValidate.js" type="text/javascript" charset="utf-8"></script>

	    <!-- 载入百度编辑器 -->
    	<script type="text/javascript" charset="utf-8" src="Public/ueditor1_4_3/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="Public/ueditor1_4_3/ueditor.all.min.js"> </script>
		<script type="text/javascript" charset="utf-8" src="Public/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
			<script type="text/javascript">
		$(function(){
			$('[name=category_cid]').change(function(){
				var tid = $('option:selected').attr('tid');
				$.ajax({
					type:"post",
					url:"{{U('getTypeAttr')}}",
					data:{id : tid},
					dataType:'json',
					success:function(phpData){
						//规格(可选)
						var spec = '';
						//属性（不可选）
						var attr = '';
						$.each(phpData, function(k,v) {    
							//规格
							if(v.attr_cate == 1){
								spec += '<tr>' +
								'<td width="200">'+v.atname+'</td>' +
								'<td>' +
									'<select name="spec['+v.atid+'][value][]" class="form-control"><option value="">-请选择-</option>';
										$.each(v.tavalue, function(kk,vv) {    
											 spec += '<option value="'+vv+'">'+vv+'</option>';                                                      
										});
									spec += '</select></td><td width="280"><input type="text" name="spec['+v.atid+'][price][]" id="" placeholder="附加价格" class="form-control"/></td>' +
										'<td style="text-align: center;"><a href="javascript:;" class="btn btn-sm btn-info add-spec">+添加规格</a></td></tr>';
							
							}else{//属性
								attr += '<tr>' + 
											'<td width="200">'+v.atname+'</td>' + 
											'<td>' + 
											'<select name="attr['+v.atid+'][]" id="" class="form-control"><option value="">请选择</option>';
												
												$.each(v.tavalue, function(kk,vv) {    
													 attr += '<option value="'+vv+'">'+vv+'</option>';                                                      
												});
												
								attr += '</select></td></tr>';
							}                                                          
						});
						//插入属性
						$('#attr').html(attr);
						$('#spec').html(spec);
					}
				});
			})
	
	
			// 点击添加规格
			$('.add-spec').live('click',function(){
				//找到父级的tr
				var parentsTr = $(this).parents('tr');
				//把父级的tr克隆复制
				var cloneTr = parentsTr.clone();
				cloneTr.find('.add-spec').removeClass('add-spec btn-info').addClass('remove-spec btn-danger').html('-删除规格');
				//插入下一行
				parentsTr.after(cloneTr);
			})
			//删除规格
			$('.remove-spec').live('click',function(){
				$(this).parents('tr').remove();
			})
		})
	</script>
	</head>
	<body>
		<form method="post" action="" onsubmit="return mzy_validate(this,'','',2)">
		<div  class="alert alert-success"><span>商品管理 > 添加商品</span></div>
		<table class="table table-hover">
			<tr class="active">
				<th colspan="100" style="text-align: center;">基本信息</th>
			</tr>
			<tr>
			  <td width="200">所属分类</td>
				<td>
					<select name="category_cid" class="form-control" rule="required" msg="所属分类必须要选择">
						<option value="">-请选择-</option>
						{{foreach from="$cateData" value="$v"}}
							<option value="{{$v['cid']}}" tid="{{$v['type_tid']}}">{{$v['_name']}}</option>
						{{endforeach}}
					</select>
				</td>			  
			</tr>
			<tr>
			  <td>所属品牌</td>
				<td>
					<select name="brand_bid" class="form-control" rule="required" msg="所属品牌必须要选择">
						<option value="">-请选择-</option>
						{{foreach from="$brandData" value="$v"}}
							<option value="{{$v['bid']}}">{{$v['bname']}}</option>
						{{endforeach}}
					</select>
				</td>
			</tr>
			<tr>
			  <td>商品名称</td>
			  <td>
					<input type="text" name="gname" id="" value="" class="form-control" rule="required" msg="商品名称必须要填"/>			  	
			  </td>
			</tr>
			<tr>
			  <td>货号</td>
			  <td>
					<input type="text" name="gnumber" id="" value="" class="form-control" rule="required" msg="货号必须要选"/>			  	
			  </td>
			</tr>			
			<tr>
			  <td>单位</td>
			  <td>
					<input type="text" name="unit" id="" value="件" class="form-control"/>			  	
			  </td>
			</tr>
			<tr>
			  <td>市场价</td>
			  <td>
					<input type="text" name="mark_price" id="" value="" class="form-control" rule="required" msg="市场价必须要填" />			  	
			  </td>
			</tr>
			<tr>
			  <td>商城价</td>
			  <td>
					<input type="text" name="goods_price" id="" value="" class="form-control" rule="required" msg="商城价必须要填"/>			  	
			  </td>
			</tr>
			<tr>
			  <td>总库存</td>
			  <td>
					<input type="text" name="stock_num" id="" value="" class="form-control" rule="required" msg="库存数必须要填"/>			  	
			  </td>
			</tr>			
			<tr>
			  <td>点击次数</td>
			  <td>
					<input type="text" name="click" id="" value="1000" class="form-control"/>			  	
			  </td>
			</tr>	
		</table>
		<table class="table table-hover">
			<tr  class="active">
				<th colspan="100" style="text-align: center;">商品属性</th>
			</tr>																					
<!-- 			<tr>
			  <td width="200">袖长</td>
				<td>
					<select name="pid" class="form-control">
						<option value="0">-请选择-</option>
					</select>
				</td>	
			</tr> -->
		</table>
		<table class="table table-hover" id="attr">

		</table>
		<table class="table table-hover">
			<tr  class="active">
				<th colspan="100" style="text-align: center;">商品规格</th>
			</tr>																					
<!-- 			<tr>
				<td  width="200">颜色</td>
				<td>
					<select name="pid" class="form-control">
						<option value="0">-请选择-</option>
					</select>
				</td>
				<td width="280">
					<input type="text" name="click" id="" value="" placeholder='附加价格' class="form-control"/>	
				</td>
				<td style="text-align: center;">
					<a href="javascript:;" class="btn btn-sm btn-info">+添加规格</a>
				</td>
			</tr>
			<tr>
				<td  width="200">颜色</td>
				<td>
					<select name="pid" class="form-control">
						<option value="0">-请选择-</option>
					</select>
				</td>
				<td width="280">
					<input type="text" name="click" id="" value="" placeholder='附加价格' class="form-control"/>	
				</td>						
				<td style="text-align: center;">
					<a href="javascript:;" class="btn btn-sm btn-danger">-删除规格</a>
				</td>		
			</tr> -->
		</table>
		<table class="table table-hover" id="spec">

		</table>

		<table class="table table-hover">
			<tr  class="active">
				<th colspan="100" style="text-align: center;">列表图</th>
			</tr>																					
		</table>
		<!-- html页面 -->
		<div lab="uploadFilee" class="uploadFilee">
		    <input id="f" type="file" multiple="true">
		    <script type="text/javascript">
		        $(function() {
		            $('#f').uploadify({
		                'formData'     : {//POST数据
		                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
		                },
		                'fileTypeDesc' : '上传文件',//上传描述
		                'fileTypeExts' : '*.jpg;*.png',
		                'swf'      : '{{__PUBLIC__}}/uploadify/uploadify.swf',
		                'uploader' : '{{U('upload')}}',
		                'buttonText':'选择文件',
		                'fileSizeLimit' : '2000KB',
		                'uploadLimit' : 1,//上传文件数
		                'width':114,
		                'height':40,
		                'successTimeout':10,//等待服务器响应时间
		                'removeTimeout' : 0.2,//成功显示时间
		                'onUploadSuccess' : function(file, data, response) {
		                    //转为json
		                    data=$.parseJSON(data);
		                    //获得图片地址
		                    var imageUrl = data.url;
		                    var li="<li><img src='"+imageUrl+"'/><input type='hidden' name='list_pic' value='"+data.path+"'/></li>";
		                    $("#uploadList ul").prepend(li);
		                }
		            });
		        });
		    </script>
		    <div id="uploadList">
		        <ul>

		        </ul>
		    </div>
		</div>		

		<table class="table table-hover">
			<tr  class="active">
				<th colspan="100" style="text-align: center;">商品图册</th>
			</tr>																					
		</table>
		<!-- html页面 -->
		<div lab="uploadFilee" class="uploadFilee">
		    <input id="ff" type="file" multiple="true">
		    <script type="text/javascript">
		        $(function() {
		            $('#ff').uploadify({
		                'formData'     : {//POST数据
		                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
		                },
		                'fileTypeDesc' : '上传文件',//上传描述
		                'fileTypeExts' : '*.jpg;*.png',
		                'swf'      : '{{__PUBLIC__}}/uploadify/uploadify.swf',
		                'uploader' : '{{U('upload')}}',
		                'buttonText':'选择文件',
		                'fileSizeLimit' : '2000KB',
		                'uploadLimit' : 10,//上传文件数
		                'width':114,
		                'height':40,
		                'successTimeout':10,//等待服务器响应时间
		                'removeTimeout' : 0.2,//成功显示时间
		                'onUploadSuccess' : function(file, data, response) {
		                    //转为json
		                    data=$.parseJSON(data);
		                    //获得图片地址
		                    var imageUrl = data.url;
		                    var li="<li><img src='"+imageUrl+"'/><input type='hidden' name='pics[]' value='"+data.path+"'/></li>";
		                    $("#uploadLists ul").prepend(li);
		                }
		            });
		        });
		    </script>
		    <div id="uploadLists">
		        <ul>

		        </ul>
		    </div>
		</div>	

		<table class="table table-hover">
			<tr  class="active">
				<th colspan="100" style="text-align: center;">商品详细</th>
			</tr>																					
			<tr>
				<!-- 调用百度编辑器 -->
				<script id="editor" type="text/plain" style="width:100%;height:auto;" name="goods_content" rule="required" msg="商品详细必须要填"></script>
				<script>
					var ue=UE.getEditor('editor');
				</script>
			</tr>
		</table>
		<table class="table table-hover">
			<tr  class="active">
				<th colspan="100" style="text-align: center;">销后服务</th>
			</tr>																					
			<tr>
				<!-- 调用百度编辑器 -->
				<script id="editor2" type="text/plain" style="width:100%;height:auto;" name="goods_service"></script>
				<script>
					var ue=UE.getEditor('editor2');
				</script>
			</tr>
		</table>		



		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>

	</body>
</html>
