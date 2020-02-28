<?php 
session_start();
ob_start();
?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
	<title> Coder Login </title>
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
               <td width="278" height="64" align="center"><strong> <h3> Coder Login </h3> </strong></td>
                <td width="682" rowspan="2"><form id="form1" name="form1" method="post">
                  <p>&nbsp;</p>
                    <table width="400" border="0" align="center" cellpadding="10" cellspacing="2">
                     <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#B8E8F4" style="text-align: center"> <h2>Coder Login Form </h2></td>
                      </tr>
                      <tr>
                       <td>Username</td>
                       <td><input name="username" type="text" required="required" id="username"></td>
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
                        <td> <a href="coderforgetpassword.php">Forgot password?</a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td> <a href="coder_register.php"> Don't have account? Register </a></td>
                      </tr>
                    </tbody>
                   </table>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                 </form></td>
                </tr>
              <tr>
                <td><strong style="text-align: center"> <h3><img src="giphy.gif" width="270" height="295" alt=""/></h3> </strong></td>
              </tr>
              </tbody>
            </table></td>
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
	
	$sql = "SELECT * from coderlogin where username = '$uname' and password = '$pass' and status = 'approved'";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
		  // create a session object name uname and assign username to it
		  $_SESSION["cuname"]=$uname;
		  
		  // alternate to linking page is this
		  // redirect the control from login page to dashboard page
		  // header("location:coderdashboard.php");
		  
		  echo "<script> if(confirm('Login Successfull')) window.location='coderdashboard.php'; </script>";
	}
	else
	{
		echo "<script> alert('Invalid username or password')</script>";
	}
}
?>
