<?php
date_default_timezone_set('PRC');
require 'JWT.php';
use \Firebase\JWT\JWT;
define("KEY",'1gHuiop975cdashyex9Ud23ldsvm2Xq');
$action=@$_GET['action'];
$res['result']="failed";
if($action=="login"){
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$adminName=$_POST['adminName'];
		$adminPwd=md5($_POST['adminPwd']);
		include("../conn.php");
		$rs=mysql_query("select * from admins where adminName='$adminName' and adminPwd='$adminPwd'");
		$num=mysql_fetch_array($rs);
		if($num){
			$nowtime=time();
			$token=[
				'iss' => 'http://localhost', //签发者
				'aud' => 'http://localhost', //jwt所面向的用户
				'iat' => $nowtime, //签发时间
				'nbf' => $nowtime + 10, //在什么时间之后该jwt才可用
				'exp' => $nowtime + 3600, //过期时间-10min
				'data' => [
				    'adminId' => 1,
				    'adminName' => $adminName
				]
				
			];
			$jwt=JWT::encode($token,KEY);
			$res['jwt']=$jwt;
			$res['result']="success";
                                                $res['info']=$token;
		}else{
			$res['msg']="用户名或者密码错误";
		}
		
	}
	echo json_encode($res);
}else{
	$jwt=@$_SERVER['HTTP_TOKEN'];
	if(empty($jwt)){
		$res['msg']="非法登录";
		echo json_encode($res);
		exit;
	}
	try{
		JWT::$leeway=60;
		$decoded=JWT::decode($jwt,KEY,['HS256']);
		$arr=(array)$decoded;
		if($arr['exp']<time()){
			$res['msg']="请重新登录";
		}else{
			$res['result']="success";
			$res['info']=$arr;
		}
	}catch(Exception $e){
		$res['msg']="Token验证错误,请联系管理员";
	}
	echo json_encode($res);
}

?>