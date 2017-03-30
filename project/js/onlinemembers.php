<?php 
include ('db.inc');

$sql = mysql_query("SELECT * from users where Status='Yes'");
while($row= mysql_fetch_array($sql))
{
$data = $row['UserName'];
echo '<option value="'.$data.'">'.$data.'</option>';
}

?>