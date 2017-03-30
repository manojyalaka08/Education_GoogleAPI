<?php
$to = "srsharathreddy@gmail.com";
$subject = "HTML email";

$message = "
<html>
 <head>
 
 </head>
 <body>
 <div align=\"center\">
 <span> Now you are holding <strong> 26 </strong> courses and your GPA is <strong>3.4231</strong></span> <div id=\"gauge_div\" style=\"width:280px; height: 140px;\"></div>
 </div>
 
 </body>
 </html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <srsharathreddy92@gmail.com>' . "\r\n";
//$headers .= 'Cc: karn.hari@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>