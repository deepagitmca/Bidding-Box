<?php 
session_start();
ob_start();
?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
    <title> Buyer forget password  </title>
	 <style type="text/css">
        body 
        {
            background-image: url(code-wallpaper-24.jpg);
        }
     </style>
    <link href="menustyle.css" rel="stylesheet" type="text/css">
   </head>
   <body>
    <p>&nbsp;</p>
     <div class="container">
     <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td bgcolor="#FFFFFF"> <?php include("header.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"> <?php include("navmenu.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>
              <tr>
               <td width="286" height="58" align="center"><strong> <h3> Buyer forgot password</h3> </strong></td>
                <td width="674" rowspan="2"><form id="form1" name="form1" method="post">
                <p>&nbsp;</p>
                  <table width="400" border="0" align="center" cellpadding="10" cellspacing="0">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#D981F6" style="text-align: center"><h2>Buyer forgot password form</h2></td>
                      </tr>
                      <tr>
                        <td width="136">Username</td>
                        <td width="224"><input name="username" type="text" required="required" id="username"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" id="submit" value="get password"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><a href="buyerlogin.php">Go to login</a></td>
                      </tr>
                </tbody>
              </table>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                </form>
               </td>
              </tr>
              <tr>
                <td align="center"><strong> <h3><img src="img-header.gif" width="263" height="277" alt=""/></h3> 
                  </strong></td>
              </tr>
            </tbody>
           </table>
          </td>
         </tr>
          <tr>
        	 <td bgcolor="#FFFFFF"> <?php include("footer.php"); ?> </td>
          </tr>
         </tbody>
        </table>
       </div>
      </body>
     </html>
    
 <?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//establish connection
	include ("myconn.php");
	
	//accept the values from user form
	$uname=$_REQUEST["username"];
	$pass="";
	$email="";
	$fullname="";
	
	$sql = "SELECT * from buyerlogin where username = '$uname'";
	$result = $conn->query($sql);
	if(!empty($result) && $result->num_rows == 1)
	{
	  // fetch 1 by 1 record from the result and store it in $row array.
	  while($row=$result->fetch_assoc())
	  {
		  $fullname=$row["fullname"];
		  $pass=$row["password"];
		  $email=$row["email"];
		  //echo $email;
	  }
	 	  
	  // send mail
	  //mail($email,"Forgot password request",$msg);
	  
	 	$to = $email;
		$subject = 'Forgot password request';
		 // the message
	  	$msg = "Dear ".$fullname." Your username is ". $uname ." and password is :".$pass;
	  
	  	// use wordwrap() if lines are longer than 70 characters
	  	$message = wordwrap($msg,70);
		
		$headers = "From: demomail2009@gmail.com\r\n";
		if (mail($to, $subject, $message, $headers)) {
		   echo "SUCCESS";
		} else {
		   echo "ERROR";
		}
	}
	else
	{
		echo "Invalid username";
	}
}

?>