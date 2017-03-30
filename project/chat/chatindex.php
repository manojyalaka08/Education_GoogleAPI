<?php 
session_start();

if($_SESSION['username']=='')
{
  echo "<script type='text/javascript'>alert('please login before proceeding forward');</script>";
  header("location: index.php");
}
else
{
	$userNameSession = $_SESSION['username'];
}


	include ('db.inc');

include ('chatFunction.php');
	if(($_POST['send']))
	{
	$_SESSION['chatFriend'] = $_POST['receiver'];
	$chatfriendSession = $_SESSION['chatFriend'];

	if(send_msg($userNameSession,$chatfriendSession,$_POST['message']))
	{
	$error =  "message sent.";
	$color = "green";
	
		}
	else
	{
	$error= "Message Failed to Sent.";
	$color ="red";
		}
	}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<!--page title -->
	<title>chat </title>
	<!-- css stylesheet -->
	<link type="text/css" rel="stylesheet" href="chat.css" />
	<script type="text/javascript" src="js/jquery-2.js" ></script>
	<script type="text/javascript" src="js/memberStatus.js" ></script>

	</head>
	<body>
<!-- message -->
<div id="input">
<form action="#" method="post" id="input">
	<table>
	<tr><td><lable> Online Members : <select name="receiver" id="receiver"><option value="">Chat with</option></select></lable><br/></td></tr>
	<tr><td></td></tr>
	<tr><td> You are chatting with : <strong><?php echo $chatfriendSession; ?></strong></td></tr>
<tr><td>
	<lable id="messagelable"> Enter Message: <br/> <input type = "text" name="message" style="width:420px; height:35px"/></td><td><br/>
	<input type="submit" name="send" style="width:110px; height:35px"value="send message" /></lable></td></tr></table>
<div id="messages">
<?php echo "<p style='color:{$color}'>".$error."</p>" ?>
</div>
</form>
</div>
<script type="text/javascript" src="js/jquery-2.js" ></script>
<script type="text/javascript" src="js/chat.js" ></script>
</body>
</html>