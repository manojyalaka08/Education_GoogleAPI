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
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

<?php

$good = mysql_query("select distinct(select count(InstructorRating) from StudentDetails where InstructorRating=3 and InstructorName='$userNameSession') as Good from StudentDetails");
$dgood = mysql_fetch_array($good); 
$Excellent = mysql_query("select distinct (select count(InstructorRating) from StudentDetails where InstructorRating=4 and InstructorName='$userNameSession') as Excellent from StudentDetails");
$dexcellent = mysql_fetch_array($Excellent); 
$Average = mysql_query("select distinct (select count(InstructorRating) from StudentDetails where InstructorRating=2 and InstructorName='$userNameSession') as Average from StudentDetails");
$daverage = mysql_fetch_array($Average);
$Poor = mysql_query("select distinct (select count(InstructorRating) from StudentDetails where InstructorRating=1 and InstructorName='$userNameSession') as Poor from StudentDetails");
$dpoor = mysql_fetch_array($Poor); 
?>

        var data = google.visualization.arrayToDataTable([
          ['Rating', 'Number of Students'],
          ['Good',    <?php echo $dgood[Good];?>],
         // ['Excellent',   <?php echo $dexcellent[Excellent];?>],
         // ['Average',  <?php echo $daverage[Average];?> ],
          ['Poor', <?php echo $dpoor[Poor];?>]
          ]);

        var options = {
          title: 'Student Ratings'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</head>
<body>

<!-- ####################################################################################################### -->
<?php include 'instructortitle.html' ?>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
    <ul>
      <li ><a href="instructor.php">Home</a>
        <ul>
          <li><a href="instructorEditProfile.php">Edit Profile</a></li>
        </ul>
      </li>
      <li class="active"><a href="instructorDashboard.php">Your Dashboard</a>
        <ul>
                    <li class="last"><a href="instructorCharts.php">Charts</a></li>
        </ul>
      </li>
      <li><a href="instructorUniversityDashboard.php">University Dashboard</a>
      </li>
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
  <div id="piechart" style="width: 900px; height: 500px;"></div>
 <!--<div id="gauge_div" style="width:280px; height: 240px;"></div> -->
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