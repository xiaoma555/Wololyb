<?php
// if($_SERVER['REQUEST_METHOD']=="POST"){
		$messageId=@$_POST['messageId'];
		include("../conn.php");
		$rs=mysql_query("delete  from message where messageId='$messageId'");
		if($rs){
			echo '{"status":"10001","msg":"success"}';
		}else{
			echo '{"status":"20001","msg":"留言无法删除,请联系管理员"}';
		}
	
// }else{
// 	header("location:error.php");
// }


?>