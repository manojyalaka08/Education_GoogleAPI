  <?php
session_start();
$userNameSession = $_SESSION['username'];

include('db.inc');
$sth = mysql_query("SELECT * FROM StudentDetails where UserName='$userNameSession'");
$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(
    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
	
	array('label' => 'Course Name', 'type' => 'string'),
	 array('label' => 'Instructor Name', 'type' => 'string'),
	 array('label' => 'Grade', 'type' => 'number'),
	array('label' => 'Semester', 'type' => 'string'),
	array('label' => 'Year', 'type' => 'number'),

);
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
	
$temp[] = array('v' => (string) $r['CourseName']); 
 
    $temp[] = array('v' => (string) $r['InstructorName']); 
$temp[] = array('v' => (int) $r['Grade']); 
	$temp[] = array('v' => (string) $r['Semester']);
    // Values of each slice
    $temp[] = array('v' => (int) $r['Year']); 

	 
    $rows[] = array('c' => $temp);
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;
?>