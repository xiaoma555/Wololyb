<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$messageId=$_POST['messageId'];
	$reply=$_POST['reply'];
	include("../conn.php");
	$flag=mysql_query("update message set reply='$reply' where messageId='$messageId'");
				  if($flag){
				    echo '{"status":"10001","message":"success"}';	
				   }else{
				     echo '{"status":"20001","message":"回复失败,请联系管理员"}';
				   }
}
else{
	header("location:error.php");
}
?>