<?php
session_start();
if($_SESSION['admin_login']=='success') {
	$messageId=$_POST['messageId'];
	$reply=$_POST['reply'];
	if(!empty($messageId) and !empty($reply)){
		include("../conn.php");
		$flag=mysql_query("update message set reply='$reply' where messageId='$messageId'");
		if($flag){
			echo '<script>alert("回复留言成功！");location.href="manage.html";</script>';
			}
			mysql_free_result($flag);
			mysql_close($conn);
	}else{
		echo '<script>alert("回复不能为空！");history.go(-1);</script>';
	}
}else{
		header("location:error.php");
		}
?>