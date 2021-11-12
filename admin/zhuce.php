<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>欢迎用户注册</title>
	<link rel="stylesheet" href="../css/adminindex.css">
</head>

<body>
	<?php
	  $_SESSION['zhuce']='success';
	  ?>
	<form action="usercheck.php" method="post">
		<div class="container">
			<h2>欢迎用户注册</h2>
			<div class="center">
				<input type="text" name="usersName" autocomplete="off" placeholder="用户名"><br>
				<input type="password" name="password" placeholder="密码"><br>
				 <input type="hidden" name="usersId" value="<?php echo $usersId;?>">
				<input type="submit" name="submit" value="完成" class="btn" >
			</div>
		</div>
	</form>
</body>

</html>