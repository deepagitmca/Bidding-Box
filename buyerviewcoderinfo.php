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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buyer view coder info</title>
  <link href="menustyle.css" rel="stylesheet" type="text/css">
  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
	   }
	  </style>
  <link href="menustyle.css" rel="stylesheet" type="text/css">
  <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
  <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
  <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  </head>
  <?php 
    $file_name = "";
    $fullname = "";
	$dob = "";
	$email = "";
	$mobno = "";
	$address = "";
	$skills = "";
	$experiance = "";
	$uname = $_REQUEST["uname"];
	$proid = $_REQUEST["pid"];
	// fetch username from session variable
	
	// Establish connection with database
	include("myconn.php");
	// create a select query
	$sql="Select *from coderlogin where username = '$uname'";
	// Execute the query
	$result = $conn->query($sql);
	// Check if it has returned atleast one row
		if($result->num_rows > 0 )
		{
			// fetch 1 by 1 record from the result and store it in $row array.
			while($row=$result->fetch_assoc())
			{
				$file_name = $row["profilephoto"];
				$fullname = $row["fullname"];
				$dob = $row["dateofbirth"];
				$email = $row["email"];
				$mobno = $row["mobileno"];
				$address = $row["address"];
				$skills = $row["skills"];
				$experiance = $row["experiance"];
				$uname = $row["username"];			
			}
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
		}
				
  ?>
  
  <body>
    <div class="container">
      <table align="center" width="1002" border="0" cellspacing="0" cellpadding="0">
       <tbody>
        <tr>
          <td width="1002"  bgcolor="#FFFFFF"><?php include("header.php"); ?></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF"> <?php include("buyer_menu.php"); ?></td>
          </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>           
             <tr>
              <td width="969"><form id="form1" name="form1" method="post">
                <p style="text-align: center">Welcome <?php echo  $_SESSION['buname']; ?></p>
                <table width="500" border="0" align="center" cellpadding="10" cellspacing="4">
                  <tbody>
                    <tr style="text-align: center">
                      <td colspan="2" bgcolor="#BB19E7"><h3>Information about the coder</h3></td>
                    </tr>
                    <tr>
                      <td width="173" rowspan="4"><img src="uploads\<?php echo "$file_name";?>" width="167" height="179" alt="No Image"/></td>
                      <td width="287" bgcolor="#48E57C">Full name</td>
                    </tr>
                    <tr>
                      <td><?php echo "$fullname";?></td>
                    </tr>
                    <tr>
                      <td bgcolor="#48E57C">Experiance</td>
                    </tr>
                    <tr>
                      <td> <?php echo "$experiance";?> </td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#48E57C">Email</td>
                    </tr>
                    <tr>
                      <td colspan="2"><?php echo "$email";?></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#48E57C">DOB</td>
                    </tr>
                    <tr>
                      <td colspan="2"><?php echo "$dob";?></td>
                      </tr>
                    <tr>
                      <td colspan="2" bgcolor="#48E57C"> Mobile No.</td>
                    </tr>
                    <tr>
                      <td colspan="2"><?php echo "$mobno";?></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#48E57C">Address</td>
                    </tr>
                    <tr>
                      <td colspan="2"><?php echo "$address";?></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#48E57C">Skills</td>
                    </tr>
                    <tr>
                      <td colspan="2"><?php echo "$skills";?></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#48E57C">Username</td>
                    </tr>
                    <tr>
                      <td colspan="2"><?php echo "$uname";?></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#48E57C">Projects Completed</td>
                    </tr>
                    <tr>
                      <td colspan="2"><a href="buyerviewcoderinfoproject.php?uname=<?php echo "$uname";?>&pid=<?php echo $_REQUEST["pid"];?>">Click Here</a></td>
                    </tr>
                    <tr style="text-align: center">
                      <td colspan="2" bgcolor="#DE93F3"><a href="buyerviewbids.php?pid=<?php echo $_REQUEST["pid"];?>">Go Back</a></td>
                    </tr>
                  </tbody>
      </table>
                <p>&nbsp;</p>
              </form></td>
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
  <script type="text/javascript">
$(function() {
	$( "#dateofbirth" ).datepicker({
		dateFormat:"yy-mm-dd"
	}); 
});
    </script>
 </body>
</html>

