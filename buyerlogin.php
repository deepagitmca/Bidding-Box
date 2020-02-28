<?php 
session_start();
ob_start();
?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
    <title> Buyer Login </title>
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
               <td width="286" height="58" align="center"><strong> <h3> Buyer login </h3> </strong></td>
                <td width="674" rowspan="2"><form id="form1" name="form1" method="post">
                  <table width="400" border="0" align="center" cellpadding="10" cellspacing="0">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#B8E8F4" style="text-align: center"><h2>Buyer Login Form</h2></td>
                      </tr>
                      <tr>
                        <td width="136">Username</td>
                        <td width="224"><input name="username" type="text" required="required" id="username"></td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td><input name="password" type="password" required="required" id="password"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" id="submit" value="Submit"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td> <a href="buyerforgetpassword.php">Forgot password? </a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><a href="buyer_register.php"> Don't have account? Register </a></td>
                      </tr>
                </tbody>
            </table>
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
	$pass=$_REQUEST["password"];
	
	$sql = "SELECT * from buyerlogin where username = '$uname' and password = '$pass' and status = 'approved'";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
		  // create a session object name uname and assign username to it
		  $_SESSION["buname"]=$uname;
		 echo "<script> if(confirm('Login Successfull')) window.location='buyerdashboard.php'; </script>";
		 // header("location:buyerdashboard.php");
	}
	else
	{
		echo "<script> alert('Invalid username or password')</script>";
	}
}

?>