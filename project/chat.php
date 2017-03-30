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
	$chatfriendSession = $_SESSION['chatFriend'];
}

?>


<?php

include ('chatFunction.php');
include ('db.inc');

$messages = get_msg($userNameSession,$chatfriendSession);
	
		foreach($messages as $message){
		if(strcmp($message['sender'],$userNameSession))
		$position = "right";
		else
		$position = "left";
		echo "<strong><p style='text-align:{$position};'>".$message['sender']."</strong><br/>".$message['message']."</p>";
				}
?>