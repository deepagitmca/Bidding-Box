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
    <title> Admin manage project </title>
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
                  <td><h2 style="text-align: center">Welcome <?php echo  $_SESSION['auname']; ?><br>
                    <br>
                    List of Projects Hosted by Buyer<br>
                    <br>
<?php
						include("myconn.php");
						$sql="SELECT *from projectmaster";
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?>
                  </h2>
                    <table width="750" border="0" align="center" cellpadding="10" cellspacing="0">
                    <tbody>
                      <tr bgcolor="#9036A0" style="color: #F8F2F2">
                        <th>Buyer Username</th>
                        <th>Coder Username</th>
                        <th>Project id</th>
                        <th>Project name</th>
                        <th>Hosted date</th>
                      </tr>
                      <?php 
						while($row=$result->fetch_assoc())
						{
							$proid=$row["projectid"];
						    ?>
                      <tr>
                        <td style="border-bottom:2px solid #9036A0" height="42"><?php echo $row["username"];?></td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["coderuname"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["projectid"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["projectname"];?> </td>
                                <td style="border-bottom:2px solid #9036A0"> <?php echo $row["hostdate"];?> </td>
                            </tr>
                            <?php
                         }
						}
                            ?>
                    </tbody>
                  </table>
                  <p><br>
                    <br>
                  </p></td>
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