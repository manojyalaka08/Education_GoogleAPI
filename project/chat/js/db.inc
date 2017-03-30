<?php
$dbhost = "localhost";
$dbuser = "s_skondakindi";
$dbpass = "eCRux39v";
$select_db = "s_skondakindi";
$con = mysql_connect($dbhost,$dbuser,$dbpass)or die("Error " . mysql_error($conn));
mysql_select_db($select_db,$con) or die(mysql_error()); 
?>