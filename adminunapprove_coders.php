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
    <title> Manage Coders </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
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
            <td bgcolor="#FFFFFF"> <?php include("admin_menu.php"); ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
             <table width="1000" border="0" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td><h2 style="color:#730608; text-align:center"><span style="text-align: center">Welcome <?php echo  $_SESSION['auname']; ?></span><br>
                    <br>
                    List of Unapproved Coders<br>
                    <br>
                    <?php if(isset($_REQUEST["msg"]) )echo $_REQUEST["msg"]; ?>
                      <?php
						include("myconn.php");
						$sql="SELECT *from coderlogin where status = 'pending'";
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?> 
                    </h2>
                    <table width="855" border="0" align="center" cellpadding="10" cellspacing="0">
                      <tbody>
                        <tr bgcolor="#9036A0" style="color: #F8F2F2">
                          <th width="91">Full Name</th>
                          <th width="188">Email</th>
                          <th width="104">Address</th>
                          <th width="139">Skills</th>
                          <th width="75">Username</th>
                          <th width="68">Approve </th>
                          <th width="50">Reject</th>
                        </tr>
                    	<?php 
						  while($row=$result->fetch_assoc())
						  {
							  $fullname=$row["fullname"];
							?>
                        <tr>
                          <td style="border-bottom:2px solid #9036A0" height="42"><?php echo $row["fullname"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["email"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["address"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["skills"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["username"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><a href="adminapprovecoders.php?uname=<?php echo $row["username"];?>">Approve</a></td>
                          <td style="border-bottom:2px solid #9036A0"> <a href="adminrejectcoders.php?uname=<?php echo $row["username"];?>">Reject</a></td>
                        </tr>
                        <?php
						}
						}
                             ?>
                      </tbody>
                    </table>
                    <p>&nbsp;</p>
                  <p>&nbsp;</p></td>
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