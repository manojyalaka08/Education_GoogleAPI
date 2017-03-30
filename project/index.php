
<?php 
session_start();
include ('db.inc');
$userlogout = $_SESSION['username'];
$querylogout = mysql_query("UPDATE users SET Status='No' where UserName='$userlogout'");
$_SESSION['username']='';
$error=''; // Variable To Store Error Message

if (isset($_POST['pupillogin']))
{
if (empty($_POST['pupilname']) || empty($_POST['pupilpass'])) {
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['pupilname'];
$password=$_POST['pupilpass'];
include ('db.inc');
$query = mysql_query("select * from users where UserType='Student' AND password='$password' AND username='$username'");
$rows = mysql_num_rows($query);
if ($rows == 1)
{
$_SESSION['login_user']=$username; // Initializing Session
header("location: student.php"); // Redirecting To Other Page
} 
else {
$error = "Username or Password is invalid";
}  
}
}
else      
{
if (isset($_POST['teacherlogin'])) {
if (empty($_POST['teachername']) || empty($_POST['teacherpass'])) {
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['teachername'];
$password=$_POST['teacherpass'];
include ('db.inc');
$query = mysql_query("select * from users where UserType='Instructor' AND password='$password' AND username='$username'");
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: index.php"); // Redirecting To Other Page
} 
else {
$error = "Username or Password is invalid";
}
}
} 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Educational
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Educational</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.ui.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.tabs.setup.js"></script>
</head>
<body>
<?php include 'login.php' ?>
<!-- ####################################################################################################### -->
<?php include 'title.html' ?>
<!-- ####################################################################################################### -->
<?php include 'menu.html' ?>
<!-- ####################################################################################################### -->
<?php include 'slider.html' ?>
<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?>
</body>
</html>