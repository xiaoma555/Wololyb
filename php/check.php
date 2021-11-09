<?php
include("../conn.php");
$author=$_POST['post_author'];
//$title=$_POST['title'];
$face=$_POST['face'];
$content=$_POST['content'];
$flag=mysql_query("insert into message
(author,face,content,addTime)values
('$author','$face','$content',now())");
if($flag){
	echo '<script>alert("恭喜你，发布留言成功！");location.href="../index.php";</script>';
	}else{
		echo '<script>alert("发布留言失败，请联系管理员！");location.href="../index.php";</script>';
		}
mysql_free_result($flag);
mysql_close($conn);
?>