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

$data = mysql_fetch_array($querymail);
$gpa = $data['GPA'];
//echo $gpa;
$courses = $data['numofcourses'];
$message ="<span> Now you are holding <strong> {$courses} </strong> courses and your GPA is <strong>{$gpa}</strong></span>";
//echo $message;
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
 <script type="text/javascript"
        src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['gauge']}]}">
  </script>
  <script type="text/javascript">
  google.load('visualization', '1', {packages: ['gauge']});
  google.setOnLoadCallback(drawGauge);
  var gaugeOptions = {min: 0, max: 4, yellowFrom: 2.5, yellowTo: 3,
    redFrom: 0, redTo: 2.5,greenFrom: 3, greenTo:4, minorTicks: 0.5};
	
  function drawGauge() {
    gaugeData = new google.visualization.DataTable();
    gaugeData.addColumn('number', 'GPA');
   // gaugeData.addColumn('number', 'Courses');
    gaugeData.addRows(1);
    gaugeData.setCell(0, 0, <?php echo "$gpa";?>);
   // gaugeData.setCell(0, 1, <?php echo "$courses";?>);
	gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
	google.visualization.events.addListener(gauge, 'ready', function () {
});
gauge.draw(gaugeData, gaugeOptions);
  }

  </script>

</head>
<body>

<!-- ####################################################################################################### -->
<?php include 'studenttitle.html' ?>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
    <ul>
      <li ><a href="student.php">Home</a>
        <ul>
          <li><a href="studentEditProfile.php">Edit Profile</a></li>
          <li class="last"><a href="addcourse.php">Add Course Info</a></li>
        </ul>
      </li>
      <li class="active"><a href="studentdashboard.php">Your Dashboard</a>
        <ul>
                    <li class="last"><a href="studentCharts.php">Charts</a></li>
        </ul>
      </li>
      <li><a href="studentUniversityDashboard.php">University Dashboard</a>
        <ul>
          <li><a href="univrating.php">University Rating Info</a></li>
          <li class="last"><a href="univcharts.php">University Charts</a></li>
        </ul>
      </li>
      <li><a href="facultyratings.php">Faculty Ratings</a></li>
      <li><a href="chatindex.php">Chat</a></li>
    </ul>
       
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper col2">
	<div align="center">
	 <br/>
 <br/>
 <br/>
 <br/>
 <?php echo $message; ?>
 <div id="gauge_div" style="width:280px; height: 240px;"></div>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 </div>
 </div>
<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?>
</body>
</html>