<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$yzm_text=$_POST['yzm_text'];
		if($_SESSION['yzmCode']==$yzm_text){
			$userName=$_POST['userName'];
			$password=md5($_POST['password']);
			include("../conn.php");
			$rs=mysql_query("select * from users where userName='$userName' and Pwd='$password'");
			$info=mysql_num_rows($rs);
			if($info>0){
				$_SESSION['usersName']=$userName;
				$_SESSION['login']='success';
				header("location:../index.php");
			}else{
				echo "<script>alert('账号或密码错误，请重新输入');location.href='../index.php';</script>";
			}
		}else{
			echo "<script>alert('验证码错误，请重新输入');location.href='../index.php';</script>";
		}
	}else{
		header("location:../admin/error.php");
	}
?>