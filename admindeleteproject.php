<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php 
	include("myconn.php");
	$uname=$_REQUEST["username"];
	$delquery="delete from projectmaster where projectid = '$proid'";
	$result=$conn->query($delquery);
	if($conn->error)
	{
		die("Error:".$conn->error);
	}
	$msg="Project with projectid :".$proid." deleted successfully";
	header("location:adminmanage_project.php?msg=".$msg);
?>
</body>
</html>