  <?php
session_start();
$userNameSession = $_SESSION['username'];

include('db.inc');
$sth = mysql_query("select CourseName, 'Good' as 'RatingType', count(InstructorRating) as 'Rating',year from StudentDetails where InstructorRating=3 and InstructorName='Jiang Liu' group by Year,CourseName 
	union 
	select CourseName,'Excellent' as 'RatingType', count(InstructorRating) as 'Rating',year from StudentDetails where InstructorRating=4 and InstructorName='Jiang Liu' group by Year, CourseName 
	union 
	select CourseName, 'Average' as 'RatingType', count(InstructorRating) as 'Rating',year from StudentDetails where InstructorRating=2 and InstructorName='Jiang Liu' group by Year,CourseName 
	union 
	select CourseName, 'Poor' as 'RatingType', count(InstructorRating) as 'Rating',year from StudentDetails where InstructorRating=1 and InstructorName='Jiang Liu' group by Year,CourseName");
$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(
    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
	array('label' => 'Course Name', 'type' => 'string'),
	array('label' => 'Rating', 'type' => 'string'),
	 array('label' => 'Number of Students', 'type' => 'number'),
	 array('label' => 'year', 'type' => 'number'),
	
);
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
$temp[] = array('v' => (string) $r['CourseName']); 	
$temp[] = array('v' => (string) $r['RatingType']); 

$temp[] = array('v' => (int) $r['Rating']); 

    // Values of each slice
    $temp[] = array('v' => (int) $r['year']); 
    $rows[] = array('c' => $temp);
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;
?>