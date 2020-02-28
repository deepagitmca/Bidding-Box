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
    <title> Buyer view rating </title>
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
            <td bgcolor="#FFFFFF"> <?php include("buyer_menu.php"); ?></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
             <table width="1000" border="0" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td style="text-align: center"><h2>Welcome <?php echo  $_SESSION['buname']; ?>
                    </h2>
                    <h2 style="text-align: center">Rating Details</h2>
                    <?php
						include("myconn.php");
						$coderuname = $_REQUEST["uname"];					
						$sql="Select *from rating where codername = '$coderuname'";						
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?> 
                    <table width="424" border="0" align="center" cellpadding="10" cellspacing="0">
                    <tbody>
                        <tr bgcolor="#9036A0" style="color: #F8F2F2">
                          <th width="84">Coder name</th>
                          <th width="57">Project name</th>
                          <th width="57">Rating</th>
                          <th width="57">Comennts</th>
                          <th width="57">Buyer name</th>
                        </tr> 
                        <?php 
						while($row=$result->fetch_assoc())
						{
							$coderuname = $row["codername"];
						    ?>
                            <tr>
                              <td style="border-bottom:2px solid #9036A0" height="42"> <?php echo $row["codername"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["projectname"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["rating"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["comments"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["buyername"];?></td>
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