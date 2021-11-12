<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$userName=$_POST['userName'];
		$pwd=md5($_POST['pwd']);
		include("../conn.php");
		$rs=mysql_query("select * from admins where userName='$userName' and pwd='$pwd'");
		$num=mysql_num_rows($rs);
		if($num>0){
			$_SESSION['login']='success';
			$_SESSION['userName']=$userName;
			header("location:manage.html");
		}else{
			echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
		}
	}else{
		header("location:error.php");
	}
?>