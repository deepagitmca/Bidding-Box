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
	  </style>
  </head>
  <body>
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
                  <td>
                    <h3 style="text-align: center">Welcome <?php echo  $_SESSION['buname']; ?><br>
                      <br>
                    List of active project                    </h3>
                    <p style="color:#730608; text-align:center"><?php if(isset($_REQUEST["msg"]) )echo $_REQUEST["msg"]; ?> 
                    <?php
						include("myconn.php");
						$uname=$_SESSION["buname"];
						$sql="SELECT *from projectmaster where username = '$uname' and status = 'active'";
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?>
                    <table width="603" border="0" align="center" cellpadding="10" cellspacing="0">
                      <tbody>
                        <tr bgcolor="#9036A0" style="color: #F8F2F2">
                          <th width="70">Project id</th>
                          <th width="94">Project name</th>
                          <th width="121">Developer Name</th>
                          <th width="53">Project status</th>
                          <th width="48">Review and rate the coder</th>
                        </tr>
                        <?php 
						while($row=$result->fetch_assoc())
						{
						    ?>
                            <tr>
                              <td style="border-bottom:2px solid #9036A0" height="42"> <?php echo $row["projectid"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["projectname"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"> <?php echo $row["coderuname"];?> </td>
                              <td style="border-bottom:2px solid #9036A0"><?php echo $row["status"];?></td>
                              <td style="border-bottom:2px solid #9036A0"><a href="buyerratecoder.php?pid=<?php echo $row["projectid"];?>&pname=<?php echo $row["projectname"];?>&cname=<?php echo $row["coderuname"];?>">click here</a></td>
                            </tr>
                            <?php
                         }
						}
                            ?>
                      </tbody>
                  </table></td>
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