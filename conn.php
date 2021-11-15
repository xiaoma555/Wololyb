<?php
$conn=@mysql_connect("localhost","root","") or die("db connect error");
$flag=mysql_select_db("wolo",$conn);
mysql_query("set names utf8");
?>