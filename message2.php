<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		include_once("conn.php");
		$result = mysql_query("select * from message order by addTime desc");// 获取数据
		$num = mysql_num_rows($result);// 获取条数
		// 将条例按关联数组进行输出
		$json = '{"status":"10001","msg":"OK","data":[';
		if($num){
			while($arr = mysql_fetch_assoc($result)){
				$json.=json_encode($arr).',';
			}
			echo substr($json,0,strlen($json)-1).']}';
		}
		else{
			'{"status":"30001","msg":"没有数据！"}';
		}
		// 关闭结果集
		mysql_free_result($result);
		// 关闭数据库服务器
		mysql_close($conn);
	}else{
		echo '{"status":"20001","msg":"违规登录，无法获取数据"}';
	}
	?>