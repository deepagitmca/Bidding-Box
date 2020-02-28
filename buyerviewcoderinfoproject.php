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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buyer view coder info</title>
  <link href="menustyle.css" rel="stylesheet" type="text/css">
  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
	   }
	  </style>
  <link href="menustyle.css" rel="stylesheet" type="text/css">
  <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
  <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
  <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  </head>  
  <body>
    <div class="container">
      <table align="center" width="1002" border="0" cellspacing="0" cellpadding="0">
       <tbody>
        <tr>
          <td width="1002"  bgcolor="#FFFFFF"><?php include("header.php"); ?></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF"> <?php include("buyer_menu.php"); ?></td>
          </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>           
             <tr>
              <td width="969">
                <h2 style="text-align: center">Welcome <?php echo  $_SESSION['buname']; ?><br>
                </h2>
                <h2 style="text-align: center">List of Completed Projects <br> <br>
                <?php
						include("myconn.php");
						$uname = $_REQUEST["uname"];			
						$sql="Select *from projectmaster where coderuname = '$uname' and status = 'Completed'";						
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?> </h2>
                <table width="500" border="0" cellspacing="0" cellpadding="10">
                  <tbody>
                    <tr bgcolor="#9036A0" style="color: #F8F2F2">
                      <th>Coder Name</th>
                      <th>Project Name</th>
                      <th>Short Descrtiption</th>
                      <th>Duration</th>
                      </tr>
                      <?php 
						while($row=$result->fetch_assoc())
						{
							$uname = $row["coderuname"];
						    ?>
                      <tr>
                        <td  style="border-bottom:2px solid #9036A0" height="42"><?php echo $row["coderuname"];?></td>
                        <td  style="border-bottom:2px solid #9036A0"><?php echo $row["projectname"];?></td>
                        <td style="border-bottom:2px solid #9036A0"><?php echo $row["shortdescription"];?></td>
                        <td style="border-bottom:2px solid #9036A0"> <?php echo $row["duration"];?> </td>
                      </tr>                
                      <?php
                         }
						?>
                        <tr style="text-align: center">
                        <td style="border-bottom:2px solid #9036A0 height="42" colspan="4" > <a href="buyerviewcoderinfo.php?uname=<?php echo $_REQUEST["uname"];?>&pid=<?php echo $_REQUEST["pid"];?>"> Go Back </a> </td>
                      </tr>
                      <?php 
						}
					  ?>
                  </tbody>
                </table>
             </td> 
      </tr>
     </tbody>
    </table>
   </td>
  </tr>
      <tr>
        <td bgcolor="#FFFFFF"> <?php include("footer.php"); ?> </td>
     </tr>
    </tbody>
   </table>
  </div>
 </body>
</html>

