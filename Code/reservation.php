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

  
  
  <!-body-!>
  <div class="row">
	  <div class="col-sm-2">
	  </div>
	<div class="col-sm-10">
		<?php
			extract($_POST);
			include ("connexion.inc.php");
			$con = connex();
			
			$id_user=18;
			$idToRes=$_GET['myid'];
			$fromRes=$_GET['from']; 
			
			if(!isset($confirm)){
			echo "
				<form action='reservation.php' method='post' >
				<pre>
				Date of the reservation: <input type='date' name='resdate' /><br>
				Starting hour:          <input type='time' name='reshour' /><br>
				Ending hour: <input type='text' name='endhour' /><br>
				<input type='submit' name='confirm' value='Confirm' />
				</pre>
				</form>";
			}
			
			if(isset($confirm)){
				
			 if($fromRes=="music"){
				$sql="SELECT * FROM reservation where MUSIC_music_id='$idToRes' AND date_res='$resdate' 
						AND ending_hour >= '$endhour + 3'"; 
				$result=mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);
				if(empty($row)){
					$musicres="SELECT * FROM music where music_id='$idToRes'";
					$resultmusicres=mysqli_query($con,$musicres);
					$rowmusicres = mysqli_fetch_array($resultmusicres);
					$pricehourres=$rowmusicres[1];
					$priceres=$pricehourres*($endhour - $reshour); //!!!!!!!!!!!!!!!!!!
					$depositres=$priceres*0.2;
					
					$sql="INSERT INTO reservation (date_res, deposit, automatic_cancel_date, cancel, price, starting_hour, nbr_hours, MUSIC_music_id, id_venue, USER_user_id)
							VALUES('$resdate','$depositres', '','', '$priceres', '$reshour', '$endhour', '$idToRes', '', '$id_user')";
					mysqli_query($con, $sql);
				}
				else
				{
					echo "<p style='color:red'>Sorry! It is not available at this date!</p>";
				}
			 }
			
			 if($fromRes=="venues"){
				$sql="SELECT * FROM reservation where id_venue='$idToRes' AND date_res='$resdate' 
						AND ending_hour >= '$endhour + 3'"; 
				$result=mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);
				if(empty($row)){
					$venuesres="SELECT * FROM venues where id_venue='$idToRes'";
					$resultvenuesres=mysqli_query($con,$venuesres);
					$rowvenuesres = mysqli_fetch_array($resultvenuesres);
					
					$priceperperson=$rowvenuesres[3];
					$capacityres=$rowvenuesres[1];
					
					$priceres=$priceperperson*$capacityres;
					$depositres=$priceres*0.2;
					
					$sql="INSERT INTO reservation (date_res, deposit, automatic_cancel_date, cancel, price, starting_hour, ending_hour, MUSIC_music_id, id_venue, USER_user_id)
							VALUES('$resdate','$depositres', '','', '$priceres', '$reshour', '$endhour', '', '$idToRes', '$id_user')";
					mysqli_query($con, $sql);
				}
				else
				{
					echo "<p style='color:red'>Sorry! It is not available at this date!</p>";
				}
			 }
			}
			
			$sql="SELECT * FROM reservation where USER_user_id='$id_user'";
			$result=mysqli_query($con,$sql);
			if(empty($row = mysqli_fetch_array($result)))
				echo "<p style='color:red'> NO RESERVATION FOR YOU </p>";
			
			while($row = mysqli_fetch_array($result)){
				if(!empty($row[8])){
					$mymusic="SELECT * FROM music where music_id='$row[8]'";
					$resultmusic=mysqli_query($con,$mymusic);
					while($rowmusic = mysqli_fetch_array($resultmusic)){
						?>
						<div  class="img-with-text">
							<form action='reservation.php' method='post'>
							<?php echo $rowmusic[2]; ?><br>
							<img class="size" src="<?php echo $rowmusic[6]; ?> "/><br>
							<p>Price Per Hour: <?php echo $rowmusic[1]; ?></p>
						</div>
					<?php } 
				}
				if(!empty($row[9])){
					$myvenue="SELECT * FROM venues where id_venue='$row[9]'";
					$resultvenues=mysqli_query($con,$myvenue);
					while($rowvenues = mysqli_fetch_array($resultvenues)){
						?>
						  <div  class="img-with-text">
							  <form action='reservation.php' method='post'>
							  Name: <?php echo $rowvenues[2]; ?><br>
							  <img class="size" src="<?php echo $rowvenues[5]; ?> "/><br>
							  Max Capacity: <?php echo $rowvenues[1]; ?><br>
							  Price Per Person: <?php echo $rowvenues[3]; ?><br>
						  </div>
					<?php } 
				}
			}
		?>
	</div>
	<div class="col-sm-3">
	</div>
</div>
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