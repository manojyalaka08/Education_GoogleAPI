<html>
<head>
	<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['controls']}]}">
    google.setOnLoadCallback(drawVisualization);
	
</script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

 <script type="text/javascript">google.load('visualization', '1.1', {packages: ['controls']});</script>

<script>
google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
		  
		  
		  	 var jsond = $.ajax({
          url: "mapSQL.php",
          dataType:"json",
          async: false
          }).responseText;

 
         var data = new google.visualization.DataTable(jsond);
          var category1 = new google.visualization.ControlWrapper({
			'controlType': 'CategoryFilter',
			'containerId': 'picker1',
			'options': {
				'filterColumnLabel': 'Gender',
				'ui': {
					'labelStacking': 'vertical',
					'selectedValuesLayout': 'belowStacked',
					'allowTyping': false,
					'allowMultiple': false,
					'label': '',
					'caption' : 'Select a Category',
					 'allowNone': false
				}
			},
				 state: {
            selectedValues: ['Gender']
        }
        });
          
		    var category2 = new google.visualization.ControlWrapper({
			'controlType': 'CategoryFilter',
			'containerId': 'picker2',
			'options': {
				'filterColumnLabel': 'Year',
				'ui': {
					'labelStacking': 'vertical',
					'selectedValuesLayout': 'belowStacked',
					'allowTyping': false,
					'allowMultiple': false,
					'label': '',
					//'caption' : 'Year',
					 'allowNone': true
				}
			},
				 state: {
            selectedValues: ['Year']
        }
        });
		  
         
         var map = new google.visualization.ChartWrapper({
			'chartType': 'GeoChart',
			'containerId': 'chart1',
			'options': {
			'title':'',
			 'colorAxis': {colors: ['#00853f', 'black', '#e31b23']},
			'datalessRegionColor': '#BDBDBD',
          		'defaultColor': 'black',
			'font-weight':'bold',
			 animation: {
                duration: 1000,
                easing: 'out'
       			     },

				'width': '70%'
			},
			'view': {'columns': [0,2]}
			
        });
		
		var cssClassNames = {
			'headerRow': 'italic-darkblue-font large-font bold-font',
    'tableRow': '',
    'oddTableRow': 'beige-background',
    'selectedTableRow': 'orange-background large-font',
    'hoverTableRow': '',
    'headerCell': 'gold-border',
    'tableCell': '',
    'rowNumberCell': 'underline-blue-font'};
	
	
		

		 

   new google.visualization.Dashboard(document.getElementById('dashboard')).
    //  bind([ category1], [table]).
	 // bind([ category2], [table]).      
     bind([ category1, category2],[map]).
	
	// bind([ category2], [map]).
	   
	  
    draw(data);

      }
	    google.setOnLoadCallback(drawRegionsMap);
	  </script>
	  </head>
	  <body >
	
<div id="dashboard" style="height:500px">
	<div style="float:left">
	<table style=" border:0px"><tr style="border:0px"><td style="border:0px;">
<div id="picker1"></div> </td><td style="border:0px">
 <div id="picker2"></div></td></tr>
 <!-- <tr style="border:0px"><td style="border:0px" colspan="2"><div id="bar" ></div></td></tr> -->
	</table></div>
	<div style="float:left">
	<table style=" border:0px"><tr style="border:0px"><td style="border:0px; color:black;">
	<div id="table" style="float:left;"></div></td></tr>
	</table>
	</div>
    <div id="chart1" style="width:800px; height:500px; float:left"></div>
	
</div>
   
	  </body>
	  
	  </html>
	  