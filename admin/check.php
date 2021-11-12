<?php
header("Content-type:text/html;charset=utf-8");
//设置系统时间--北京时间
date_default_timezone_set("PRC");
//引入JWT库
require 'JWT.php';
//使用\Firebase\JWT\JWT命名空间
use \Firebase\JWT\JWT;
//定义加密密钥
define('KEY','1gHuiop975cdashyex9Ud23ldsvm2Xq');
//定义result 初始值
$res['result'] = 'failed';
$action=@$_GET['action'];
//判断是否是登陆操作
if($action=='login'){
	//通过POST方法提交请求
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$adminName=$_POST['adminName'];
		$adminPwd=md5($_POST['adminPwd']);
		include("../conn.php");
		$rs=mysql_query("select * from admins where adminName='$adminName' and adminPwd='$adminPwd'");
		$num=mysql_num_rows($rs);
		if($num>0){
			//用户名和密码正确
			//获取当前时间戳
			$nowtime=time();
			//创建token
			$token=[
				"iss"=>'http://localhost',
				"aud"=>'http://localhost',
				"iat"=>$nowtime,
				"nbf"=>$nowtime+10,
				"exp"=>$nowtime+600,
				"data"=>[
					"adminId"=>1,
					"adminName"=>$adminName
				]
			];
			//创建jwt
			//可以用postman模拟请求查看jwt值
			$jwt=JWT::encode($token,KEY);
			//echo "jwt:".$jwt;
						//jwt:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJpYXQiOjE1NzI0MzE4ODMsIm5iZiI6MTU3MjQzMTg5MywiZXhwIjoxNTcyNDMyNDgzLCJkYXRhIjp7InVzZXJJZCI6MSwidXNlck5hbWUiOiJ0b20ifX0.om_UbgFTvHIyHqay3xfZpannrQ8jubomNuRWIXF-aFU
	     $res['result']="success";
		 $res['jwt']=$jwt;
		 // {"result"=>"success","jwt"=>"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJpYXQiOjE1NzI0MzE4ODMsIm5iZiI6MTU3MjQzMTg5MywiZXhwIjoxNTcyNDMyNDgzLCJkYXRhIjp7InVzZXJJZCI6MSwidXNlck5hbWUiOiJ0b20ifX0.om_UbgFTvHIyHqay3xfZpannrQ8jubomNuRWIXF-aFU"}
		 $res['info']=$token;
		}
		else{
			//用户名或密码不正确s
		 $res['message']="用户名或密码不正确";
		}
	}
	//向客户端输出jwt
	echo json_encode($res);
	// POST:用户名密码正确 jwt
			   // '{"result":"success","jwt":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3QiLCJpYXQiOjE1NzI0MzE4ODMsIm5iZiI6MTU3MjQzMTg5MywiZXhwIjoxNTcyNDMyNDgzLCJkYXRhIjp7InVzZXJJZCI6MSwidXNlck5hbWUiOiJ0b20ifX0.om_UbgFTvHIyHqay3xfZpannrQ8jubomNuRWIXF-aFU"}'
			   //POST:用户名或密码错误
			   // '{"result":"failed","msg":"用户名或密码错误"}'
		      //GET:action=login
		      // '{"result":"failed"}'
			  
}
else{
	//非登录操作
	$jwt=@$_SERVER['HTTP_X_TOKEN'];
		if(empty($jwt)){
			$res['message']="非法登录";
			echo json_encode($res);
			exit;
		}
	//验证请求头 ，token不为空 解码后返回json给ajax
	try{
		JWT::$leeway = 60;
	 $decoded = JWT::decode($jwt, KEY, ['HS256']);
		$arr=(array)$decoded;
		if($arr['exp']<time()){
			$res['message']='请重新登录';
		}
		else{
			$res['result']='success';
			$res['info']=$arr;
		}
	}
	catch(Exception $e){//解码失败
			$res['msg']="Token验证失败，请重新登录";
		}
	echo json_encode($res);
}
?>