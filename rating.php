<!doctype html>
<html>
<head>
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
  
</head>

<body>

<h1>Star Rating System Using PHP and JavaScript</h1>

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

<form action="" method="post" id="form1">
  <table width="605" border="0" cellspacing="0" cellpadding="10">
    <tbody>
      <tr>
        <td width="565">Total Votes:<?php echo $total;?></td>
        <td width="1">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#1492C7"><div class="div">
          <p>Average Rating  (<?php echo $total_php_rating;?>)</p>
          <input type="hidden" id="php1_hidden" value="1">
          <img src="images/star1.png" onmouseover="change(this.id);" id="php1" class="php">
          <input type="hidden" id="php2_hidden" value="2">
          <img src="images/star1.png" onmouseover="change(this.id);" id="php2" class="php">
          <input type="hidden" id="php3_hidden" value="3">
          <img src="images/star1.png" onmouseover="change(this.id);" id="php3" class="php">
          <input type="hidden" id="php4_hidden" value="4">
          <img src="images/star1.png" onmouseover="change(this.id);" id="php4" class="php">
          <input type="hidden" id="php5_hidden" value="5">
        <img src="images/star1.png" onmouseover="change(this.id);" id="php5" class="php"> </div></td>
      </tr>
      <tr>
        <td>Comments</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><textarea name="comments" cols="80" rows="6" id="comments"></textarea></td>
      </tr>
    </tbody>
  </table>
  <input type="hidden" name="phprating" id="phprating" value="0">
   
  <input type="submit" value="Submit" name="submit_rating">

</form> 

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

  $insert=$conn->query("insert into rating values('','$php_rating','$comments')") or die($conn->error);
	if($insert == TRUE){
		echo 'Success';
	}
}
?>