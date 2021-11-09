<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Wolo留言板</title>
		<link rel="stylesheet" href="css/index.css">
		<script src="js/index.js"></script>
	</head>
	<body>
		
		<span id="wolotitle">Wolo 留言板</span>
		
		<div id="div1">
			
			<!-- 留言展示 -->
			<div id="message">
				<?php
					include("conn.php");
					$rs=mysql_query("select * from message where sh=1 order by addTime desc");
				    $page=@$_GET['page'];
					if(empty($page)){
						  $page=1;  
					}
					if($page<1){
						   $page=1;   
					}
					$rscount=mysql_num_rows($rs);
					$pagecount=ceil($rscount/4);
					if($page>=$pagecount){
						  $page=$pagecount;
					}
					mysql_data_seek($rs,(($page-1)*4));
					for($i=1;$i<=4;$i++){
						  if($info=mysql_fetch_assoc($rs)){
				?>
				<ul class="message">
					<li class="message_author"><img src="images/<?php echo $info["face"]; ?>" width="50"><span><?php echo $info["author"]; ?></span></li>
					<li class="message_content"><?php echo $info["content"]; ?></li>
					<li class="addTime"><?php echo $info["addTime"]; ?></li>
					<?php if(!empty($info['reply'])){ ?>
						<li class="reply">&nbsp;&nbsp;管理员回复：<?php echo $info['reply']; ?>&nbsp;&nbsp;</li>
					<?php } ?>
				</ul>
				<?php }}
					mysql_free_result($rs);
					mysql_close($conn);
				?>
				<div id="fy">
				   <a href="index.php?page=1"><div id="top"></div></a>
				   <a href="index.php?page=<?php echo $page-1; ?>">上一页</a> | 
				   <a href="index.php?page=<?php echo $page+1; ?>">下一页</a>
				   <a href="index.php?page=<?php echo $pagecount; ?>"><div id="bottom"></div></a>
				    | 共<span><?php echo $pagecount; ?></span>页
				</div>
			</div>
						
			<!-- 发布留言 -->
			<div id="fbly">
				<div id="fbly_1">
					<form name="message_board" action="php/check.php" method="post">
						作者：<input type="text" name="post_author" readonly="readonly" value="<?php 
									if(@$_SESSION['login']=='success'){
									echo @$_SESSION['usersName'];
									}else{echo "游客";}
								?>" id="post_author">
						<select name="face" id="face">
							<?php for($i=0;$i<=17;$i++){ ?>
								<option value="<?php echo $i.".jpg"; ?>"><?php echo $i.".jpg"; ?></option>
							<?php } ?>
						</select>
						<img src="images/0.jpg" id="img1" width="50">
						<br> <textarea name="content" cols="30" rows="10" id="post_content" maxlength="40"></textarea><br>
						      <input type="submit" name="submit" id="post_button" value="发布留言">
					</form>
				</div>
			</div>
			
			<!-- 切换按钮 -->
			<button type="button" id="switch1">发 布 留 言</button>
			<div id="pop1">
				<p>已超出</p>
				<span id="pop_tips"></span>
				<div id="pop2">
				</div>
			</div>
		</div>
		
		<!-- 身份 -->
		<div id="who">
			<h3>身份:&nbsp;&nbsp;
			<span 
				<?php 
					include("conn.php");
					if(@$_SESSION['login']=='success'){
						echo "style='display:none'";
					}
				?>>游客</span><?php echo "<span class='loginname'>".@$_SESSION['usersName']."</span>" ?></h3>
			<?php
			include("conn.php");
			if(@$_SESSION['login']=='success'){
				echo "<p color='#fff'>尊敬的".@$_SESSION['usersName']."会员"."</p>"."<p color='#fff'>欢迎您登录本页面。"."</p>";
			}
			?>
			<form action="php/user_login.php" method="post"
				<?php
					include("conn.php");
					if(@$_SESSION['login']=='success'){
						echo "style='display: none;'";
					}
				?>>
				账户：<input type="text" name="userName" class="textwho"><br>
				密码：<input type="password" name="password" class="textwho"><br>
				<img src="php/imgYzm.php" id="yzm_img">
				<input type="text" name="yzm_text" id="yzm_text" maxlength="4"><br><br>
				<div id="who_button">
					<input type="submit" value="登录" id="who_login">
					<input type="button" value="注册" id="who_register">
				</div>
			</form>
			<input type="button" value="注销" id="who_cancellation" 
				<?php
					include("conn.php");
					if(@$_SESSION['login']=='success'){
						echo "style='display: block;'";
					}
					mysql_close($conn);
				?>>
		</div>
	</body>
</html>