
<?php
error_reporting(0);
session_start();
$userNameSession = $_SESSION['username'];
include('db.inc');


$sth = mysql_query("SELECT Gender,Count(UserName) as userno,Year from users group by Gender,Year");


$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(
         array('label' => 'Gender', 'type' => 'string'),
	     array('label' => 'year', 'type' => 'number'),
 		 array('label' => 'Users', 'type' => 'number'),
         array('label' => 'Total Users', 'type' => 'number'),
		 array('label' => 'Gender', 'type' => 'string'),
 

);
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
$year1 = $r['Year'];
$gender1 = $r['Gender'];

$sth1 = mysql_query("SELECT  count(UserName) as Total from users  where Year='$year1' and Gender='$gender1'");

    $temp = array();
	
	$temp[] = array('v' => (string) $r['Gender']); 
	$temp[] = array('v' => (int) $r['Year']); 
    $temp[] = array('v' => (int) $r['userno']); 
    $temp[] = array('v' => (int) $sth1);   
    $temp[] = array('v' => (string) $r['Gender']);   	
	 
    $rows[] = array('c' => $temp);
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
echo $jsonTable;
?>
