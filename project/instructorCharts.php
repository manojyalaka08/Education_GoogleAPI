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
   <script type="text/javascript" src="http://www.google.com/jsapi"></script>
     <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['controls']});
    </script>
    <script type="text/javascript">
    
      function drawVisualization() {
    control1 = createDashboard1();
    control2 = createDashboard2();
   control3 = createDashboard1();
    control4 =  createDashboard2();
      google.visualization.events.addListener(control1, 'statechange', function() {
      control2.setState(control1.getState());
      control2.draw();
    });

google.visualization.events.addListener(control3, 'statechange', function() {
      control4.setState(control3.getState());
      control4.draw();
    });
    
  
    }
    
    function createDashboard1() {
        // Prepare the data.
       var jsond = $.ajax({
          url: "instructorRatingDashboard.php",
          dataType:"json",
          async: false
          }).responseText;

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard'));

        var data = new google.visualization.DataTable(jsond);
        // Define a StringFilter control for the 'Name' column
        var CategoryFilter = new google.visualization.ControlWrapper({
         'controlType': 'CategoryFilter',
          'containerId': 'control1',
          'options': {
            'filterColumnLabel': 'year'
          }
        });
        
        var CategoryFilter1 = new google.visualization.ControlWrapper({
         'controlType': 'CategoryFilter',
          'containerId': 'control3',
          'options': {
            'filterColumnLabel': 'Rating'
          }
        });

        // Define a table visualization
        var table = new google.visualization.ChartWrapper({
          'chartType': 'Table',
          'containerId': 'chart1',
         // 'options': {'height': '13em', 'width': '20em'}
        });

         var combo = new google.visualization.ChartWrapper({
          'chartType': 'ComboChart',
          'containerId': 'ComboChart',
          // 'chartArea': {'width': '90%', 'height': '80%'},
           'hAxis':{
            'format':'none'},
             'options': {
    colors: ['green'],
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
         'view': {'columns': [0,1]}
         // 'options': {'height': '13em', 'width': '20em'}
        });

          var bar = new google.visualization.ChartWrapper({
          'chartType': 'Bar',
          'containerId': 'ChartBar',
          // 'chartArea': {'width': '90%', 'height': '80%'},
           'hAxis':{
            'format':'none'},
             'options': {
    colors: ['blue'],
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
         'view': {'columns': [0,1]}
         // 'options': {'height': '13em', 'width': '20em'}
        });

        var state;
           google.visualization.events.addListener(CategoryFilter, 'statechange', function() {
            var x= 5;
     
    });
                 
        
        // Create the dashboard.
        var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard')).
          // Configure the string filter to affect the table contents
           bind([CategoryFilter], [CategoryFilter1]).
           bind([CategoryFilter1],[table,combo, bar]).

        // bind(CategoryFilter,chart1, table).


   
          // Draw the dashboard
          draw(data);


  
        return CategoryFilter;
          
          
      }
      
    function createDashboard2() {
        // Prepare the data.
     var jsond = $.ajax({
          url: "instructorRatingDashboard1.php",
          dataType:"json",
          async: false
          }).responseText;

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard'));

        var data = new google.visualization.DataTable(jsond);
        // Define a StringFilter control for the 'Name' column
        var CategoryFilter = new google.visualization.ControlWrapper({
         'controlType': 'CategoryFilter',
          'containerId': 'control2',
          'options': {
            'filterColumnLabel': 'year'
          }
        });

         var CategoryFilter1 = new google.visualization.ControlWrapper({
         'controlType': 'CategoryFilter',
          'containerId': 'control4',
          'options': {
            'filterColumnLabel': 'Rating'
          }
        });
        
         var CategoryFilter2 = new google.visualization.ControlWrapper({
         'controlType': 'CategoryFilter',
          'containerId': 'CF2',
          'options': {
            'filterColumnLabel': 'Course Name'
          }
        });
        
        // Define a table visualization
        var table = new google.visualization.ChartWrapper({
          'chartType': 'Table',
          'containerId': 'chart2',
          //'options': {'height': '500px', 'width': '500px'}
        });

         var histo = new google.visualization.ChartWrapper({
          'chartType': 'Histogram',
          'containerId': 'Histogram',
          'chartArea': {'width': '90%', 'height': '80%'},
           'hAxis':{
            'format':'none'},
             'options': {
                 legend: { position: 'none' },
    colors: ['orange'],
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
         'view': {'columns': [0,2]}
         // 'options': {'height': '13em', 'width': '20em'}
        });
        
        // Create the dashboard.
        var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard')).
          // Configure the string filter to affect the table contents
          bind(CategoryFilter,[CategoryFilter1,CategoryFilter2,table,histo] ).
           bind([CategoryFilter1,CategoryFilter2], [table,histo]).
          // Draw the dashboard
          draw(data);
          
        return CategoryFilter;
      }      
      google.setOnLoadCallback(drawVisualization);
    </script>
<style>
table thead th {
    color: #black;
  }
</style>
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
    
      <li><a href="instructorchatindex.php">Chat</a></li>
    </ul>
       
  </div>
</div>

<!-- ####################################################################################################### -->

  <div align="center">
       <div id="dashboard">
      <table>
        <tr style='vertical-align: top'>
          <td style='width: 300px; font-size: 0.9em;'>
            
           
          </td>
        </tr>
      </table>
<table style="width:100%"><tr><td style="width:40%" > <div style="width:80%"  id="control1"></div>
             <div style="width:80%"  id="control3"></div>   
                 <div style="width:50%" id="chart1"></div></td>
                 <td><div style="width:80%" id="ComboChart"></td></tr></table>
        <table style="width:100%"><tr><td>             
                     <div style="width:40%" id="ChartBar"></div>
           </td>
         </tr>
       </table>
       

        
<table style="width:100%">
  <tr><td style="width:50%">
     <div id="control2" ></div>
             <div id="control4" ></div> 
             <div id="CF2" ></div> 
               <div style="width:100%" id="chart2"></div></td>
           <td style="width:50%">   <div style="width: 900px; height: 500px;" id="Histogram"></div>
            </td></tr></table>
    </div>
 </div>

<!-- ####################################################################################################### -->
<?php include 'footer.html' ?>
<!-- ####################################################################################################### -->
<?php include 'copyright.html' ?>
</body>
</html>

