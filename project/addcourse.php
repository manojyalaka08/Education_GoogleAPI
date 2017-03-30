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
$querymail = mysql_query("SELECT AVG(Grade) as GPA, count(CourseName) as numofcourses
from StudentDetails 
where UserName='$userNameSession'");

$datam = mysql_fetch_array($querymail);
$gpa = $datam['GPA'];
//echo $gpa;
$courses = $datam['numofcourses'];
$message1 ="<span> Now you are holding <strong> {$courses} </strong> courses and your GPA is <strong>{$gpa}</strong></span>";
//echo $message;
?>
<?php
if ($_POST['submit']) {
	include ('db.inc');
	$courseID = $_POST['courseID'];
	$instructorName = $_POST['instructorName'];
	$grade = $_POST['grade'];
	$semester = $_POST['semester'];
	$year = $_POST['year'];
	$rating = $_POST['rating'];
	$comments = $_POST['comments'];
/*	
	echo $courseID;
	echo $instructorName;
	echo $grade;
	echo $semester;
	echo $year;
	echo $rating;
	echo $comments;
	echo $userNameSession;
*/
$query = mysql_query("INSERT INTO `project`.`StudentDetails` (`UserName`, `CourseName`, `InstructorName`, `Grade`, `Semester`, `Year`, `InstructorRating`, `comments`) VALUES ('$userNameSession', '$courseID', '$instructorName', '$grade', '$semester', '$year', '$rating', '$comments')");
$queryemail = mysql_query("select * from users where UserName='$userNameSession'");
 $dataemail = mysql_fetch_array($queryemail);
$to = $dataemail['EmailID'];
$subject = "HTML email";
//$precontent=file_get_contents('mailCharts.php');
/*ob_start();
include 'mailCharts.php';
$output = ob_get_contents();
ob_end_clean();
*/
$message = "
<html>
 <head>
  <script type=\"text/javascript\"
        src=\"https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['gauge']}]}\">
  </script>
  <script type=\"text/javascript\">
  google.load('visualization', '1', {packages: ['gauge']});
  google.setOnLoadCallback(drawGauge);

  var gaugeOptions = {min: 0, max: 280, yellowFrom: 200, yellowTo: 250,
    redFrom: 250, redTo: 280, minorTicks: 5};
  var gauge;

  function drawGauge() {
    gaugeData = new google.visualization.DataTable();
    gaugeData.addColumn('number', 'GPA');
    gaugeData.addColumn('number', 'Courses');
    gaugeData.addRows(2);
  gaugeData.setCell(0, 0,{$gpa});
  gaugeData.setCell(0, 1,{$courses});

    gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
    gauge.draw(gaugeData, gaugeOptions);
  }
  </script>
 </head>
 <body>
 <div align=\"center\">
 <p>{$message1}</p>
 <div id=\"gauge_div\" style=\"width:280px; height: 140px;\"></div>
 </div>
 
 </body>
 </html>
";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <yalakam@sunyit.edu>' . "\r\n";
//$headers .= 'Cc: manojyalaka08@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
header("location: addcourse.php");

}
?>
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
<!-- ####################################################################################################### -->
<?php include 'studenttitle.html' ?>
<!-- ####################################################################################################### -->
<?php include 'studentmenu.html' ?>
<!-- ####################################################################################################### -->
<div class="wrapper col3" style="width:100%">
             <link rel="stylesheet" href="form_files/formoid1/formoid-solid-dark.css" type="text/css" />
<script type="text/javascript" src="form_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-dark" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
	<table style="border:0px"><tr style="border:0px"><td style="border:0px">
	<div class="element-input"><label class="title"><span class="required">* Course ID</span></label><div class="item-cont">
		<input class="large" type="text" name="courseID" required="required" placeholder="Course ID"/><span class="icon-place"></span></div></div>
	</td><td style="border:0px">
	<div class="element-select"><label class="title"><span class="required">* Instructor Name</span></label><div class="item-cont"><div class="large"><span>
	<select name="instructorName" required="required">    
		<option value="">Instructor Name</option>
		<option value="Novillo">Novillo</option>
		<option value="Cavallo">Cavallo</option>
		<option value="Sam">Sam</option>
		<option value="Reale">Reale</option>
		<option value="Tze Teck Sim">Tze Teck Sim</option>
		<option value="Rupa">Rupa</option>
		</select><i></i><span class="icon-place"></span></span></div></div></div>
	</td></tr><table>
	<table style="border:0px"><tr style="border:0px"><td style="border:0px">
	<div class="element-select"><label class="title"><span class="required">Grade</span></label><div class="item-cont"><div class="large"><span>
	<select name="grade" required="required">
		<option value="">Grade</option>
		<option value="4">4-A</option>
		<option value="3">3-B</option>
		<option value="2">2-C</option>
		<option value="1">1-D</option>
		<option value="0">0-F</option></select><i></i><span class="icon-place"></span></span></div></div></div>
		</td><td style="border:0px">
	<div class="element-select"><label class="title"><span class="required">Semester</span></label><div class="item-cont"><div class="large"><span>
	<select name="semester" required="required">
		<option value="">Semester</option>
		<option value="FALL">FALL</option>
		<option value="SPRING">SPRING</option></select><i></i><span class="icon-place"></span></span></div></div></div>
		</td>
		<td style="border:0px">
	<div class="element-select"><label class="title"><span class="required">Year</span></label><div class="item-cont"><div class="large"><span>
	<select name="year" required="required" >
		<option value="">Year</option>
		<option value="2014">2014</option>
		<option value="2015">2015</option>
		<option value="2016">2016</option></select><i></i><span class="icon-place"></span></span></div></div></div>
		</td></tr></table>
	<div class="element-select"><label class="title"><span class="required">Faculty Rating</span></label><div class="item-cont"><div class="large"><span>
	<select name="rating" required="required">
		<option value="">Rating</option>
		<option value="4">4-Excellent</option>
		<option value="3">3-Very Good</option>
		<option value="2">2-Good</option>
		<option value="1">1-Poor</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-textarea"><label class="title"><span class="required">* Course Comments</span></label><div class="item-cont">
		<textarea class="medium" name="comments" cols="20" rows="5" required="required" placeholder="Comments"></textarea><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" name="submit" value="Submit"/></div></form><script type="text/javascript" src="form_files/formoid1/formoid-solid-dark.js"></script>
</div>
<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?>
</body>
</html>