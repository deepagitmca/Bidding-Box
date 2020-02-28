<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
   <title> Buyer Logout </title>
 </head>
 
 <body>
  <?php 
	// remove all session variables
	session_unset();
	
	// destroy the session
	session_destroy();
	header("location:buyerlogin.php");
  ?>
 </body>
</html>