<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
    <title> Buyer Register </title>
	 <style type="text/css">
        body 
        {
            background-image: url(code-wallpaper-24.jpg);
        }
     </style>
    <link href="menustyle.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
  <script language="javascript">
  function datedifference(date1) 
  {
	dt1 = new Date(date1);
	dt2 = new Date();
	return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
  }
	function validate()
	{
		var dateofbirth=document.getElementById("dateofbirth");
		if(datedifference(dateofbirth.value)<0)
		{
			alert('Invalid date of birth');
			dateofbirth.focus();
			return false;
		}
		pass=document.getElementById("password");
		cpass=document.getElementById("confirmpassword");
		if(pass.value.trim()!=cpass.value.trim())
		{
			alert('Password Mismatch');
			pass.focus();
			cpass.focus();
			return false;
		}
	}
	</script>
    <script language="javascript">
	function getAge() 
	{
		var dateofbirth=document.getElementById("dateofbirth");
		
		var today = new Date();
		var nowyear = today.getFullYear();
		var nowmonth = today.getMonth();
		var nowday = today.getDate();
		var birth=new Date(dateofbirth.value);
		var birthyear = birth.getFullYear();
		var birthmonth = birth.getMonth();
		var birthday = birth.getDate();

		var age = nowyear - birthyear;
		if(age<18)
		{
			alert('Minimum age must be 18');
			dateofbirth.focus();
			return false;
		}
	  }
</script>
  </head>
  <body>
  <div class="container">
    <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td bgcolor="#FFFFFF"><?php include("header.php"); ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php include("navmenu.php"); ?></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
           <table width="1000" border="0" cellspacing="0" cellpadding="10">
            <tbody>
              <tr>
                <td><form method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return validate(),getAge()">
                  <table width="424" border="0" align="center" cellpadding="5" cellspacing="10">
                    <tbody>
                      <tr>
                        <td bgcolor="#BF44E7" style="text-align: center"><h2>Buyer Registration Form</h2></td>
                      </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Full Name</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input name="fullname" type="text" required="required" id="fullname" pattern="[a-zA-Z\s]+" title="Accepts lowercase,uppercase &amp; space"></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Profile photo</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input name="profilephoto" type="file" required="required" id="profilephoto"></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">DOB</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input type="text" required id="dateofbirth" name="dateofbirth"></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Email</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input name="email" type="email" required="required" id="email" title="Please enter proper email format"></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Mobile No. </td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input name="mobileno" type="tel" required id="mobileno" pattern="(9|8|7)\d{9}" title="Phone number should contain 10 digits starting with 9, 8 or 7"></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Address</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><textarea name="address" required id="address"></textarea></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Username</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input name="username" type="text" required="required" id="username" pattern="[a-z]{1,15}" title="only lowercase min 1 &amp; max 20 characters" maxlength="15"></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Password</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input name="password" type="password" required="required" id="password" pattern="[a-zA-Z0-9@$#!]{8,20}" title="Lowercase, Uppercase @,$,! special symbols min 8 and max 20 characters" maxlength="20"></td>
                        </tr>
                      <tr>
                        <td bgcolor="#48E57C" style="text-align: left">Confirm Password</td>
                        </tr>
                      <tr>
                        <td style="text-align: left"><input name="confirmpassword" type="password" required="required" id="confirmpassword" pattern="[a-zA-Z0-9@$#!]{8,20}" title="Lowercase, Uppercase @,$,! special symbols min 8 and max 20 characters"></td>
                        </tr>
                      <tr bgcolor="#E8ADF5" style="text-align: center">
                        <td><input type="submit" name="submit" id="submit" value="submit"></td>
                        </tr>
                    </tbody>
                </table>
                </form></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      <p>&nbsp;</p>
            <p>&nbsp;</p>
            <tr>
              <td bgcolor="#FFFFFF"><?php include("footer.php"); ?></td>
            </tr>
           </tbody>
    </table>
  </div>  
  <script type="text/javascript">
$(function() {
	$( "#dateofbirth" ).datepicker({
		dateFormat:"yy-mm-dd",
		changeMonth:true,
		changeYear:true
	}); 
});
  </script>
 </body>
</html>

<?php 
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$fullname=$_REQUEST["fullname"];
		$dob=$_REQUEST["dateofbirth"];
		$email=$_REQUEST["email"];
		$mobno=$_REQUEST["mobileno"];
		$address=$_REQUEST["address"];
		$uname=$_REQUEST["username"];
		$pass=$_REQUEST["password"];
		$cpass=$_REQUEST["confirmpassword"];
	
		include("myconn.php");
		
		$errors = array();
		$file_name = $_FILES['profilephoto']['name'];
		$file_size = $_FILES['profilephoto']['size'];
		$file_tmp = $_FILES['profilephoto']['tmp_name'];
		$file_type = $_FILES['profilephoto']['type'];
	
		$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf" => "document/pdf");
	
		// Verify file extension
	
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	
		if(!array_key_exists($ext, $allowed)) die("Error: Please select valid file format. ");
		move_uploaded_file($file_tmp,"uploads/".$file_name);
	
		$sql="Select * from buyerlogin where username='$uname'";
		$result = $conn->query($sql);
		if($result->num_rows >=1 )
		{
			  echo "<script> alert('Buyer Already Registered') </script>";
		}
		else if($result->num_rows ==0 )
		{
				$insertquery = "INSERT INTO buyerlogin(fullname,profilephoto,dateofbirth,email,mobileno,address,username,password) values('$fullname','$file_name','$dob','$email','$mobno','$address','$uname','$pass')";
				   
				if($conn->query($insertquery)===TRUE)
				{
					echo "<script> if(confirm('Registration successful')) window.location='buyerlogin.php';</script>";
				}
				else
				{
					echo "Error : " . $sql . "<br>" . $conn->error;
				}
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
		}
		
	$conn->close();
	}
?>
