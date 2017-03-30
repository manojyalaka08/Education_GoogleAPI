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

$sql = mysql_query("SELECT * from users where Status='Yes' and userName<>'$userNameSession'");
while($row= mysql_fetch_array($sql))
{
$data = $row['UserName'];
echo '<option value="'.$data.'">'.$data.'</option>';
}

?>