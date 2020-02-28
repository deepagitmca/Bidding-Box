<?php 
session_start();
ob_start();
if(!isset($_SESSION["auname"]))
{
	header("location:adminlogin.php");
}

?>
<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
   <title> Admin Logout </title>
 </head>

 <body>
  <?php 
	// remove all session variables
	session_unset();
	
	// destroy the session
	session_destroy();
	header("location:adminlogin.php");
  ?>
 </body>
</html>