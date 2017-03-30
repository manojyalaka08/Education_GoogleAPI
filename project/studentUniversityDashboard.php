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
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Educational</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
#tabledas{
    border-collapse: collapse;
}
#button{
	height:40px;
	background-color: #591434;
	color:white;
	border : 0px;
    padding: 0;
}
pre{
	color:white;
}
	</style>
</head>
<body>
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
      <li><a href="studentdashboard.php">Your Dashboard</a>
        <ul>
          <li class="last"><a href="studentCharts.php">Charts</a></li>
        </ul>
      </li>
      <li class="active"><a href="studentuniversityDashboard.php">University Dashboard</a>
         <ul>
		<form action="#" method="POST">
		  <li><input type="submit" name="map" value="Student accross The globe" id="button"/></li>
		  <li><pre> || </pre></li>
          <li class="last"><input type="submit" name="trajectory" value="Male & Female count" id="button"/></li>
		  </form>
        </ul>
      </li>
      </li>
      <li><a href="facultyratings.php">Faculty Ratings</a></li>
      <li><a href="chatindex.php">Chat</a></li>
    </ul>
       
  </div>
</div>
<!-- ####################################################################################################### -->


<!-- ####################################################################################################### -->
<div class="wrapper col3" style="width:100%">
	<div align="center">
    <?php if($_POST['map']!='')
				include 'map.php';
		  elseif($_POST['trajectory']!='')
				include 'trajectory.php';
			else
			include 'map.php';
			
			?> 
      <?php  ?>
</div>
     
</div>
    
<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?></body>
</html>