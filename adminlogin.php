<?php 
session_start();
ob_start();
?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
    <title> Admin Login </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
        body
        {
            background-image: url(code-wallpaper-24.jpg);
        }
      </style>
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
              <td width="210" height="54" align="center"><strong> <h3> Admin Login </h3> </strong></td>
               <td width="750" rowspan="2">
                <form id="form1" name="form1" method="post">
                  <p>&nbsp;</p>
                   <table width="400" border="0" align="center" cellpadding="10" cellspacing="2">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#B8E8F4" style="text-align: center"> <h2>Admin Login Form </h2></td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td> <input name="username" type="text" required="required" id="username"> </td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td> <input name="password" type="password" required="required" id="password"> </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input name="submit" type="submit" id="submit" value="Submit"></td>
                      </tr>
                      <tr>
                         <td>&nbsp;</td>
                         <td><a href="adminforgetpassword.php">Forgot Password?</a></td>
                      </tr>
                     </tbody>
                    </table>
                  <p>&nbsp;</p>
                </form></td>
                </tr>
              <tr>
                <td align="center"><strong> <h3><img src="admin.png" width="204" height="234" alt=""/></h3> 
                  </strong></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php include("footer.php"); ?></td>
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
	
	$sql = "SELECT * from adminlogin where username = '$uname' and password = '$pass'";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
	      $_SESSION['auname']=$uname;
		  echo "<script> if(confirm('Login Successfull')) window.location='admindashboard.php'; </script>";
	}
	else
	{
		echo "<script> alert('Invalid username or password')</script>";
	}
}

?>