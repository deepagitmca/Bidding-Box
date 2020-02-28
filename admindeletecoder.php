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
<title> Admin delete coder </title>
</head>
<body>
<?php 
	include("myconn.php");
	$uname=$_REQUEST["uname"];
	$delquery="delete from coderlogin where username = '$uname'";
	$result=$conn->query($delquery);
	if($conn->error)
	{
		die("Error:".$conn->error);
	}
	$msg="Coder with username :".$uname." deleted successfully";
	header("location:adminmanage_coders.php?msg=".$msg);
?>
</body>
</html>