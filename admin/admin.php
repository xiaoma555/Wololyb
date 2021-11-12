<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>欢迎管理员登录</title>
	<link rel="stylesheet" href="../css/adminindex.css">
</head>

<body>
	<form action="admincheck.php" method="post">
		<div class="container">
			<h2>欢迎管理登录</h2>
			<div class="center">
				<input type="text" name="userName" autocomplete="off" placeholder="用户名"><br>
				<input type="password" name="pwd" placeholder="密码"><br>
				<input type="text" id="yzm_text" maxlength="4" placeholder="验证码" autocomplete="off">
				<input type="submit" name="submit" value="登录" class="btn">
			</div>
			<img src="../php/imgYzm.php" id="yzm_img">
		</div>
	</form>
</body>

</html>