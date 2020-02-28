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
    <title> Buyer Update </title>
	 <style type="text/css">
        body 
        {
            background-image: url(code-wallpaper-24.jpg);
        }
     </style>
    <link href="menustyle.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
  </head>
  <?php 
  	$fullname="";
	$uname=$_SESSION["buname"]; // fetch username from session variable
	$email="";
	$address="";
	$mobno="";
	// Establish connection with database
	include("myconn.php");
	// create a select query
	$sql="Select *from buyerlogin where username = '$uname'";
	// Execute the query
	$result = $conn->query($sql);
	// Check if it has returned atleast one row
		if($result->num_rows > 0 )
		{
			// fetch 1 by 1 record from the result and store it in $row array.
			while($row=$result->fetch_assoc())
			{
				$fullname=$row["fullname"];
				$email=$row["email"];
				$mobno=$row["mobileno"];
				$address=$row["address"];
			}
		}
		else
		{
			echo "<script> alert('Invalid user. Please login to access the feature ') </script>";
		}
				
  ?>
 <body>
  <div class="container">
    <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td bgcolor="#FFFFFF"> <?php include("header.php"); ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php include("buyer_menu.php"); ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>
              <tr>
                <td><form method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <h2 style="text-align: center"><span style="text-align: center">Welcome <?php echo  $_SESSION['buname']; ?></span><br>
                  </h2>
                  <table width="504" border="0" align="center" cellpadding="5" cellspacing="10">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#E29BF1" style="text-align: center"><h2>Buyer Update Profile Form</h2></td>
                      </tr>
                      <tr>
                        <td width="154" bgcolor="#99F7E6" style="text-align: left">Full Name</td>
                        <td width="239" style="text-align: left"> <input name="fullname" type="text" required="required" id="fullname" pattern="[a-zA-Z\s]+" title="Accepts lowercase,uppercase &amp; space" value="<?php echo "$fullname";?>" size="40"></td>
                      </tr>
                      <tr>
                        <td bgcolor="#99F7E6" style="text-align: left">Profile photo</td>
                        <td style="text-align: left"><input type="file" name="profilephoto" id="profilephoto"></td>
                      </tr>
                      <tr>
                        <td bgcolor="#99F7E6" style="text-align: left">Email</td>
                        <td style="text-align: left"><input name="email" type="email" required="required" id="email" value="<?php echo "$email";?>" size="40"></td>
                      </tr>
                      <tr>
                        <td bgcolor="#99F7E6" style="text-align: left">Mobile No. </td>
                        <td style="text-align: left"><input name="mobileno" type="tel" id="mobileno" pattern="(9|8|7)\d{9}" value="<?php echo "$mobno";?>" size="40"></td>
                      </tr>
                      <tr>
                        <td bgcolor="#99F7E6" style="text-align: left">Address</td>
                        <td style="text-align: left"> <textarea name="address" required id="address" value="<?php echo "$address";?>" size="40"></textarea> </td>
                      </tr>
                      <tr bgcolor="#E29BF1" style="text-align: center">
                        <td colspan="2"><input type="submit" name="submit" id="submit" value="update"></td>
                        </tr>
                    </tbody>
                </table>
                </form></td>
              </tr>
            </tbody>
          </table></td>
            </tr>
     
          <tr>
            <td bgcolor="#FFFFFF"><?php include("footer.php"); ?></td>
          </tr>
        </table>
    </td>
      </tr>
   </table>
    </td>
   </tr>
 </div>
</body>
</html>

<?php 
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$fullname=$_REQUEST["fullname"];
		$email=$_REQUEST["email"];
		$mobno=$_REQUEST["mobileno"];
		$address=$_REQUEST["address"];
		
		$uname=$_SESSION["buname"];
		include("myconn.php");
		
		$errors = array();
		$file_name = $_FILES['profilephoto']['name'];
		$file_size = $_FILES['profilephoto']['size'];
		$file_tmp = $_FILES['profilephoto']['tmp_name'];
		$file_type = $_FILES['profilephoto']['type'];
	
		$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "document/pdf");
		
		// Verify file extension
	
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	
		if(!array_key_exists($ext, $allowed)) die("Error: Please select valid file format. ");
		move_uploaded_file($file_tmp,"uploads/".$file_name);
	
		$updatequery = "update buyerlogin set fullname='$fullname', profilephoto='$file_name',email='$email',mobileno='$mobno',address='$address' where username='$uname'";
		if($conn->query($updatequery)===TRUE)
		{
			echo "<script> if(confirm('Updated successful')) window.location='buyerdashboard.php';</script>";
		}
		else
		{
			echo "Error : " . $updatequery . "<br>" . $conn->error;
		}
	}
	$conn->close();
?>
