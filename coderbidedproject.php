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
            <td bgcolor="#FFFFFF"> <?php include("coder_menu.php"); ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
             <table width="1000" border="0" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td><h2 style="color:#730608; text-align:center"><span style="text-align: center">Welcome <?php echo  $_SESSION['cuname']; ?><br>
                    <br>
                    List of Bided Projects </span>
                    </h2>
                      <?php
						include("myconn.php");
						$uname = $_SESSION["cuname"];
						$sql="Select *from bidding where username = '$uname'";						
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?>
                    <br>
                    </span></h2>
                    <table width="726" border="0" align="center" cellpadding="10" cellspacing="0">
                      <tbody>
                        <tr bgcolor="#9036A0" style="color: #F8F2F2">
                          <th height="42">Project id</th>
                          <th>Project name</th>
                          <th>Bid date</th>
                          <th> Bid amount </th>
                        </tr>
                        <?php 
						while($row=$result->fetch_assoc())
						{
							$proid = $row["projectid"];
						    ?>
                        <tr>
                          <td style="border-bottom:2px solid #9036A0" height="42"><?php echo $row["projectid"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["projectname"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["biddate"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["bidamount"];?></td>
                        </tr>
                        <?php
                         }
						}
                            ?>
                      </tbody>
                    </table>
                    <p><br>
                    </p>
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
  </body>
 </html>