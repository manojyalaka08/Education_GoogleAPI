  <?php
session_start();
$userNameSession = $_SESSION['username'];

include('db.inc');
$sth = mysql_query("SELECT s.UserName as UserName,s.CourseName as CourseName,s.InstructorName as InstructorName,s.Grade as Grade,s.Semester as Semester,s.Year as Year,s.InstructorRating InstructorRating,s.comments as Comments,avg(d.Grade) as ClassAverage 
	FROM StudentDetails s,StudentDetails d where s.CourseName=d.CourseName and s.UserName='$userNameSession' 
	group by d.courseName, s.Semester");
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
	array('label' => 'Instructor Rating', 'type' => 'number'),
	array('label' => 'Comments', 'type' => 'string'),
		array('label' => 'Class Average', 'type' => 'number'),
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
    
    $temp[] = array('v' => (int) $r['InstructorRating']); 
    
    $temp[] = array('v' => (string) $r['Comments']); 
     $temp[] = array('v' => (float) $r['ClassAverage']); 



	 
    $rows[] = array('c' => $temp);
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;
?>