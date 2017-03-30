
<?php 
	include ('db.inc');
	
	function get_msg($userNameSession,$chatfriendSession )
	{
$query ="SELECT Msg_ID,sender,receiver,message from chat where sender='$userNameSession' and receiver='$chatfriendSession' 
         union
	SELECT Msg_ID,sender,receiver,message from chat where sender='$chatfriendSession' and receiver='$userNameSession'
    order by Msg_ID";



	$run = mysql_query($query);
	
	$messages = array();

	while(($message = mysql_fetch_array($run))){
		$messages[] = array(
		'sender'=>$message['sender'],
		'receive' => $message['receiver'],
		'message' => $message['message']);
		}

	
	return $messages;
	} 
			
	function send_msg($sender,$receiver,$message){
	if(!empty($sender) && !empty($receiver) && !empty($message))
        {
		$Sender = mysql_real_escape_string($sender);
		$Receiver = mysql_real_escape_string($receiver);
		$Message = mysql_real_escape_string($message);
		
		$query = "INSERT INTO chat VALUES (null,'$Sender','$Receiver','$Message')";
		
		if($run = mysql_query($query) ){
			return true;
		}
		else
		{
		return false;
			}
		
		}
	else{
		return false;	
		}
			
	}


	
?>
			
		