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
    <title> Coder project more information </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
	background-color: #A08A8A;
	background-image: url(code-wallpaper-24.jpg);
	   }
	  </style>
       <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	  <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	  <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
  </head>
   <?php 
        $proid = "";
		$proname = "";
		$shortdes = "";
		$techuse = "";
		$procost = "";
		$dur = "";	
		$bidstart = "";
		$bidend = ""; 
		$minamt = "";
		$protype = "";
		$uname=$_SESSION["cuname"]; // fetch username from session variable
	
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
				$uname = $row["username"];
				$proid = $row["projectid"];
				$proname = $row["projectname"];
				$shortdes = $row["shortdescription"];
				$techuse = $row["technologyused"];
				$procost = $row["projectcost"];
				$protype = $row["projecttype"];
				$dur = $row["duration"];	
				$bidstart = $row["biddingstart"];
				$bidend = $row["biddingend"]; 
				$minamt = $row["minimumamount"];	
				$requirementfile=$row['requirementfile']; 	  
			}
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
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
                  <td>
                   <h1 align="center"> Welcome <?php echo  $_SESSION['cuname']; ?> </h1> 
                    </td>
                  </tr>
                <tr>
                  <td>
                    <form id="form1" name="form1" method="post">
                      <table width="700" border="0" align="center" cellpadding="10" cellspacing="0">
                        <tbody>
                          <tr style="text-align: center">
                            <td colspan="2"><h2><strong style="text-align: center"> More information</strong> about project</h2></td>
                          </tr>
                          <tr bgcolor="#48E57C" style="text-align: left">
                            <td colspan="2" bgcolor="#48E57C" style="text-align: left">Project Name</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"> <span style="text-align: left"></span><?php echo "$proname";?> </td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#48E57C" style="text-align: left">Hosted by</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"> <?php echo "$uname";?> </td>
                          </tr>
                          <tr bgcolor="#48E57C">
                            <td colspan="2" style="text-align: left">Description</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"> <?php echo "$shortdes";?> </td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#48E57C" style="text-align: left">Project Type</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><?php echo "$protype";?></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#48E57C" style="text-align: left">Technologies To Be Used</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"> <?php echo "$techuse";?> </td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#48E57C" style="text-align: left">Estimated Project Cost</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><span style="text-align: left"><?php echo "$procost";?></span></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#48E57C" style="text-align: left"><span style="text-align: left">Project Duration </span></td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><span style="text-align: left"><?php echo "$dur";?> Months</span></td>
                          </tr>
                          <tr style="text-align: left">
                            <td colspan="2" bgcolor="#48E57C">Min Tender Amount</td>
                          </tr>
                          <tr style="text-align: left">
                            <td colspan="2"><?php echo "$minamt";?></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#F4F871" style="text-align: center; font-weight: bold; font-size: 18px;">Bidding</td>
                          </tr>
                          <tr bgcolor="#48E57C">
                            <td width="227" bgcolor="#48E57C" style="text-align: center"> Start Date</td>
                            <td width="233" bgcolor="#48E57C" style="text-align: center">End Date</td>
                          </tr>
                          <tr>
                            <td style="text-align: center"> <?php echo "$bidstart";?> </td>
                            <td style="text-align: center"> <?php echo "$bidend";?> </td>
                          </tr>
                          <tr style="text-align: center; font-size: 18px; font-weight: bold;">
                            <td colspan="2" bgcolor="#F4F871">Requirements of the project</td>
                          </tr>
                          <tr style="text-align: center">
                            <td colspan="2"><a href="download.php?filename=<?php echo $requirementfile;?>">Requirement file</a></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center" bgcolor="#F4F871" style="font-size: 18px; font-weight: bold;">Do you want to Bid?</td>
                          </tr>
                          <?php
							  include("myconn.php");
							  $cuname = $_SESSION["cuname"];
							  $sql = "SELECT * from projectmaster where coderuname = '$cuname'";
							  $result = $conn->query($sql);
							  if($result->num_rows>3)
							  {
																  
							?>
                          <tr>
                            <td align="center"><a href="coderbiddingform.php?pid=<?php echo $proid; ?>">Yes</a></td>
                            <td align="center"><a href="codersearchproject.php?pid=<?php echo $proid;?>">No</a></td>
                          </tr>
                          </tbody> 
						  <?php
                          }
                          else
                          {
							  ?>
							<tr >
                            <td align="center" colspan="2"> You have already more than 2 pending projects you can't bid </td>
                            
                          </tr>
                          <?php
                          }
						  ?>
                        </tbody>
                      </table>
                      <p>&nbsp;</p>
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
	//establish connection
	include ("myconn.php");
	$proid=$_REQUEST["projectid"];
	$sql = "SELECT * from projectmaster where projectid = '$proid'";
	$result = $conn->query($sql);
	if($result->num_rows == 1)
	{
	      $_SESSION['cuname']=$uname;
		  echo "<script> if(confirm('Request proceed to bidding form')) window.location='coderbiddingform.php'; </script>";
	}
	else
	{
		echo "<script> alert('Request failed')</script>";
	}
}

?>
 