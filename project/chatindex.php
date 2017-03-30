
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
<title>Chat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<link type="text/css" rel="stylesheet" href="chat.css" />
  <script type="text/javascript" src="js/jquery-2.js" ></script>
  <script type="text/javascript" src="js/memberStatus.js" ></script>
</head>
<style>

  tr{
  border: 0px;}
  table tbody td{
  border-left : 0px;
  border-right : 0px;
  border:0px;}
  </style>
<body>
<?php include 'studenttitle.html' ?>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
    <ul>
      <li> <a href="student.php">Home</a>
        <ul>
          <li><a href="studentEditProfile.php">Edit Profile</a></li>
          <li class="last"><a href="addcourse.php">Add Course Info</a></li>
        </ul>
      </li>
      <li><a href="studentdashboard.php">Your Dashboard</a>
        <ul>
          <li><a href="#">Academic Info</a></li>
          <li class="last"><a href="#">Charts</a></li>
        </ul>
      </li>
      <li><a href="studentuniversityDashboard.php">University Dashboard</a>
        <ul>
          <li><a href="univrating.php">University Rating Info</a></li>
          <li class="last"><a href="univcharts.php">University Charts</a></li>
        </ul>
      </li>
      <li><a href="facultyratings.php">Faculty Ratings</a></li>
      <li class="active"><a href="chatindex.php">Chat</a></li>
    </ul>
       
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper col3" style="width:100%">
     

<!-- message -->
<div id="input">
<form action="#" method="post" id="input">
  <table style="border:0px">
  <tr><td><lable> Online Members : <select name="receiver" id="receiver"><option value="">Chat with</option></select><input type="submit" name="start" style="width:110px; height:20px" value="Start Chat" /><br/></td></tr>
  <tr><td></td></tr>
  <?php 
    if(true){
      ?>
  <tr><td> You are chatting with : <strong><?php echo $_SESSION['chatFriend']; ?></strong></td></tr>
<tr><td>
  <lable id="messagelable"> Enter Message: <br/> <input type = "text" name="message" style="width:420px; height:35px"/></td><td><br/>
  <input type="submit" name="send" style="width:110px; height:35px"value="send message" /></lable></td></tr></table>
<div id="messages">
    
<?php echo "<p style='color:{$color}'>".$error."</p>" ?>
</div>
<?php } ?>

      
      
</form>
</div>
<script type="text/javascript" src="js/jquery-2.js" ></script>
<script type="text/javascript" src="js/chat.js" ></script>
  
</div>
    
<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?></body>
</html>
<!-- message -->
</body>
</html>