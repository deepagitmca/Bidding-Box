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
    <title> Coder bidding form </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
	   }
	  </style>
      <script>
  function datedifference(date1) {
	dt1 = new Date(date1);
	dt2 = new Date();
	return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
	}
	function validate()
	{
		var biddate=document.getElementById("biddate");
		if(datedifference(biddate.value)>0)
		{
			alert('Bid date cannot be less than today');
			biddate.focus();
			return false;
		}
		else if(datedifference(biddate.value)<0)
		{
			alert('Bid date cannot be more than today');
			biddate.focus();
			return false;
		}
	}
	</script>
	  <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	  <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	  <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
  </head>
  <?php 
        $proid = "";
		$proname = "";
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
				$proid = $row["projectid"];
				$proname = $row["projectname"];	
				$minimumamount = $row["minimumamount"];			
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
                  <td><form id="form1" name="form1" method="post" onSubmit="return validate()">
                    <h2 style="text-align: center">Welcome <?php echo  $_SESSION['cuname']; ?></h2>
                    <table width="500" border="0" align="center" cellpadding="10" cellspacing="0">
                      <tbody>
                        <tr bgcolor="#5FE5A8" style="text-align: center">
                          <td colspan="2">Bidding details</td>
                        </tr>
                        <tr>
                          <td width="184">Project id</td>
                          <td width="276"><input name="projectid" type="text" id="projectid" value="<?php echo "$proid";?>"></td>
                        </tr>
                        <tr>
                          <td>Project name</td>
                          <td><input name="projectname" type="text" id="projectname" value="<?php echo "$proname";?>"></td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td><input name="username" type="text" id="username" value="<?php echo "$uname";?>"></td>
                        </tr>
                        <tr>
                          <td>Bid amount</td>
                          <td><input name="bidamount" type="number" id="bidamount"  min="<?php echo $minimumamount; ?>" step="1000"></td>
                        </tr>
                        <tr>
                          <td>Bid date</td>
                          <td><input type="text" name="biddate" id="biddate"></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><input type="submit" name="submit" id="submit" value="Submit"></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                  </td>
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
	$( "#biddate" ).datepicker({
		dateFormat:"yy-mm-dd",
		changeMonth:true,
		changeYear:true
	}); 
});
    </script>
 </body>
 </html>
 
 <?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//establish connection
	include ("myconn.php");
	
	//accept the values from user form
	$proid = $_REQUEST["projectid"];
	$proname = $_REQUEST["projectname"];
	$uname = $_REQUEST["username"];
	$bidamt = $_REQUEST["bidamount"];
	$biddate = $_REQUEST["biddate"];

	include("myconn.php");
	
	    $sql="Select * from bidding where projectid = '$proid' and username = '$uname'";
		$result = $conn->query($sql);
		if($result->num_rows >=1 )
		{
			  echo "<script> alert('Bidding is already done') </script>";
		}
		else if($result->num_rows ==0 )
		{
		
		    $insertquery = "INSERT INTO bidding(projectid,projectname,username,bidamount,biddate) values('$proid','$proname','$uname','$bidamt','$biddate')";
				   
			if($conn->query($insertquery)===TRUE)
			{
				echo "<script> if(confirm('Bidding Successfully')) window.location='codersearchproject.php';</script>";
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

