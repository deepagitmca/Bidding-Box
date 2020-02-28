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
<title> Approve buyers </title>
</head>

<body>
	<?php 
	
		include("myconn.php");
		$uname=$_REQUEST["uname"];
		$sql = "update buyerlogin set status='approved' where username='$uname'";
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
				$subject = 'Registration for Buyer Approval Status';
				$msg = "Congratulations. Dear Buyer of Your Registration request has been approved. Login into the account to add the details";
				$message = wordwrap($msg,70);
				$headers = "From: demomail2009@gmail.com\r\n";
				if (mail($to, $subject, $message, $headers))
				{
				   echo "<script> alert('Approval Status Sent to the Buyers email')</script>";
				} 
				else
			    {
				   echo "<script> alert('Error Sending Email')</script>";
				}
				header("location:adminapprove_buyers.php?msg=Buyer with username='$uname' approved successfully");
		}
		
	?>
</body>
</html>