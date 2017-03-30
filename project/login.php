<?php 
	session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['pupillogin'])) {
if (empty($_POST['pupilname']) || empty($_POST['pupilpass'])) {
$error = "Username or Password is invalid";
header("location: Relogin.php");
}
else
{
$username=$_POST['pupilname'];
$password=$_POST['pupilpass'];
$user = "Student";
$_SESSION['username'] = $username ;	
$_SESSION['user'] = $user;	
$usernameSession = $_SESSION['username'];
$userSession= $_SESSION['user'] ;


include ('db.inc');
$query = mysql_query("select * from users where UserType='Student' AND password='$password' AND username='$username'");
$statusquery = mysql_query("UPDATE users SET Status='Yes' where username='$username'");

$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: student.php"); // Redirecting To Other Page
} 
else {
$error = "Username or Password is invalid";
header("location: Relogin.php");
}
}
}
else
{
if (isset($_POST['teacherlogin'])) {
if (empty($_POST['teachername']) || empty($_POST['teacherpass'])) {
$error = "Username or Password is invalid";
header("location: Relogin.php");
}
else
{
$username=$_POST['teachername'];
$password=$_POST['teacherpass'];
$user = "teacher";
$_SESSION['username'] = $username ;	
$_SESSION['user'] = $user;	
$usernameSession = $_SESSION['username'];
$userSession= $_SESSION['user'] ;
include ('db.inc');
$query = mysql_query("select * from users where UserType='Instructor' AND password='$password' AND username='$username'");
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: instructor.php"); // Redirecting To Other Page
} 
else {
$error = "Username or Password is invalid";
header("location: Relogin.php");
}
}
}	
}
?>

<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>Teachers Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Teachers Login Form</legend>
            <label for="teachername">Username:
              <input type="text" name="teachername" id="teachername" value="" />
            </label>
            <label for="teacherpass">Password:
              <input type="password" name="teacherpass" id="teacherpass" value="" />
            </label>
            <label for="teacherremember">
              <input class="checkbox" type="checkbox" name="teacherremember" id="teacherremember" checked="checked" />
              Remember me</label>
			  <p style="color:red"> <?php echo $error ; ?> </p> 
            <p>
              <input type="submit" name="teacherlogin" id="teacherlogin" value="Login" />
              &nbsp;
              <input type="reset" name="teacherreset" id="teacherreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox last">
        <h2>Pupils Login Here</h2>
        <form action="#" method="post">
          <fieldset>
            <legend>Pupils Login Form</legend>
            <label for="pupilname">Username:
              <input type="text" name="pupilname" id="pupilname" value="" />
            </label>
            <label for="pupilpass">Password:
              <input type="password" name="pupilpass" id="pupilpass" value="" />
            </label>
            <label for="pupilremember">
              <input class="checkbox" type="checkbox" name="pupilremember" id="pupilremember" checked="checked" />
              Remember me</label>
			  <p style="color:red"> <?php echo $error ; ?> </p>
            <p>
              <input type="submit" name="pupillogin" id="pupillogin" value="Login" />
              &nbsp;
              <input type="reset" name="pupilreset" id="pupilreset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">Log In Here &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">Administration</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
