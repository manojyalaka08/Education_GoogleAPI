<?php
error_reporting(0);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$select_db = "project";
$con = mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($select_db,$con) or die(mysql_error()); 
?>


