<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
    <title> Coder Register </title>
	 <style type="text/css">
        body 
        {
            background-image: url(code-wallpaper-24.jpg);
        }
     </style>
    <link href="menustyle.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
    <link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
    <link href="jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
    <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
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
              <td><form id="form1" name="form1" method="post" onSubmit="return validate(),getAge()" enctype="multipart/form-data">
        	   <p>&nbsp;</p>
          	    <table width="500" border="0" align="center" cellpadding="5" cellspacing="10">
                 <tbody>
                  <tr>
                    <td colspan="3" bgcolor="#BF44E7" style="text-align: center"><h2>Coder Registration Form</h2></td>
                  </tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">Full Name</td>
                    </tr>
                  <tr>
                	<td colspan="3"><input name="fullname" type="text" required="required" id="fullname" pattern="[a-zA-Z\s]+" title="Accepts lowercase,uppercase &amp; space"></td>
                	</tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">Profile photo</td>
                    </tr>
                  <tr>
                    <td colspan="3"><input name="profilephoto" type="file" required="required" id="profilephoto"></td>
                    </tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">DOB</td>
                    </tr>
                  <tr>
                    <td colspan="3"><input name="dateofbirth" type="text" id="dateofbirth"></td>
                    </tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">Email</td>
                    </tr>
                  <tr>
                    <td colspan="3"><input name="email" type="email" required="required" id="email" title="Please enter proper email format"></td>
                    </tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">Mobile No. </td>
                    </tr>
                  <tr>
                    <td colspan="3"><input name="mobileno" type="text" required="required" id="mobileno" pattern="(9|8|7)\d{9}" title="Phone number should contain 10 digits starting with 9, 8 or 7"></td>
                    </tr>
                  <tr>
                   <td colspan="3" bgcolor="#48E57C">Address</td>
                   </tr>
                  <tr>
                    <td colspan="3"><textarea name="address" required id="address"></textarea></td>
                    </tr>
                  <tr>
                  <td colspan="3" bgcolor="#48E57C">Skills</td>
                  </tr>
                  <tr>
                    <td width="154"><label>
                      <input type="checkbox" name="skills_" value="C" id="skills_0">
                      C</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills_" value="C++" id="skills_1">
                        C++</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills_" value="Java" id="skills_2">
                        Java</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills_" value="Shellscript" id="skills_3">
                        Shell script</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills_" value="Unix" id="skills_4">
                        Unix</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills_" value="Linux" id="skills_5">
                        Linux<br>
  <input type="checkbox" name="skills_" value="Android" id="skills_13">
                        Android </label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills_" value="R" id="skills_14">
                        R </label>
                      <label> </label>
                      <br>
                      <input type="checkbox" name="skills_" value="Wordpress" id="skills_17">
Wordpress <br></td>
                    <td colspan="2"><label>
                      <input type="checkbox" name="skills[]" value="VB.Net" id="skills_6">
                      VB.NET</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills[]" value="C#.Net" id="skills_7">
                        C#.NET</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills[]" value="HTML" id="skills_8">
                        HTML</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills[]" value="CSS" id="skills_9">
                        CSS</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills[]" value="ASP.NET" id="skills_10">
                        ASP.NET</label>
                      <br>
                      <label>
                        <input type="checkbox" name="skills[]" value="Python" id="skills_11">
                        Python</label>
                      <br>
                      <label>
                        <input name="skills[]" type="checkbox" id="skills_12" value="Ruby">
                        Ruby<br>
  <input type="checkbox" name="skills[]" value="Pascal" id="skills_15">
                        Pascal </label>
                      <br>
                      <label>
                        <input name="skills[]" type="checkbox" id="skills_16" value="Cobol">
                        Cobol </label>
                      <label></label></td>
                  </tr>
                  <tr>
                   <td colspan="3" bgcolor="#48E57C">Experiance/More info</td>
                   </tr>
                  <tr>
                    <td colspan="3"><textarea name="experiance" id="experiance"></textarea></td>
                    </tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">Username</td>
                    </tr>
                  <tr>
                <td colspan="3"><input name="username" type="text" required="required" id="username" pattern="[a-z]{1,15}" title="only lowercase min 1 &amp; max 20 characters" maxlength="15"></td>
                </tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">Password</td>
                    </tr>
                  <tr>
                <td colspan="3"><input name="password" type="password" required="required" id="password" pattern="[a-zA-Z0-9@$#!]{8,20}" title="Lowercase, Uppercase @,$,! special symbols min 8 and max 20 characters" maxlength="20"></td>
                </tr>
                  <tr>
                    <td colspan="3" bgcolor="#48E57C">Confirm Password</td>
                    </tr>
                  <tr>
                <td colspan="3"><input name="confirmpassword" type="password" required="required" id="confirmpassword" pattern="[a-zA-Z0-9@$#!]{8,20}" title="Lowercase, Uppercase @,$,! special symbols min 8 and max 20 characters"></td>
                </tr>
              <tr style="text-align: center">
                <td colspan="3" bgcolor="#E8ADF5"><input type="submit" name="submit" id="submit" value="submit"></td>
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
  <script type="text/javascript">
$(function() {
	$( "#dateofbirth" ).datepicker({
		dateFormat:"yy-mm-dd",
		changeYear:true,
		changeMonth:true
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
		$skills=$_REQUEST["skills"];
		$experiance=$_REQUEST["experiance"];
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
	
		if(isset($_POST['submit']))
	    {
			$checkbox1=$_POST['skills'];
			$chk="";
			foreach($checkbox1 as $chk1)
			{
				$chk .= $chk1.",";
			}			
		 }		
		$sql="Select * from coderlogin where username='$uname'";
		$result = $conn->query($sql);
		if($result->num_rows >=1 )
		{
			  echo "<script> alert('Coder Already Registered') </script>";
		}
		else if($result->num_rows ==0 )
		{
				$insertquery = "INSERT INTO coderlogin(fullname,profilephoto,dateofbirth,email,mobileno,address,skills,experiance,username,password) values('$fullname','$file_name','$dob','$email','$mobno','$address','$chk','$experiance','$uname','$pass')";
				   
				if($conn->query($insertquery)===TRUE)
				{
					echo "<script> if(confirm('Registration successful')) window.location='coderlogin.php';</script>";
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