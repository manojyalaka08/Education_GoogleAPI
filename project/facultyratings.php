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
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the controls package.
      google.load('visualization', '1.0', {'packages':['controls']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawDashboard);

      // Callback that creates and populates a data table,
      // instantiates a dashboard, a range slider and a pie chart,
      // passes in the data and draws it.
      function drawDashboard() {


          var jsond = $.ajax({
          url: "studentGradeDashboard.php",
          dataType:"json",
          async: false
          }).responseText;

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

        var data = new google.visualization.DataTable(jsond);
 
        // Category picker control for the EnergyPlus Version column
        var category1 = new google.visualization.ControlWrapper({
      'controlType': 'CategoryFilter',
      'containerId': 'picker1',
      'options': {
        'filterColumnLabel': 'Course Name',
        'ui': {
          'labelStacking': 'vertical',
          'selectedValuesLayout': 'belowStacked',
          'allowTyping': true,
          'allowMultiple': true,
          'label': '',
          'caption' : 'Select a Course',
           'allowNone': true
        }

      
      },
         state: {
            selectedValues: ['']
        }
        });

      var category2 = new google.visualization.ControlWrapper({
      'controlType': 'CategoryFilter',
      'containerId': 'picker2',
      'options': {
        'filterColumnLabel': 'Instructor Name',
        'ui': {
          'labelStacking': 'vertical',
          'selectedValuesLayout': 'belowStacked',
          'allowTyping': true,
          'allowMultiple': false,
          'label': '',
          'caption': 'Select an Instructor',
          'allowNone': true         
      }
      }
        });

       var category3 = new google.visualization.ControlWrapper({
      'controlType': 'CategoryFilter',
      'containerId': 'picker3',
      'options': {
        'filterColumnLabel': 'Semester',
        'ui': {
          'labelStacking': 'vertical',
          'selectedValuesLayout': 'belowStacked',
          'allowTyping': true,
          'allowMultiple': false,
          'label': '',
          'caption' :'Select a Semester',
          'allowNone': true

        }
      }



        });

         var category4 = new google.visualization.ControlWrapper({
      'controlType': 'CategoryFilter',
      'containerId': 'picker4',
      'options': {
        'filterColumnLabel': 'Year',
        'ui': {
          'labelStacking': 'vertical',
          'selectedValuesLayout': 'belowStacked',
          'allowTyping': true,
          'allowMultiple': true,
          'label': '',
          'caption' :'Select a Year',
          'allowNone': true

        }
      }



        });

       var bar = new google.visualization.ChartWrapper({
          'chartType': 'ColumnChart',
          'containerId': 'chart2',
          'options': {
    width: 1100,
            height: 300,
               colors: ['green'],
      title:'Faculty rating',
   axes: {
            x: {
              0: { side: 'top', label: 'Course ID'} // Top x-axis.
            }
          },
     'chartArea': {'width': '90%', 'height': '80%'},
     'legend':'none',
            animation: {
                duration: 1000,
                easing: 'out'
    
            },
annotations: {
          alwaysOutside: true,
          textStyle: {
            fontSize: 14,
            color: '#000',
            auraColor: 'none'
          }
  }
         
          },
         
          'view': {'columns': [0,5]}
    });

       var table = new google.visualization.ChartWrapper({
      'chartType': 'Table',
      'containerId': 'chart1',
      'options': {
      'title':'Faculty Ratings and Comments',
      'font-weight':'bold',
      'options': {
    width: 1100,
            height: 300
          },
       animation: {
                duration: 1000,
                easing: 'out'
                 },

        'width': '80%'
      },
      'view': {'columns': [0,1,3,4,6]}
        });





new google.visualization.Dashboard(document.getElementById('dashboard')).
 bind([ category4], [category1]).
 bind([ category1], [category3]).
bind([ category1], [category2]).
     bind([ category2], [category3]).




 bind([  category2], [bar,table]).


 bind([  category3], [bar,table]).

            
            // Draw the entire dashboard.
            draw(data);

      }
    </script>
<style>

</style>
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
      <li><a href="studentdashboard.php">Your Dashboard</a>
        <ul>
          <li class="last"><a href="studentCharts.php">Charts</a></li>
        </ul>
      </li>
      <li><a href="studentUniversityDashboard.php">University Dashboard</a>
        
      </li>
      <li  class="active"><a href="facultyratings.php">Faculty Ratings</a></li>
      <li><a href="chatindex.php">Chat</a></li>
    </ul>
       
  </div>
</div>

<!-- ####################################################################################################### -->

  <div align="center">
    <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <table  align="center" style="border:0px"><tr>
 <td style="border:0px"><div id="picker4"></div></td>
 <td style="border:0px"><div id="picker1"></div></td>
      <td style="border:0px"><div id="picker2"></div></td>
      <td style="border:0px"><div id="picker3"></div></td>
     </tr>
     </tr></table>
      <div id="chart1" align="center"></div>
   <div id="chart2" align="center"></div>

    </div>
 </div>

<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?>
</body>
</html>