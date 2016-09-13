<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Loading Bootstrap -->
    <link href="Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
  
</head>
<body>
		<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">旧密码</label>
    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="旧密码" required="" name="oldPwd">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">新密码</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="" name="newPwd1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">确认新密码</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="" name="newPwd2">
  </div>
  <button type="submit" class="btn btn-block btn-lg btn-primary">确定</button>
</form>
</body>
</html>