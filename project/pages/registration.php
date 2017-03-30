<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Educational
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<?php
error_reporting(0);
if (isset($_POST['submit'])) {
	include ('db.inc');
	$usertType = $_POST['Designation'];
	$userName = $_POST['userName'];
	$password1 = $_POST['password1'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];
	$department = $_POST['department'];
	$email = $_POST['email'];

$query = mysql_query("insert into users(UserType,UserName,Password,UserFirstName,UserLastName,Gender,CountryCitizenship,Department,EmailID) values ('$usertType','$userName','$password1','$fname','$lname','$gender','$country','$department','$email')");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Educational | Style Demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="../layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>
<?php include '../login.php' ?>
<!-- ####################################################################################################### -->
<?php include 'title.html' ?>
<!-- ####################################################################################################### -->
<?php include 'registrationMenu.html' ?>
<!-- ####################################################################################################### -->
<div class="wrapper col3" style="width:100%">
     
      
        <link rel="stylesheet" href="form_files/formoid1/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="form_files/formoid1/jquery.min.js"></script>
<form action="registration.php" enctype="multipart/form-data" class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#545e56;max-width:480px;min-width:150px" method="post">
	<div class="element-select" title="Designation"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="Designation" required="required">

		<option value="">Designation</option>
		<option value="Student">Student</option>
		<option value="Instructor">Instructor</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-input" title="User Name"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="userName" required="required" placeholder="User Name"/><span class="icon-place"></span></div></div>
	<div class="element-password" title="Password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password1" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	<div class="element-password" title="Password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="password" name="password" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	<div class="element-name"><label class="title"></label><span class="nameFirst"><input placeholder="Name First" type="text" size="8" name="fname" /><span class="icon-place"></span></span><span class="nameLast"><input placeholder="Name Last" type="text" size="14" name="lname" /><span class="icon-place"></span></span></div>
	<div class="element-checkbox" title="Gender"><label class="title">Gender</label>		<div class="column column1"><label><input type="radio" name="gender" value="Male"/ ><span>Male</span></label><label><input type="radio" name="gender" value="Female"/ ><span>Female</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-input" title="User Name"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="text" name="email" required="required" placeholder="Email-ID"/><span class="icon-place"></span></div></div>
	<div class="element-select" title="Designation"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="country" required="required">
		<option value="">Country Citizenship</option>
		<option value="India">India</option>
		<option value="USA">USA</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-select" title="Designation"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="department" required="required">
		<option value="">Department</option>
		<option value="CS">CS</option>
		<option value="CIS">CIS</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="submit"><input type="submit" name="submit" value="Submit"/></div></form>
<script type="text/javascript" src="form_files/formoid1/formoid-solid-dark.js"></script>
</div>
    
<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?></body>
</html>