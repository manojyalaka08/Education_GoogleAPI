<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Educational
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
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

?>
<?php
	include ('db.inc');
$query = mysql_query("select * from users where UserName='$userNameSession'");
 $data = mysql_fetch_array($query);

?>
<?php 
include ('db.inc');
if ($_POST['submit']) {
	
	$expassword = $_POST['epassword'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	if($expassword!="")
		
{
$query1 = mysql_query("select * from users where UserName='$userNameSession'");
 $data1 = mysql_fetch_array($query1);
}
 if($data1['Password']!=$expassword)
{
	$error = "Your existing password does not match with our records";
}
else if ($password1!=$password2)
{
	$error = "enter same password in both fields";
}

else if($password1!="" && $password2!="" && $password1==$password2 && $data1['Password']==$expassword)
{
	
$updateQuery = mysql_query("UPDATE users SET UserFirstName='$fname', UserLastName='$lname', Password='$password2', EmailID='$email' WHERE UserName='$userNameSession'");	
	//sening mail regarding the password updation
$to = $data1['EmailID'];
$subject = "HTML email";

$message = "
<html>
<head>
<title></title>
</head>
<body>

<p><pre>
Hello {$userNameSession},

We appreciate Your interest in us, this mail is to inform you that there is a recent updation in your personal details in our records.
If this is not by you, Kindly let us know to avoid unauthorized access to your account as soon as possible.

if you want to login https://cs99.bradley.edu/~hkarnati/Sharath/index.php#slidepanel .

Regards,
Educational Team.
</pre></p>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <srsharathreddy92@gmail.com>' . "\r\n";
//$headers .= 'Cc: karn.hari@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
header("location: studentEditProfile.php");
$sucess = "Your updation got affected in our Records";

}
}



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Student</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>

<!-- ####################################################################################################### -->
<?php include 'studenttitle.html' ?>
<!-- ####################################################################################################### -->
<?php include 'studentmenu.html' ?>
<!-- ####################################################################################################### -->
<div class="wrapper col3" style="width:100%">
     <link rel="stylesheet" href="form_files/formoid1/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="form_files/formoid1/jquery.min.js"></script>
<form action="studentEditProfile.php" enctype="multipart/form-data" class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#545e56;max-width:480px;min-width:150px" method="post">
	<table style="border:0px">
	<tr style="border:0px"><td style="border:0px">
	<p style="color:green"><?php echo $sucess ?> </p>
	<div class="element-password" title="Password"><label class="title"><span class="required">*Existing Password</span></label><div class="item-cont"><input class="large" type="password" name="epassword"  required="required" placeholder="Existing Password"/><span class="icon-place"></span></div></div>
	<p style="color:Red"> <?php echo $error; ?></p>
	</td>
	</tr>
	</table>
	<table style="border:0px">
	<tr style="border:0px"><td style="border:0px">
	<div class="element-password" title="Password"><label class="title"><span class="required">* New Password</span></label><div class="item-cont"><input class="large" type="password" name="password1" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	</td>
	<td style="border:0px">
	<div class="element-password" title="Password"><label class="title"><span class="required">* Confirm Password</span></label><div class="item-cont"><input class="large" type="password" name="password2" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	</td>
	</tr>
	</table>
	<div class="element-name"><label class="title"></label><span class="nameFirst"><input placeholder="Name First" type="text" size="8" name="fname" readonly value="<?php echo $data['UserFirstName']; ?>" /><span class="icon-place"></span></span><span class="nameLast"><input placeholder="Name Last" type="text" size="14" name="lname" readonly value="<?php echo $data['UserLastName']; ?>"/><span class="icon-place"></span></span></div>
	
	<table style="border:0px">
	<tr style="border:0px"><td style="border:0px">
	<div class="element-input" title="User Name"><label class="title"><span class="required">* E-Mail</span></label><div class="item-cont"><input class="large" type="text" name="email" readonly required="required" placeholder="Email-ID" value="<?php echo $data['EmailID']; ?>"/><span class="icon-place"></span></div></div>
	</td>
	<td style="border:0px">
	
	</td></tr>
	</table>
	
	
	
	
	<div class="submit"><input type="submit" name="submit" value="Update"/></div></form>

	<script type="text/javascript" src="form_files/formoid1/formoid-solid-dark.js"></script>

</div>

<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?>
</body>
</html>