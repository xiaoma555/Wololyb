<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
	$usersId=$_POST['usersId'];
	$usersName=$_POST['usersName'];
	$password=md5($_POST['password']);
	if($_SESSION['zhuce']='success'){
		if(!empty($usersName) and !empty($password) and !empty($usersId)){
			include("../conn.php");
			$rs = mysql_query("select * from users where userName = '$usersName'");
			$num = mysql_num_rows($rs);
			if($num > 0){
				echo "<script>alert('用户名已经存在');history.go(-1)</script>";
			}else{
				mysql_query("insert into users values('','$usersName','$password')");
				echo "<script>alert('注册成功 即将跳转到首页');location.href = '../index.php'</script>";
			}
	// if($rs){
	// 	echo '<script>alert("注册成功！");location.href="index.php";</script>';
	// 	}else{
	// 		echo '<script>alert("注册失败，请联系管理员！");location.href="index.php";</script>';
	// 		}
		}else{
				echo '<script>alert("注册失败，参数不正确或者参数为空！");history.go(-1);</script>';
		}
	}else{
		echo '<script>location.href="error.php";</script>';
	}
	mysql_close($conn);
}else{
		header("location:error.php");
		}
?>
