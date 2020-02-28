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
    <title> Buyer rate coder </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(code-wallpaper-24.jpg);
	   }
	  </style>
      <link rel="stylesheet" type="text/css" href="ratingstyle.css">
  <script type="text/javascript">
  
   function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById(cname+"rating").value=ab;
	   

      for(var i=ab;i>=1;i--)
      {
         document.getElementById(cname+i).src="star2.png";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById(cname+j).src="star1.png";
      }
   }

</script>
<?php 
		$proname = "";
		$proid = "";
		$coderuname = "";
		$uname=$_SESSION["buname"]; // fetch username from session variable
	
	// Establish connection with database
	include("myconn.php");
	$proid=$_REQUEST["pid"];
	$proname=$_REQUEST["pname"];
	$coderuname=$_REQUEST["cname"];
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
				$coderuname = $row["coderuname"];					 	  
			}
		}
		else
		{
			echo "<script> alert('Invalid user. Please login to access the feature ') </script>";
		}
				
  ?>
  
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
                  <td><h1 style="text-align: center"> Welcome <?php echo  $_SESSION['buname'];?> </h1>
                    <p>
                      <?php
						$host="localhost";
						$username="root";
						$password="";
						$databasename="biddingboxdb";
					
						$conn= new mysqli($host, $username, $password,$databasename);
											
						$select_rating=$conn->query("select * from rating");
						$total=$select_rating->num_rows;
					    $i=0;
						while($row = $select_rating->fetch_assoc())
						{
						  $phpar[$i]=$row['rating'];$i++;
						}
						if($total ==0)
						{
							$total_php_rating=0;
						}
						else
						{
							$total_php_rating=(array_sum($phpar)/$total);
						}					  
					?> 
                      
                    </p>
                    <form action="" method="post" id="form1">
                      <table width="533" border="0" cellspacing="4" cellpadding="10">
                        <tbody>
                          <tr style="text-align: center; font-weight: bold;">
                            <td bgcolor="#D4AAEC"><h2>Rating for Coder<span style="text-align: center"></span></h2></td>
                          </tr>
                          <tr>
                            <td bgcolor="#59EDBD" style="text-align: left">Buyer name</td>
                          </tr>
                          <tr>
                            <td style="text-align: left"> <?php echo "$uname";?> </td>
                          </tr>
                          <tr>
                            <td bgcolor="#59EDBD" style="text-align: left">Coder name</td>
                          </tr>
                          <tr>
                            <td style="text-align: left"> <?php echo "$coderuname";?> </td>
                          </tr>
                          <tr>
                            <td bgcolor="#59EDBD" style="text-align: left">Project id</td>
                          </tr>
                          <tr>
                            <td style="text-align: left"> <?php echo "$proid";?> </td>
                          </tr>
                          <tr>
                            <td bgcolor="#59EDBD" style="text-align: left">Project name</td>
                          </tr>
                          <tr>
                            <td style="text-align: left"> <?php echo "$proname";?> </td>
                          </tr>
                          <tr>
                            <td bgcolor="#59EDBD" style="text-align: left">Total Votes:<?php echo $total;?></td>
                          </tr>
                          <tr bgcolor="#EAF4F8">
                            <td style="text-align: left"><div class="div">
                              <p>Average Rating </p>
                              <input type="hidden" id="php1_hidden" value="1">
                              <img src="star1.png" onmouseover="change(this.id);" id="php1" class="php">
                              <input type="hidden" id="php2_hidden" value="2">
                              <img src="star1.png" onmouseover="change(this.id);" id="php2" class="php">
                              <input type="hidden" id="php3_hidden" value="3">
                              <img src="star1.png" onmouseover="change(this.id);" id="php3" class="php">
                              <input type="hidden" id="php4_hidden" value="4">
                              <img src="star1.png" onmouseover="change(this.id);" id="php4" class="php">
                              <input type="hidden" id="php5_hidden" value="5">
                            <img src="star1.png" onmouseover="change(this.id);" id="php5" class="php"> </div></td>
                          </tr>
                          <tr>
                            <td bgcolor="#59EDBD" style="text-align: left">Comments</td>
                          </tr>
                          <tr>
                            <td style="text-align: left"><textarea name="comments" cols="80" rows="6" id="comments"></textarea></td>
                          </tr>
                          <tr>
                            <td style="text-align: left"><input type="hidden" name="phprating" id="phprating" value="0">                              <input type="submit" value="Submit" name="submit_rating"></td>
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
  </body>
 </html>
 
 <?php
if(isset($_POST['submit_rating']))
{
    $host="localhost";
    $username="root";
    $password="";
    $databasename="biddingboxdb";

    $conn=new mysqli($host,$username,$password,$databasename);
  
    $php_rating=$_POST['phprating'];
	$comments=$_POST['comments'];

    $insert=$conn->query("insert into rating values('$uname','$coderuname','$proid','$proname','$php_rating','$comments')") or die($conn->error);
	if($insert===TRUE)
	{
		echo "<script> if(confirm('Rated successful')) window.location='buyeractiveproject.php';</script>";
	}
	else
	{
		echo "Error : " . $sql . "<br>" . $conn->error;
	}
}
?>