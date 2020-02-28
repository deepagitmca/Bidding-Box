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
    <title> Buyer edit project </title>
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
	function validation()
	{
		var biddingstart=document.getElementById("biddingstart");
		var biddingend=document.getElementById("biddingend");
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
		$proname = "";
		$shortdes = "";
		$techuse = "";
		$procost = "";
		$dur = "";	
		$bidstart = "";
		$bidend = ""; 
		$minamt = "";
		$protype = "";
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
				$shortdes = $row["shortdescription"];
				$techuse = $row["technologyused"];
				$procost = $row["projectcost"];
				$protype = $row["projecttype"];
				$dur = $row["duration"];	
				$bidstart = $row["biddingstart"];
				$bidend = $row["biddingend"]; 
				$minamt = $row["minimumamount"];	 	  
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
                  <td><form method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return validation(),valid()">
                      <table width="500" border="0" align="center" cellpadding="10" cellspacing="6">
                        <tbody>
                          <tr style="text-align: center">
                            <td colspan="2" bgcolor="#7CE0EC"><h2><strong>Edit  Project</strong></h2></td>
                          </tr>
                          <tr bgcolor="#48E57C" style="text-align: left">
                            <td colspan="2" align="center" bgcolor="#48E57C">Project Name</td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <input name="projectname" type="text" id="projectname" value="<?php echo "$proname";?>" size="52">                            </td>
                          </tr>
                          <tr bgcolor="#48E57C">
                            <td colspan="2" bgcolor="#48E57C" style="text-align: left">Description</td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <textarea name="shortdescription" cols="50" rows="5" id="shortdescription"><?php echo "$shortdes";?></textarea>                            </td>
                          </tr>
                          <tr>
                            <td width="191" bgcolor="#1AEF74">Project Type</td>
                            <td width="269" style="text-align: left"><select name="projecttype1" id="projecttype1" onChange="document.getElementById('projecttype').value=document.getElementById('projecttype1').value">
                              <option value="-1">Select Type</option>
                              <option value="Mobile Application">Mobile Application</option>
                              <option value="Website">Website</option>
                              <option value="Web Application">Web Application</option>
                              <option value="Desktop Application">Desktop Application</option>
                            </select>
                            <input name="projecttype" type="text" id="projecttype" value="<?php echo "$protype";?>" readonly></td>
                          </tr>
                          <tr>
                            <td bgcolor="#1AEF74">Technologies To Be Used</td>
                            <td style="text-align: left"><strong>
                              <textarea name="technologyused" required id="technologyused"><?php echo "$techuse";?></textarea>
                            </strong></td>
                          </tr>
                          <tr bgcolor="#1AEF74">
                            <td>Estimated Project Cost</td>
                            <td style="text-align: left">Project Duration </td>
                          </tr>
                          <tr>
                            <td><span style="text-align: left">
                              <input name="projectcost" type="text" required id="projectcost" value="<?php echo "$procost";?>">
                            </span></td>
                            <td style="text-align: left"><input name="duration" type="number" required id="duration" max="12" min="0" value="<?php echo "$dur";?>">
                              Months</td>
                          </tr>
                          <tr bgcolor="#C2EAF6" style="text-align: center">
                            <td colspan="2"><h4>Bidding</h4></td>
                          </tr>
                          <tr bgcolor="#48E57C">
                            <td style="text-align: left"> Start Date</td>
                            <td style="text-align: left">End Date</td>
                          </tr>
                          <tr style="text-align: center">
                            <td><span style="text-align: left">
                              <input name="biddingstart" type="text" id="biddingstart" value="<?php echo "$bidstart";?>">
                            </span></td>
                            <td><input name="biddingend" type="text" id="biddingend" value="<?php echo "$bidend";?>"></td>
                          </tr>
                          <tr>
                            <td>Min Tender Amount</td>
                            <td style="text-align: left"><input name="minamount" type="text" required id="minamount" value="<?php echo "$minamt";?>" size="52"></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td style="text-align: left"><input type="submit" name="submit" id="submit" value="Submit"></td>
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
  </script>
  </body>
 </html>
 
 <?php 
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$proname = $_REQUEST["projectname"];
		$shortdes = $_REQUEST["shortdescription"];
		$protype = $_REQUEST["projecttype"];
		$techuse = $_REQUEST["technologyused"];
		$procost = $_REQUEST["projectcost"];
		$dur = $_REQUEST["duration"];
		$bidstart = $_REQUEST["biddingstart"];
		$bidend = $_REQUEST["biddingend"];	
		$minamt = $_REQUEST["minamount"];
		
		$uname=$_SESSION["buname"];		
		include("myconn.php");
		
		$updatequery = "update projectmaster set projectname = '$proname',shortdescription = '$shortdes',projecttype = '$protype',technologyused = '$techuse',projectcost = '$procost',duration = '$dur', biddingstart = '$bidstart',biddingend = '$bidend',minimumamount = '$minamt' where projectid = '$proid'";
				   
		if($conn->query($updatequery)===TRUE)
		{
			echo "<script> if(confirm('Updated successful')) window.location='buyerviewproject.php';</script>";
		}
		else
		{
			echo "Error : " . $updatequery . "<br>" . $conn->error;
		}		
	$conn->close();
  }
?>
