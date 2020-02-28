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
                      <span style="text-align: center">List of active Projects</span><br>
                    <?php
						include("myconn.php");
						$coderuname = $_SESSION["cuname"];
						$sql="SELECT *from projectmaster where status = 'active' and coderuname = '$coderuname'";
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?>
                    </span><br>
                      <br>
                    </h2>
                    <table width="854" border="0" align="center" cellpadding="10" cellspacing="0">
                      <tbody>
                        <tr bgcolor="#9036A0" style="color: #F8F2F2">
                          <th width="65">Project<br>
id</th>
                          <th width="130">Project<br>
name</th>
                          <th width="460">Short<br>
Description</th>
                          <th width="119"><p>Update status <br>
                          of the project</p></th>
                        </tr>
                        <?php 
						while($row=$result->fetch_assoc())
						{
							$proid=$row["projectid"];
						    ?>
                        <tr>
                          <td style="border-bottom:2px solid #9036A0" height="42"><?php echo $row["projectid"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["projectname"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["shortdescription"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><a href="coderupdateprojectstatus.php?pid=<?php echo $row["projectid"];?>">Update</a></td>
                        </tr>
                        <?php
                         }
						}
                            ?>
                      </tbody>
                    </table>
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