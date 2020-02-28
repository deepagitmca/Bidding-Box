<?php 
session_start();
ob_start();
if(!isset($_SESSION["buname"]))
{
	header("location:buyerlogin.php");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Buyer delete project </title>
</head>
<body>
<?php 
	include("myconn.php");
	$proid=$_REQUEST["pid"];
	$delquery="delete from projectmaster where projectid = $proid";
	$result=$conn->query($delquery);
	if($conn->error)
	{
		die("Error:".$conn->error);
	}
	$msg="Project with projectid:".$proid." deleted successfully";
	header("location:buyerviewproject.php?msg=".$msg);
?>
</body>
</html>