   <?php


include('db.inc');
$sth = mysql_query("SELECT CountryCitizenship,Gender,count(UserName) as noofstudents,Year FROM `users` group by  CountryCitizenship,Gender,users.Year
	union 
	SELECT CountryCitizenship,'Gender',count(UserName) as noofstudents,Year FROM `users` group by  CountryCitizenship,users.Year
	union
	SELECT CountryCitizenship,'Gender',count(UserName)  as noofstudents,'Year' FROM `users` group by  CountryCitizenship
	union 
	SELECT CountryCitizenship,'Male',count(UserName)  as noofstudents,'Year' FROM `users` where Gender='Male' group by  CountryCitizenship
	union 
	SELECT CountryCitizenship,'Female',count(UserName)  as noofstudents,'Year' FROM `users` where Gender='Female' group by  CountryCitizenship
	");



$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
	array('label' => 'Country', 'type' => 'string'),
    array('label' => 'Gender', 'type' => 'string'),
	array('label' => '# of Students', 'type' => 'number'),
	array('label' => 'Year', 'type' => 'string')
);

$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['CountryCitizenship']); 

    // Values of each slice
    $temp[] = array('v' => (string) $r['Gender']); 
	$temp[] = array('v' => (int) $r['noofstudents']); 
	 $temp[] = array('v' => (string) $r['Year']); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;
?>