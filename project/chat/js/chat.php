<?php

include ('chatFunction.php');
include ('db.inc');

$messages = get_msg();
	
		foreach($messages as $message){
		if(strcmp($message['sender'],"sharath"))
		$position = "right";
		else
		$position = "left";
		echo "<strong><p style='text-align:{$position};'>".$message['sender']."Sent</strong><br/>".$message['message']."</p>";
				}
?>