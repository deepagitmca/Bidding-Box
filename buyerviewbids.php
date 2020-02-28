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
    <title> Buyer view project </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
	   }
	   input[type="text"]
	   {
		   width:400px;
		   padding:12px 20px;
		   border:2px solid blue;
		   border-radius:25px;
	   }
	   input[type="submit"]
	   { width:auto;
	   background:blue;
	   padding:12px 20px;
	   color:white;
	   border-radius:25px   
	   }
	</style>
  </head>
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
                  <td style="text-align: center"><h2>Welcome <?php echo  $_SESSION['buname']; ?></h2>
                    <h2 style="text-align: center"> List of Bids </h2>
                    <table width="794" border="0" align="center" cellpadding="10" cellspacing="0">
                    <tbody>
                     <?php
						include("myconn.php");
						$proid = $_REQUEST["pid"];					
						$sql="Select *from bidding where projectid = '$proid'";						
						$result=$conn->query($sql);
						$sql1="Select *from bidding where status = 'reject'";						
						$result1=$conn->query($sql1);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?>
                        <tr bgcolor="#9036A0" style="color: #F8F2F2">
                          <th width="84">Coder name</th>
                          <th width="57">Bid date</th>
                          <th width="88"> Bid amount </th>
                          <th width="136">More info about coders</th>
                          <th width="91">View Ratings</th>
                          <th width="91">Approve</th>
                          <th width="91">Reject</th>
                        </tr>
                       <?php 
						while($row=$result->fetch_assoc())
						{
							$proid = $row["projectid"];
						    ?>
                            <tr>
                              <td style="border-bottom:2px solid #9036A0" height="42"> <?php echo $row["username"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["biddate"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["bidamount"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"><a href="buyerviewcoderinfo.php?pid=<?php echo $row["projectid"];?>&uname=<?php echo $row["username"];?>">Profile</a></td>
                              <td style="border-bottom:2px solid #9036A0"><a href="buyerviewrating.php?uname=<?php echo $row["username"];?>">Click here</a></td>
                               <td style="border-bottom:2px solid #9036A0"><a href="buyerapprovemail.php?pid=<?php echo $row["projectid"];?>&uname=<?php echo $row["username"];?>">Approve</a></td>
                              <td style="border-bottom:2px solid #9036A0"><a href="buyerrejectmail.php?pid=<?php echo $row["projectid"];?>&uname=<?php echo $row["username"];?>">Reject</a></td>
                            </tr>
                            <?php
                         }
						}
                            ?>
                      </tbody>
                    </table>
                  <br></td>
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
 