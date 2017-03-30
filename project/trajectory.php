<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["motionchart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
         var jsond2 = $.ajax({
          url: "universityDashboardTrajectory.php",
          dataType:"json",
          async: false
          }).responseText;

	var data = new google.visualization.DataTable(jsond2);

        var chart = new google.visualization.MotionChart(document.getElementById('chart_div'));

        chart.draw(data, {width: 700, height:400});
      }
    </script>
  </head>
  <body>

	<br/>
	<br/>
	<table style="border:0px"><tr><td align="center">
    <div id="chart_div" style="width: 700px; height: 400px;"></div></tr></td>
	</table>	
	<br/>
	<br/>
 
</body>
</html>