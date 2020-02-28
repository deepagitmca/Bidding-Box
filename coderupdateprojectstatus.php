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
    <title> Coder search project </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
	   }
	  </style>
      <link rel="stylesheet" type="text/css" href="style.css">
      <script src="tablesearch.js"></script>
  </head>
  <?php 
		$proname = "";
		$uname=$_SESSION["buname"]; // fetch username from session variable
	
	// Establish connection with database
	include("myconn.php");
	$proid=$_REQUEST["pid"];
	// create a select query
	$sql="Select *from projectmaster where projectid = '$proid'";
	// Execute the query
	$result = $conn->query($sql);
	// Check if it has returned atleast one row
		if($result->num_rows > 0 )
		{
			// fetch 1 by 1 record from the result and store it in $row array.
			while($row=$result->fetch_assoc())
			{
				$proname = $row["projectname"];
			}
		}
		else
		{
			echo "<script> alert('Invalid user. Please login to access the feature ') </script>";
		}
				
  ?>
  <body>
   <p>&nbsp;</p>
    <div class="container">
      <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("header.php"); ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("coder_menu.php"); ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
             <table width="1000" border="0" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td><form id="form1" name="form1" method="post">
                    <h2 style="text-align: center"><span style="text-align: center">Welcome <?php echo  $_SESSION['cuname']; ?></span><br>
                      <br>
                      <span style="text-align: center">Update Status of  Project</span><br>
                    </h2>
                    <table width="500" border="0" cellspacing="0" cellpadding="10">
                      <tbody>
                        <tr>
                          <td bgcolor="#48E57C">Project id</td>
                        </tr>
                        <tr>
                          <td> <?php echo "$proid";?> </td>
                        </tr>
                        <tr>
                          <td bgcolor="#48E57C">Project Name</td>
                        </tr>
                        <tr>
                          <td> <?php echo "$proname";?> </td>
                        </tr>
                        <tr>
                          <td bgcolor="#48E57C">Update Status</td>
                        </tr>
                        <tr>
                          <td><select name="prostatus" id="prostatus">
                            <option value="-1">select status</option>
                            <option value="Active">Active</option>
                            <option value="Completed">Completed</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td><input type="submit" name="submit" id="submit" value="Update"></td>
                        </tr>
                      </tbody>
                    </table>
                    <h2 style="text-align: center"><br>
                    </h2>
                    <p><br>
          </p>
                  </form></td>
                </tr>
                </tbody>
              </table></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("footer.php"); ?></td>
          </tr>
        </tbody>
      </table>
   </div>
  </body>
 </html>
 
 <?php 
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$prostatus = $_REQUEST["prostatus"];
		$uname=$_SESSION["buname"];		
		include("myconn.php");
		
		$updatequery = "update projectmaster set status = '$prostatus' where projectid = '$proid'";
		
		if($conn->query($updatequery)===TRUE)
		{
			echo "<script> alert('Updated successful') </script>";
		}
		else
		{
			echo "Error : " . $updatequery . "<br>" . $conn->error;
		}		
	$conn->close();
  }
?>