<html>
  <head>
    <!--Load the AJAX API-->
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
    width: 700,
            height: 400,
      title:'Student Course Grades VS. Class Average',
   axes: {
            x: {
              0: { side: 'top', label: 'Course ID'} // Top x-axis.
            }
          },
     
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
         
          'view': {'columns': [0,2,7]}
    });

        var line = new google.visualization.ChartWrapper({
          'chartType': 'LineChart',
          'containerId': 'chart3',
          'options': {
         width: 700,
            height: 400,
            colors: ['green'],
      title:'Student Instructor Ratings for Course',
   axes: {
            x: {
              0: { side: 'top', label: 'Course ID'} // Top x-axis.
            }
          },
     
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
         
          'view': {'columns': [0,2]}
    });

       var table = new google.visualization.ChartWrapper({
      'chartType': 'Table',
      'containerId': 'chart1',
      'options': {
      'title':'',
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
      'view': {'columns': [0,1,3,4]}
        });





new google.visualization.Dashboard(document.getElementById('dashboard')).
 bind([ category4], [category1]).
 bind([ category1], [category3]).
bind([ category1], [category2]).
     bind([ category2], [category3]).




 bind([  category2], [line,bar,table]).


 bind([  category3], [line,bar,table]).

            
            // Draw the entire dashboard.
            draw(data);

      }
    </script>
  </head>

  <body>
    <!--Div that will hold the dashboard-->
    <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <table align="center"><tr>
 <td><div id="picker4"></div></td>
 <td><div id="picker1"></div></td>
      <td><div id="picker2"></div></td>
      <td><div id="picker3"></div></td>
     </tr>
     </tr></table>
      <div id="chart1" align="center"></div>
   <table align="center"><tr><td><div id="chart2" align="center"></div></td><td>
   <div id="chart3" align="center"></div></td></table>

    </div>
  </body>
</html>