<html>
<head>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<title>Fitting Room - Clothes -</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
 
	<div class="container-fluid">
	<div class="row" style="background-image:url('cari/back.jpg')">
	<div class="col-sm-2" >
      <img class="logos" src="cari/black.jpg"/>
    </div>
	<div  class="col-sm-10" ;>
	<h1 style="color:white; font-family:Harlow Solid Italic;"> Wedding<h1><div style='float:right;'> <a style="color:white;  font-size:25px;" href="index.php">logout</a> </div>
	<table style="color:white;"  >
		<tr > <th ><a style="color:white;" href="home.php">Home<a></th> <th>&nbsp;-&nbsp;</th>
			 <th><a style="color:white;" href="fitting.php">Fitting<a></th> <th>&nbsp;-&nbsp;</th>
			 <th><a style="color:white;" href="music.php">Music<a></th> <th>&nbsp;-&nbsp;</th>
			 <th><a style="color:white;" href="venues.php">Place<a></th> </tr>
	</table>
	<hr style="border-color:white;">
	</div>
  </div>
  
<form action="registeration.php" method="post">
<fieldset>
<legend><b>Input items</b></legend>
<h3>Enter username and password to build your account.</h3>

Username : <input type="text" name="username" value="<?php if (!empty($username)) echo $username;?>" /> <?php if (isset($reg) && $user==1) echo "*"?> <br/>
Password : <input type="password" name="psd" value="<?php if (!empty($psd)) echo $psd;?>" /> <?php if (isset($reg) && $pass==1) echo "*"?> <br/>
<input type="submit"  name="reg" Value="Register"/>
</fieldset>
</form>


<?php
	extract($_POST);
	include ("connexion.inc.php");
	$con = connex();
	
	if(isset($client_info)){
						if(empty($g_name) || empty($b_name) || empty($g_bdate) || empty($b_bdate) || empty($b_bdate)
							|| empty($g_email) || empty($b_email) || empty($g_phone) || empty($b_phone) 
						    || empty($g_address) || empty($b_address) || empty($wed_date)){
							echo "All fields are mendatory!!";
						}
						else
						{
							$sql="INSERT INTO client (name_groom, name_bride, bdate_groom, bdate_bride, email_groom, email_bride, tel_groom, tel_bride, add_groom, add_bride, wed_date)
									VALUES('$g_name','$b_name','$g_bdate', '$b_bdate','$g_email','$b_email','$g_phone','$b_phone','$g_address','$b_address','$wed_date')";
							mysqli_query($con, $sql);
							
							$sql="SELECT * FROM client where name_groom='$g_name' AND name_bride='$b_name'";
							$result=mysqli_query($con,$sql);
							$row = mysqli_fetch_array($result);
							$mysql="INSERT INTO user (id_client) VALUES('$row[0]')";
							mysqli_query($con, $sql);
							
							header("location:home.php");
						}
					}

	if(isset($reg)){
		
		$user=0; $pass=0;
		if(empty($username) || empty($psd)){
			echo "<p style=\"color:red\"> Please Fill username and/or password</p>";
		}
		else {
			$sql="SELECT * FROM user where username='$username'";
			$result=mysqli_query($con,$sql);
			
			$row = mysqli_fetch_array($result);
			
			if(strlen($psd) < 8)
				$pass=1;
			
			if (empty($row) && $pass==0){
					$sql="INSERT INTO user (username, password)
					VALUES('$username','$psd')";
					mysqli_query($con, $sql);	
					
					echo "<html>
							<form action='registeration.php' method='post'>
								<legend><b>Groom / Bride</b></legend>
								<pre>
								
								Groom Name:      <input type='text' name='g_name'/><br>
								Bride Name:      <input type='text' name='b_name'/><br>
								Groom Birthdate: <input type='date' name='g_bdate'/><br>
								Bride Birthdate: <input type='date' name='b_bdate'/><br>
								Groom E-mail:    <input type='text' name='g_email'/><br>
								Bride E-mail:    <input type='text' name='b_email'/><br>
								Groom Phone:     <input type='text' name='g_phone'/><br>
								Bride Phone:     <input type='text' name='b_phone'/><br>
								Groom Address:   <input type='text' name='g_address'/><br>
								Bride Address:   <input type='text' name='b_address'/><br>
								Wedding Date:    <input type='date' name='wed_date'/><br>
							
								<input type='submit' name='client_info' value='Submit' />
								</pre>
							</form>
							</html>";
							
			}
				//username existe
			else
				if(empty($row) && $pass==1){
					echo "Your password should at least contain 8 characters.";
				}
				else
					if(!empty($row))
					{
						echo "Username already exist. Choose another one.";
						$user=1;
					}
			
		}
	}
?>
</div>

<!- footer ->
<div class="row"> <hr style="border-color:black;">
 <div class="col-sm-2"  >
	<span style="float:right; padding:10%" class="col-sm-10">
		<a href="//facebook.com"><img src="logo/facebook.png" height="30px" width="30px" /></a>	
		<a href="//instagram.com"><img src="logo/instagram.png" height="30px" width="30px" /></a>
		<a href="//twitter.com"><img src="logo/twitter.png" height="30px" width="30px"  /></a>
	</span>
  </div>
  <div class="col-sm-7"  >
  </div>
  <div class="col-sm-3" >
			Karen 51727 & Rita 51747
  </div>
</div>
</body>
</html>
