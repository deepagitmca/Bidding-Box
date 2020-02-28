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
    <title> Buyer approve project </title>
  </head>
 <body>
</body>
</html>
    
 <?php 

	//establish connection
	include ("myconn.php");
	
	//accept the values from user form
		$uname=$_REQUEST["uname"];
		$proid = $_REQUEST["pid"];
		$sql1 = "update projectmaster set status='active',coderuname='$uname' where projectid='$proid'";
		$result1 = $conn->query($sql1);
		if($conn->error)
		{
			die($conn->error);
		}
		else
		{			
			  $sql = "SELECT * from coderlogin where username = '$uname'";
			  $result = $conn->query($sql);
			  if(!empty($result) && $result->num_rows == 1)
			  {
				  // fetch 1 by 1 record from the result and store it in $row array.
				  while($row=$result->fetch_assoc())
				  {
					  $email=$row["email"];
				  }
				// send mail
				//mail($email,"Forgot password request",$msg);
				
				  $to = $email;
				  $subject = 'Approved project message';
				   // the message
				  $msg = "Dear ". $uname ." your bidding for project is approved";
				
				  // use wordwrap() if lines are longer than 70 characters
				  $message = wordwrap($msg,70);
				  
				  $headers = "From: demomail2009@gmail.com\r\n";
				  if (mail($to, $subject, $message, $headers))
				  {
					 echo "SUCCESS";
				  } 
				  else 
				  {
					 echo "ERROR";
				  }
			  }
			  else
			  {
				  echo "Invalid username";
			  }
		}

?>