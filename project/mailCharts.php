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
<html>
 <head>
  <script type="text/javascript"
        src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['gauge']}]}">
  </script>
  <script type="text/javascript">
  google.load('visualization', '1', {packages: ['gauge']});
  google.setOnLoadCallback(drawGauge);

  var gaugeOptions = {min: 0, max: 100, yellowFrom: 50, yellowTo: 75,
    redFrom: 75, redTo: 100, minorTicks: 5};
  var gauge;

  function drawGauge() {
    gaugeData = new google.visualization.DataTable();
    gaugeData.addColumn('number', 'GPA');
    gaugeData.addColumn('number', 'Courses');
    gaugeData.addRows(2);
    gaugeData.setCell(0, 0, <?php echo "$gpa";?>);
    gaugeData.setCell(0, 1, <?php echo "$courses";?>);

    //gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
	gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
	google.visualization.events.addListener(gauge, 'ready', function () {
		
	gauge_div.innerHTML = '<img src="' + gauge.getImageURI() + '">';
  console.log(gauge_div.innerHTML)
	
//	var imgUri = gauge.getImageURI();
     
 //   window.open(imgUri);
});
    gauge.draw(gaugeData, gaugeOptions);
	
  }
  </script>
 </head>
 <body>
 <div align="center">
 <?php echo $message; ?>
 <div id="gauge_div" style="width:280px; height: 140px;"></div>
 </div>
 
 </body>
 </html>
	  
