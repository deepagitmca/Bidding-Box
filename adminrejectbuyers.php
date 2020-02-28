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
<title> Reject Buyers </title>
</head>

<body>
	<?php 	
		include("myconn.php");
		$uname=$_REQUEST["uname"];
		$sql = "update buyerlogin set status='reject' where username='$uname'";
		$result = $conn->query($sql);
		if($conn->error)
		{
			die($conn->error);
		}
		else
		{		
				$sql1="SELECT *from buyerlogin where username='$uname'";
				$result1=$conn->query($sql1);
				while($row=$result1->fetch_assoc())
				{
					$email=$row["email"];
				}
				echo "$email";
				$to = $email;
				$subject = 'Registration for Buyer Rejection Status';
				$msg = "Sorry. Dear Buyer of Your Registration request has been rejected ";
				$message = wordwrap($msg,70);
				$headers = "From: demomail2009@gmail.com\r\n";
				if (mail($to, $subject, $message, $headers))
				{
					$conn->query("delete from buyerlogin where username='$uname'") or die($conn->error); 
				   echo "<script> alert('Rejection Status Sent to the Buyer email') </script>";
				} 
				else
			    {
				   echo "<script> alert('Error Sending Email') </script>";
				}
				header("location:adminapprove_coders.php?msg=Buyer with username='$uname' rejected successfully");
		}
		
	?>
</body>
</html>