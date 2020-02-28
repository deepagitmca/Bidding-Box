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
<title> Reject coders </title>
</head>

<body>
	<?php 
	
		include("myconn.php");
		$uname=$_REQUEST["uname"];
		$sql = "update coderlogin set status='reject' where username='$uname'";
		$result = $conn->query($sql);
		if($conn->error)
		{
			die($conn->error);
		}
		else
		{		
				$sql1="SELECT *from coderlogin where username='$uname'";
				$result1=$conn->query($sql1);
				while($row=$result1->fetch_assoc())
				{
					$email=$row["email"];
				}
				echo "$email";
				$to = $email;
				$subject = 'Registration for Coder Rejection Status';
				$msg = "Sorry. Dear Coder of Your Registration request has been rejected ";
				$message = wordwrap($msg,70);
				$headers = "From: demomail2009@gmail.com\r\n";
				if (mail($to, $subject, $message, $headers))
				{
					$conn->query("delete from coderlogin where username='$uname'") or die($conn->error);
				   $msg="Coder with username=".$uname." rejected successfully.Rejection Status Sent to the Coders email";
				} 
				else
			    {
				   $msg='Error Sending Email';
				}
				header("location:adminunapprove_coders.php?msg=$msg");
		}
		
	?>
</body>
</html>