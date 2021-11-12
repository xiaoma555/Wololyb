<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员回复</title>
<link rel="stylesheet" href="../css/reply.css">
<script src="../js/admin.js"></script>
</head>

<body>
<?php if($_SESSION['admin_login']=='success'){
  $messageId=$_GET['messageId'];
  if(!empty($messageId)){?>
  <div class="container">
	 <form action="reply_chuli.php" method="post">
    <div class="input">
     <textarea cols="40" rows="10" name="reply" maxlength="15" id="reply" style="resize: none;"></textarea><br>
     <input type="hidden" name="messageId" value="<?php echo $messageId;?>">
     <input type="submit" name="submit" id="submit" value="回复留言" class="reply">
	 </div>
	 </div>
     </form>
<?php } ?>

<?php }else{
	echo '<script>location.href="error.php";</script>';
	} ?>
</body>
</html>