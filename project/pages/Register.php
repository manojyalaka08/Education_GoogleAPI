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
<title>Educational | Full Width</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="../layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../layout/scripts/jquery.slidepanel.setup.js"></script>
</head>
<body>
<?php include 'login.html' ?>
<!-- ####################################################################################################### -->
<?php include 'title.html' ?>
<!-- ####################################################################################################### -->
<?php include 'registrationMenu.html' ?>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="container">
  <link rel="stylesheet" href="form_files/formoid1/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="form_files/formoid1/jquery.min.js"></script>
<form enctype="multipart/form-data" action="Register.php" class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#545e56;max-width:480px;min-width:150px" method="post">
	<div class="element-select" title="Designation"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large">
	<span><select name="designation" required="required">
		<option value="">Designation</option>
		<option value="Student">Student</option>
		<option value="Instructor">Instructor</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-input" title="User Name"><label class="title"><span class="required">*</span></label><div class="item-cont">
		<input class="large" type="text" name="username" required="required" placeholder="User Name"/><span class="icon-place"></span></div></div>
	<div class="element-password" title="Password"><label class="title"><span class="required">*</span></label><div class="item-cont">
	<input class="large" type="password" name="password" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
	<div class="element-password" title="Password"><label class="title"><span class="required">*</span></label><div class="item-cont">
		<input class="large" type="password" name="confirmpassword" value="" required="required" placeholder="Confirm Password"/><span class="icon-place"></span></div></div>
	<div class="element-name"><label class="title"></label><span class="nameFirst"><input placeholder="First Name" type="text" size="8" name="fname" /><span class="icon-place"></span></span><span class="nameLast"><input placeholder="Last Name" type="text" size="14" name="lname" /><span class="icon-place"></span></span></div>
	<div class="element-checkbox" title="Gender"><label class="title">Gender</label><div class="column column1"><label><input type="radio" name="gender" value="Male"/ ><span>Male</span></label><label><input type="radio" name="gender" value="Female"/ ><span>Female</span></label></div><span class="clearfix"></span></div>
<div class="element-select" title="country"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large">
	<span><select name="country" required="required">
		<option value="">Country Citizenship</option>
		<option value="India">India</option>
		<option value="USA">USA</option></select><i></i><span class="icon-place"></span></span></div></div></div>
<div class="element-select" title="department"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large">
	<span><select name="department" required="required">
		<option value="">Department</option>
		<option value="CS">CS</option>
		<option value="CSIS">CSIS</option></select><i></i><span class="icon-place"></span></span></div></div></div>	
		<?php
include ('db.inc');
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$designation = $_POST['designation'];
$uname = $_POST['username'];
$pass = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$department = $_POST['department'];

if($uname !=''||$pass !=''){
	$u = mysql_query("select UserName from users where UserName='$uname'");
	$row = mysql_fetch_row($u);
	if($row > 0)
{
	echo "<p style=\"color:red\">user name is already taken</p>";
}
else{
//Insert Query of SQL
$query = mysql_query("insert into users(UserType,UserName, Password, UserFirstName, UserLastName,CountryCitizenship,Department) values ('$designation','$uname', '$pass','$fname','$lname','$country','$department')");
echo "<span><p style=\"color:red\">Data Inserted successfully...!!</p></span>";
}
}
else{
echo "<p  style=\"color:red\">Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}

?>
	
<div class="submit"><input type="submit" name="submit" value="Submit"/></div></form>
<script type="text/javascript" src="form_files/formoid1/formoid-solid-dark.js"></script>
  </div>
</div>

<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?></body>
</html>