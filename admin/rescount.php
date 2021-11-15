<?php
header("content-type:text/html;charset=utf-8");
if($_SERVER['REQUEST_METHOD']=="POST"){
   include("../conn.php");
   $rs=mysql_query('select * from message where sh=1');
   $rescount=mysql_num_rows($rs);
   // echo '{"status":"10001","rescount":'.$rescount.'}';
   echo $rescount;
}else{
	header("location:error.php");
}
?>