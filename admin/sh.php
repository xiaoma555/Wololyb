<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
		$messageId=@$_POST['messageId'];
		include("../conn.php");
		$rs=mysql_query("update message set sh=1 where messageId='$messageId'");
		if($rs){
			echo '{"status":"10001","msg":"success"}';
		}else{
			echo '{"status":"20001","msg":"审核状态无法修改,请联系管理员"}';
		}
	}
	
else{
	header("location:error.php");
}

?>