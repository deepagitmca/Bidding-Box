<?php 
session_start();
ob_start();
if(!isset($_SESSION["cuname"]))
{
	header("location:coderlogin.php");
}

?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
	<title> Coder change password </title>
	 <style type="text/css">
       body
       {
           background-image: url(code-wallpaper-24.jpg);
       }
     </style>
	<link href="menustyle.css" rel="stylesheet" type="text/css">
    <script language="javascript">
	function validate()
	{
		npass=document.getElementById("newpassword");
		cnpass=document.getElementById("confirmpassword");
		if(npass.value.trim()!=cnpass.value.trim())
		{
			alert('Password Mismatch');
			cnpass.focus();
			return false;
		}
	}
	</script>
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
          <td bgcolor="#FFFFFF"> <?php include("coder_menu.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>
            <tr>
                  <td> <h2 style="text-align: center">Welcome <?php echo  $_SESSION['cuname']; ?></h2></td>
              </tr>
              <tr>
              <td width="299"> <img src="User_admin_gear.png" width="274" height="280" alt=""/> </td>
                <td width="661"><form id="form1" name="form1" method="post" onSubmit="return validate()">
                  <p>&nbsp;</p>
                  <table align="center" width="396" border="0" cellspacing="10" cellpadding="5">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#B3F5FA"><h2 style="text-align: center">Coder Change Password Form</h2></td>
                        </tr>
                      <tr>
                        <td width="154">Old Password</td>
                        <td width="192"><input name="password" type="password" required="required" id="password"></td>
                      </tr>
                      <tr>
                        <td>New Password</td>
                        <td><input name="newpassword" type="password" required="required" id="newpassword"></td>
                      </tr>
                      <tr>
                        <td>Confirm Password</td>
                        <td><input name="confirmpassword" type="password" required="required" id="confirmpassword"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="submit" id="submit" value="Submit"></td>
                      </tr>
                    </tbody>
                  </table>
                  <p>&nbsp;</p>
                  </form>
                 </td>
                </tr>
               </tbody>
              </table>
             </td>
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
	
	$uname=$_SESSION["cuname"]; // get the username from session variable
	
	// accept the values from user form
	$pass=$_REQUEST["password"]; 
	$npass=$_REQUEST["newpassword"]; 
	$cnpass=$_REQUEST["confirmpassword"];
	
	$sql = "SELECT * from coderlogin where username = '$uname' and password = '$pass'";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
		  		$updatequery="update coderlogin set password='$npass' where username = '$uname'"; 
		 		if($conn->query($updatequery)===TRUE)
				{
					echo "<script> alert('Password changed successfully') </script>";
				}
				else
				{
					echo "Error : " . $sql . "<br>" . $conn->error;
				}
	}
	else
	{
		echo "<script> alert('Invalid username or password')</script>";
	}
}

?>
