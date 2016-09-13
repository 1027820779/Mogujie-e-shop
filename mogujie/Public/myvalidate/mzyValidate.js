function mzy_validate(_this,submitUrl,errorClass,style){
	//选中所有带有验证的元素，此元素里面包着要验证的表单
	var ruleObj = $(_this).find('*[rule]');
	//把所有的验证标记为0，通过以后标记为1
	ruleObj.attr('validate',0);
	//如果有错误属性
	if(isset(errorClass)){
		//消除所有的错误
		ruleObj.removeClass(errorClass);
	}
	//此处为了倒着循环，先提示下面的没有通过的表单
	for(var j = 0; j < ruleObj.length; j++){
		//每一个有规则的表单
		var eqRuleObj = ruleObj.eq(j);
		//取得当前规则数组，有可能是多个比如required|maxlen:20
		var ruleArr = eqRuleObj.attr('rule').split("|");
		//获得当前表单内容,去掉首尾空格
		var con = $.trim(eqRuleObj.val());
		//定义提示消息
		var msgArr = '';
		//如果有提示值才进行拆分
		if(eqRuleObj.attr('msg')){
			//获得当前提示信息数组
			msgArr = eqRuleObj.attr('msg').split("|");
		}
		//循环规则数组
		for(var i = 0; i < ruleArr.length; i++){
			//如果规则为必填，且内容为空
			if(ruleArr[i] == 'required' && empty(con)){
				//验证提示框
				mzy_message(eqRuleObj,msgArr[i],errorClass,style);
				return false;
			}else if(/maxlen:\d+/i.test(ruleArr[i])){//如果能匹配到，证明是最大为多少
				//获得最大的数字，比如说：20
				var len = ruleArr[i].split(':')[1];
				if(con.length > len){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(/minlen:\d+/i.test(ruleArr[i])){//最小为多少个字符
				//获得最小的数字，比如说：5
				var len = ruleArr[i].split(':')[1];
				if(con.length < len){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(ruleArr[i] == 'http'){//必须为网址
				if(!empty(con) && !/^(http[s]?:)?(\/{2})?(\w+\.)?\w+(\.(com|cn|cc|org|net|com.cn))/i.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && ruleArr[i] == 'email'){//必须为邮箱
				if(!/^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/i.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && ruleArr[i] == 'phone'){//验证手机
				if(!/^\d{11}$/.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && ruleArr[i] == 'tel'){//验证固话
				if(!/^(?:\(\d{3,4}\)|\d{3,4}-?)\d{8}$/.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && ruleArr[i] == 'tel,phone'){//固话或者手机
				if(!/^(?:\(\d{3,4}\)|\d{3,4}-?)\d{8}$/.test(con) && !/^\d{11}$/.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && /regexp/i.test(ruleArr[i])){//用户自己传递正则
				//获得用户传递的正则
				var reg = ruleArr[i].split(':')[1];
				//转换为可执行的表达式 并且 确定为正则对象才验证
				if(eval(reg) instanceof RegExp){
					var trueReg = eval(reg);
					//如果验证不通过
					if(!trueReg.test(con)){
						//验证提示框
						mzy_message(eqRuleObj,msgArr[i],errorClass,style);
						return false;
					}
					
				}
			}else if(!empty(con) && ruleArr[i]=='identity'){//如果是身份证
				if(!/^(\d{15}|\d{18})$/.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && ruleArr[i]=='china'){//如果是中文类型
				if(!/^([^u4e00-u9fa5]|\w)+$/i.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && ruleArr[i] == 'qq'){//如果是qq类型
				
				if(!/^\d{5,12}$/.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			
			}else if(!empty(con) && ruleArr[i] == 'date'){//如果是日期类型
				if(!/^\d{4}-[01]?\d-[0123]?\d|\d{4}[01]?\d[0123]?\d$/.test(con)){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && /num:\w+/i.test(ruleArr[i])){//数字范围

				//首先必须是数字
				if(!/^\d+$/.test(con)){

					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
				//获得num:5,6里面的 5,6
				var num = ruleArr[i].split(':')[1];
				//把5,6分开 num[0]是5 num[1]是6
				num = num.split(/\s*,\s*/);
				//转整比较
				con = parseInt(con);
				if(con<num[0] || con>num[1]){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
			}else if(!empty(con) && /confirm:\w+/i.test(ruleArr[i])){

				//获得确认的表单
				var inputName = ruleArr[i].split(':')[1];
				if($('[name='+inputName+']').val() != eqRuleObj.val()){
					//验证提示框
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}

			}else if(!empty(con) && /ajax:\w+/i.test(ruleArr[i])){//如果是异步类型
				//获得异步请求的地址
				var requestUrl = ruleArr[i].split(':')[1];
				
				var bool;
				//异步请求
				$.ajax({
					type:"post",
					url:requestUrl,
					//默认是异步请求，改成false就是同步请求
					//异步请求是同时进行，同步是执行完再执行下一段代码
					async:false,
					data:eqRuleObj.serialize(),
					success:function(data){
						bool = data;
					}
				});
				if(bool == '0'){
					mzy_message(eqRuleObj,msgArr[i],errorClass,style);
					return false;
				}
				
			}
		}
		//走到下面通过标记为1
		eqRuleObj.attr('validate',1);		
	}
	//如果还有没有通过的,返回false
	if($(_this).find('*[validate=0]').length > 0){
		//阻止默认提交行为
		return false;
	}
	//改变用户提交地址
	$('form').attr('action',submitUrl);
	return true;
	
}

function mzy_message(obj,message,errorClass,style){
	//如果有错误属性
	if(isset(errorClass)){
		//没有通过的表单，提示错误
		obj.addClass(errorClass);                                                        
	}
	//提示信息为此项必填，如果用户有设置就按用户设置否则默认为此项必填
	var msg = isset(message) ? message : '操作失败';
	//提示样式
	var style = isset(style) ? style : 1;
	//顶部弹出气泡样式
	if(style == 1){
		$('.mzy_message').remove();
		$('body').append('<div class="mzy_message">'+msg+'</div>');
		$('.mzy_message').animate({
			'top':'0px'
		},500,function(){
			//1秒之后消失
			setTimeout(function(){
				$('.mzy_message').animate({
					'top':'-50px'
				})
			},1000);
		});
	}else if(style == 2){//第二种样式
		//显示背景和错误信息
		var mzy_bg = '<div class="mzy_bg">\
			<div class="mzy_bg_content">\
				<span class="mzy_msg">'+msg+'</span> <span class="mzy_close">X</span>\
			</div>\
		</div>';
		//先移除旧的
		$('.mzy_bg').remove();
		//插入新的
		$('body').append(mzy_bg);
		//显示背景
		$('.mzy_bg').fadeIn(500);
		//设置内容盒子位置
		var l = ($(window).width() - $('.mzy_bg_content').width()) / 2;
		var t = ($(window).height() - $('.mzy_bg_content').height()) / 3;
		$('.mzy_bg_content').css({
			left:l,
			top:t
		})
		$('.mzy_close').click(function(){
			$('.mzy_bg').fadeOut();
		})
	}
}

/**
 * [isset 判断一个变量是否存在]
 * @param  {[type]} variable [需要检测的变量]
 * @return {[type]}          [description]
 */
function isset(variable){
    return typeof(variable)=='undefined' ? false : true;
}

/**
 * [empty 判断一个变量是否为空字符串]
 * @param  {[type]} variable [需要检测的变量]
 * @return {[type]}          [description]
 */
function empty(variable){
	return variable == "" ? true : false;
}





