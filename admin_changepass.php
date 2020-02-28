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
	<title> Admin change password </title>
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
          <td bgcolor="#FFFFFF"> <?php include("admin_menu.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>
             <tr>
                  <td><h1 align="center"> Welcome <?php echo  $_SESSION['auname']; ?> </h1></td>
                  </tr>
              <tr>
              <td width="421" align="center"> <img src="User_admin_gear.png" width="243" height="244" alt=""/></td>
                <td width="539"><form id="form1" name="form1" method="post" onSubmit="return validate()">
                  <p>&nbsp;</p>
                  <table align="center" width="396" border="0" cellspacing="10" cellpadding="5">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#9BDEE6"><h2 style="text-align: center">Admin Change Password</h2></td>
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
                        <td><input type="password" name="confirmpassword" id="confirmpassword"></td>
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
	
	$uname=$_SESSION["auname"]; // get the username from session variable
	
	// accept the values from user form
	$pass=$_REQUEST["password"]; 
	$npass=$_REQUEST["newpassword"]; 
	$cnpass=$_REQUEST["confirmpassword"];
	
	$sql = "SELECT * from adminlogin where username = '$uname' and password = '$pass'";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
		  		$updatequery="update adminlogin set password='$npass' where username = '$uname'"; 
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
		echo "Error : " . $sql . "<br>" . $conn->error;
	}
}

?>