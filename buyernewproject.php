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
    <title> New Project </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
	   }
	  </style>
	  <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	  <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	  <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
  <script>
  function datedifference(date1) {
	dt1 = new Date(date1);
	dt2 = new Date();
	return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
	}
	
	function datedifference1(date1,date2) {
	dt1 = new Date(date1);
	dt2 = new Date(date2);
	return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
	}
	
	function validate()
	{
		var hostdate=document.getElementById("hostdate");
		if(datedifference(hostdate.value)>0)
		{
			alert('Hostdate cannot be less than today');
			hostdate.focus();
			return false;
		}
		else if(datedifference(hostdate.value)<0)
		{
			alert('Hostdate cannot be more than today');
			hostdate.focus();
			return false;
		}
	}
	function validation()
	{
		var biddingstart=document.getElementById("biddingstart");
		var biddingend=document.getElementById("biddingend");
		if(datedifference(biddingstart.value)>0)
		{
			alert('Bidding start Date cannot be less than today');
			biddingstart.focus();
			return false;
		}
		if(datedifference1(biddingend.value,biddingstart.value)>0)
		{
			alert('Bidding End Date cannot be less than Start Date');
			biddingend.focus();
			return false;
		}
	}
	function valid()
	{
		var projectcost = document.getElementById("projectcost");
		var minamount = document.getElementById("minamount");
		if((minamount.value)>(projectcost.value))
		{
			alert('Minimum tender amount should be less than estimated project cost');
			minamount.focus();
			return false;
		}
	}
	</script>
  </head>
  <?php 
	$uname=$_SESSION["buname"]; // fetch username from session variable
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
				$uname=$row["username"];
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
            <td bgcolor="#FFFFFF"> <?php include("buyer_menu.php"); ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
             <table width="1000" border="0" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td style="text-align: center"><strong>Welcome <?php echo  $_SESSION['buname']; ?></strong></td>
                </tr>
                <tr>
                  <td><form method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return validation(),validate(),valid()">
                    <table width="500" border="0" align="center" cellpadding="10" cellspacing="4">
                        <tbody>
                          <tr>
                            <td colspan="2" bgcolor="#D173EF"><h2><strong style="text-align: left">Host a new Project and Requirements</strong></h2></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Username</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><input name="username" type="text" id="username" value="<?php echo "$uname";?>" size="52" readonly></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Project Name</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><input name="projectname" type="text" required id="projectname" size="52"></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Short Description</td>
                          </tr>
                          <tr style="text-align: left">
                            <td colspan="2"><span style="text-align: left">
                              <textarea name="shortdescription" cols="50" rows="5" required id="shortdescription"></textarea>
                            </span></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Project Type</td>
                          </tr>
                          <tr style="text-align: left">
                            <td colspan="2"><span style="text-align: left">
                              <select name="projecttype" required id="projecttype">
                                <option value="-1">Select Type</option>
                                <option value="Mobile Application">Mobile Application</option>
                                <option value="Website">Website</option>
                                <option value="Web Application">Web Application</option>
                                <option value="Desktop Application">Desktop Application</option>
                              </select>
                            </span></td>
                          </tr>
                          <tr style="text-align: left">
                            <td colspan="2" bgcolor="#65F7C2">Technologies To Be Used</td>
                          </tr>
                          <tr style="text-align: left">
                            <td colspan="2"><textarea name="technologyused" required id="technologyused"></textarea></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Estimated Project Cost</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><input name="projectcost" type="text" required id="projectcost" size="52"></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Project Duration </td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><input name="duration" type="number" required id="duration" max="12" min="0">
                            Months</td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Requirement File</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><input name="requiredfile" type="file" required id="requiredfile"></td>
                          </tr>
                          <tr bgcolor="#98CC49" style="text-align: center">
                            <td colspan="2" bgcolor="#DAC6E5">Bidding</td>
                          </tr>
                          <tr>
                            <td width="191" bgcolor="#65F7C2" style="text-align: left"> Starts date</td>
                            <td width="269" bgcolor="#65F7C2" style="text-align: left"> End date</td>
                          </tr>
                          <tr>
                            <td style="text-align: left"><span style="text-align: left">
                              <input name="biddingstart" type="text" required id="biddingstart">
                            </span></td>
                            <td style="text-align: left"><input name="biddingend" type="text" required id="biddingend"></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Min Tender Amount</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><input name="minamount" type="text" required id="minamount" size="52"></td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#65F7C2" style="text-align: left">Host date</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align: left"><input type="text" name="hostdate" required id="hostdate"></td>
                          </tr>
                          <tr bgcolor="#DAC6E5" style="text-align: center">
                            <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit"></td>
                          </tr>
                        </tbody>
                      </table>
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
  <script type="text/javascript">
$(function() {
	$( "#biddingstart" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd"
	}); 
});
$(function() {
	$( "#biddingend" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd"
	}); 
});
$(function() {
	$( "#hostdate" ).datepicker({
		dateFormat:"yy-mm-dd"
	}); 
});
  </script>
  </body>
 </html>
 
 <?php 
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$uname = $_SESSION["buname"];
		
		$proname = $_REQUEST["projectname"];
		$shortdes = $_REQUEST["shortdescription"];
		$protype = $_REQUEST["projecttype"];
		$techuse = $_REQUEST["technologyused"];
		$procost = $_REQUEST["projectcost"];
		$dur = $_REQUEST["duration"];
		$bidstart = $_REQUEST["biddingstart"];
		$bidend = $_REQUEST["biddingend"];	
		$minamt = $_REQUEST["minamount"];
		$hostdate = $_REQUEST["hostdate"];
				
		include("myconn.php");
		
		$errors = array();
		$file_name = $_FILES['requiredfile']['name'];
		$file_size = $_FILES['requiredfile']['size'];
		$file_tmp = $_FILES['requiredfile']['tmp_name'];
		$file_type = $_FILES['requiredfile']['type'];
	
		$allowed = array("pdf" => "document/pdf", "doc" => "document/doc");
	
		// Verify file extension
	
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	
		if(!array_key_exists($ext, $allowed)) die("Error: Please select valid file format. ");
		move_uploaded_file($file_tmp,"uploads/".$file_name);
	
	    $sql="Select * from projectmaster where projectname = '$proname'";
		$result = $conn->query($sql);
		if($result->num_rows >=1 )
		{
			  echo "<script> alert('Project already exists') </script>";
		}
		else if($result->num_rows ==0 )
		{
		
		    $insertquery = "INSERT INTO projectmaster(username,projectname,shortdescription,projecttype,technologyused,projectcost,duration,requirementfile,biddingstart,biddingend,minimumamount,hostdate) values('$uname','$proname','$shortdes','$protype','$techuse','$procost','$dur','$file_name','$bidstart','$bidend','$minamt','$hostdate')";
				   
			if($conn->query($insertquery)===TRUE)
			{
				echo "<script> if(confirm('new project added successfully')) window.location='buyerdashboard.php';</script>";
			}
			else
			{
				echo "Error : " . $insertquery . "<br>" . $conn->error;
			}
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
  }
?>
