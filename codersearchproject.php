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
	   input[type="text"]
	   {
		   border:2px solid black;
		   background:white;
		   width:400px;
		   padding:6px 20px;
	   }
	   	input[type="submit"]
	   {
		   border:2px solid black;
		   background:none;
		   width:auto;
		   padding:6px 20px;
	   }

	  </style>
      <link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    
<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>
  </head>
  <body>
   <p>&nbsp;</p>
  
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
                  <td align="center"><form id="form1" name="form1" method="post">
                    <h2 style="text-align: center">Welcome <?php echo  $_SESSION['cuname']; ?><br>
                    </h2>
                    <h2 style="text-align: center; font-family: inherit;">List of Projects</h2>
                    <table width="500" border="0" align="center" cellpadding="4" cellspacing="4">
                    <div class="form-group pull-right"> 
                      <tbody>
                        <tr>
                          <td><input type="text" class="search form-control" placeholder="Type here to search"> </td>
                          <td bgcolor="#E9D8F1"><input type="submit" name="submit" id="submit" value="Submit"></td>
                        </tr>
                      </tbody>
                      </div>
                    </table>
                    <br>
                    <table width="600" border="0" align="center" cellpadding="10" cellspacing="0" class="table table-striped" id="userTbl">
                     <thead>
                        <tr bgcolor="#9036A0" style="color: #F8F2F2">
                          <th width="62">Project id</th>
                          <th width="91">Project name</th>
                          <th width="121">Short Description</th>
                          <th width="105">Technologies used</th>
                          <th width="110">Project type</th>
                          <th width="102">More info <br>
                            about project</th>
                          <th width="107"><p>More info<br>
                            about buyer </p></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
						include("myconn.php");
						$sql="SELECT *from projectmaster where status = 'pending'";
						$result=$conn->query($sql);
						while($row=$result->fetch_assoc())
						{
							$proid=$row["projectid"];
						    ?>
                        <tr>
                          <td style="border-bottom:2px solid #9036A0" height="42"><?php echo $row["projectid"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["projectname"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["shortdescription"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["technologyused"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><?php echo $row["projecttype"];?></td>
                          <td style="border-bottom:2px solid #9036A0"><a href="coderprojectmoreinfo.php?pid=<?php echo $row["projectid"];?>">Click here</a></td>
                          <td style="border-bottom:2px solid #9036A0"><a href="coderviewbuyerinfo.php?uname=<?php echo $row["username"];?>">Click here</a></td>
                        </tr>
                        <?php
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

  </body>
 </html>
 