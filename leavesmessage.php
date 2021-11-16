<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$author=$_POST['author'];
	$content=$_POST['content'];
	$face=$_POST['face'];
	$title=$_POST['title'];
	include("conn.php");
	$flag=mysql_query("insert into message(author,content,title,face,addTime) values('$author','$content','$title','$face',now())");
	if($flag>0){
		echo '{"status":"10001","message":"恭喜你发表留言成功"}';
	}
	else{
		echo '{"status":"20001","message":"添加失败，请联系管理员"}';
	}
}
else{
	header("location:../error.php");
}
?>