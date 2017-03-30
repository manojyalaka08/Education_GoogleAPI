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
$querymail = mysql_query("select Grade,count(CourseName) as gradeCourses,(select count(CourseName) from StudentDetails where UserName='sharath') as totalCourses 
from StudentDetails where UserName='$userNameSession' group by Grade order by Grade DESC");


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
<style>
	table{
	align:center;
	width:50%;
	borde : 0 ;}
td{
	text-align : center;
	border:0;
}
th{
	text-align : center;
	border:0 ;
}
tr{
		border:0 ;
}
</style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Grade', 'Number of Courses'],
		  <?php 
		  $num_rows = mysql_num_rows($querymail);
		  $i=1;
		  while($r = mysql_fetch_assoc($querymail)) {
			$grade = $r['Grade'];
			$gCourses = $r['gradeCourses'];
			$tCourses = $r['totalCourses'];
			if($grade == "4")
				$grade = "A";
			else if($grade == 3)
				$grade = "B";
			else if($grade == 2)
				$grade = "C";
			else if($grade == 1)
				$grade = "D";
			else
				$grade = "Fail";
	?>	 <?php if($i<$num_rows) { ?>
          ['<?php echo $grade; ?>',     <?php echo $gCourses; ?>],
	<?php } ?>
		<?php if($i==$num_rows) { ?>
			['<?php echo $grade; ?>',     <?php echo $gCourses; ?>]
		  <?php  } }?>
	
        ]);

        var options = {
          title: '',
		  backgroundColor:'#E5E2C9',
		   pieSliceText: 'label',
          slices: {  1: {offset: 0.2},
                    2: {offset: 0.2},
                    3: {offset: 0.2},
					4: {offset: 0.2},
					5: {offset: 0.2},
                    
          },
	
		  chartArea:{left:220,top:20,width:'50%',height:'55%'},
	
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
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
      <li><a href="chatindex.php">Chat</a></li>
    </ul>
       
  </div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper col2">
	<div align="center">

 <br/>

 <table >
 <tr>
 <th colspan="6"> <h1>Grades</h1> </th>
</tr>
<tr></tr>
<tr>
	<th>A</th>
	<th>B</th>
		<th>C</th>
	<th>D</th>
	<th>Fail</th>
	</tr>
	<tr>
	<?php
	$j=1;
	$querymail1 = mysql_query("select Grade,count(CourseName) as gradeCourses,(select count(CourseName) from StudentDetails where UserName='sharath') as totalCourses 
from StudentDetails where UserName='$userNameSession' group by Grade order by Grade DESC");

	while($r1 = mysql_fetch_assoc($querymail1)) {
	$gCourses1 = $r1['gradeCourses'];
	$tCourses1 = $r1['totalCourses'];
	$j=$j+1;
	?>
	<td>
	<?php echo $gCourses1; ?>
	</td>
	<?php } 
	
	while($j <=5)
	{
	echo "<td> 0 </td>";
	$j = $j+1;
		}
	
	?>
	</tr>
	</table>

 <div id="piechart" style="width: 700px; height: 400px; align:center" ></div>
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