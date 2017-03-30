<?php 
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
	$username=$_POST['username'];
$password=$_POST['password'];
include ('db.inc');
$query = mysql_query("select * from users where UserType='Student' AND password='$password' AND username='$username'");
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location:/student.php#"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
}
?>

<html>
<form action="#" method="post">
<input type="text" name="username" placeholder="Username" />
<input type="password" name="password" placeholder="Password" />
<br/>
<input type="submit" name="submit" value="submit" />
<?php echo "$error"; ?>
</form>
</html>