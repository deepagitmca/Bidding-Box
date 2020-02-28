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
    <title> Coder update profile </title>
	 <style type="text/css">
        body 
        {
            background-image: url(code-wallpaper-24.jpg);
        }
     </style>
    <link href="menustyle.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script><script language="javascript">
		function validate()
		{
			pass=document.getElementById("password");
			cpass=document.getElementById("confirmpassword");
			if(pass.value.trim()!=cpass.value.trim())
			{
				alert('Password Mismatch');
				cpass.focus();
				return false;
			}
		}
	</script>
  </head>
  <?php 
    $fullname = "";
	$email = "";
	$mobno = "";
	$address = "";	
	// fetch username from session variable
	$uname=$_SESSION["cuname"];
	// Establish connection with database
	include("myconn.php");
	// create a select query
	$sql="Select *from coderlogin where username = '$uname'";
	// Execute the query
	$result = $conn->query($sql);
	// Check if it has returned atleast one row
		if($result->num_rows > 0 )
		{
			// fetch 1 by 1 record from the result and store it in $row array.
			while($row=$result->fetch_assoc())
			{
				$fullname = $row["fullname"];
				$email = $row["email"];
				$mobno = $row["mobileno"];
				$address = $row["address"];			
			}
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
		}
				
  ?>
  <body>
    <div class="container">
      <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
       <tbody>
        <tr>
          <td bgcolor="#FFFFFF"><?php include("header.php"); ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php include("coder_menu.php"); ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>
             <tr>
               <td>
                 <form id="form1" name="form1" method="post" onSubmit="return validate()" enctype="multipart/form-data">
                 <h2 style="text-align: center; color: #000000;"><span style="text-align: center">Welcome <?php echo  $_SESSION['cuname']; ?></span><br> </h2>
                 <table width="461" border="0" align="center" cellpadding="5" cellspacing="10">
                   <tbody>
                     <tr>
                       <td colspan="3" bgcolor="#E6BDF6" style="text-align: center"> <h2>Coder Update Profile Form </h2></td>
                       </tr>
                     <tr>
                       <td width="154" bgcolor="#A8F6DA">Full Name</td>
                       <td colspan="2"><input name="fullname" type="text" required="required" id="fullname" pattern="[a-zA-Z\s]+" title="Accepts lowercase,uppercase &amp; space" value="<?php echo "$fullname";?>"></td>
                       </tr>
                     <tr>
                       <td bgcolor="#A8F6DA">Email</td>
                       <td colspan="2"><input name="email" type="email" required="required" id="email" value="<?php echo "$email";?>"></td>
                       </tr>
                     <tr>
                       <td bgcolor="#A8F6DA">Mobile No. </td>
                       <td colspan="2"><input name="mobileno" type="text" required="required" id="mobileno" pattern="(9|8|7)\d{9}" value="<?php echo "$mobno";?>"></td>
                       </tr>
                     <tr>
                       <td bgcolor="#A8F6DA">Address</td>
                       <td colspan="2"><textarea name="address" required id="address"><?php echo "$address";?></textarea></td>
                       </tr>
                     <tr>
                       <td bgcolor="#A8F6DA">Skills</td>
                       <td width="110"><p>
                         <label>
                           <input type="checkbox" name="skills[]" value="C" id="skills_0"></label>
                         <label>
                         C</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="C++" id="skills_1">
                           C++</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="Java" id="skills_2">
                           Java</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="Shellscript" id="skills_3">
                           Shell script</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="Unix" id="skills_4">
                           Unix</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="Linux" id="skills_5">
                           Linux<br>
  <input type="checkbox" name="skills[]" value="Android" id="skills_13">
                           Android </label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="R" id="skills_14">
                           R </label>
                         <label> </label>
                         <br>
                         <input type="checkbox" name="skills[]" value="Wordpress" id="skills_17">
Wordpress <br>
                         </p></td>
                       <td width="127"><label>
                         <input type="checkbox" name="skills[]" value="VB.Net" id="skills_6"></label>
                         <label>
                         VB.NET</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="C#.Net" id="skills_8">
                           C#.NET</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="HTML" id="skills_9">
                           HTML</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="CSS" id="skills_10">
                           CSS</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="ASP.NET" id="skills_11">
                           ASP.NET</label>
                         <br>
                         <label>
                           <input type="checkbox" name="skills[]" value="Python" id="skills_12">
                           Python</label>
                         <br>
                         <label>
                           <input name="skills[]" type="checkbox" id="skills_15" value="Ruby">
                           Ruby<br>
  <input type="checkbox" name="skills[]" value="Pascal" id="skills_16">
                           Pascal </label>
                         <br>
                         <label>
                           <input name="skills[]" type="checkbox" id="skills_18" value="Cobol">
                          Cobol </label></td>
                       </tr>
                     <tr>
                       <td bgcolor="#A8F6DA">Username</td>
                       <td colspan="2"><input name="username" type="text" required="required" id="username" pattern="[a-z]{1,15}" title="only lowercase min 1 &amp; max 20 characters" value="<?php echo "$uname";?>" maxlength="15"></td>
                       </tr>
                     <tr bgcolor="#E6BDF6" style="text-align: center">
                       <td colspan="3"><input type="submit" name="submit" id="submit" value="submit"></td>
                       </tr>
                     </tbody>
                   </table>
                 <p>&nbsp;</p>
                 </form>
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

<?php 
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$fullname=$_REQUEST["fullname"];
		$email=$_REQUEST["email"];
		$mobno=$_REQUEST["mobileno"];
		$address=$_REQUEST["address"];
		$skills=$_REQUEST["skills"];
		$uname=$_REQUEST["username"];
	
		include("myconn.php");
	
		if(isset($_POST['submit']))
	    {
			$checkbox1=$_POST['skills'];
			$chk="";
			foreach($checkbox1 as $chk1)
			{
				$chk .= $chk1.",";
			}			
		 }		
			$updatequery = "update coderlogin set fullname='$fullname', email='$email',mobileno='$mobno',address='$address',skills='$chk' where username='$uname'";
		if($conn->query($updatequery)===TRUE)
		{
			echo "<script> if(confirm('Updated successful')) window.location='coderdashboard.php';</script>";
		}
		else
		{
			echo "Error : " . $updatequery . "<br>" . $conn->error;
		}
	}
	$conn->close();
?>