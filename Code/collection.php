<?php 
	extract($_POST);
	include ("connexion.inc.php");
	$con = connex();
?>
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
  <div class="row">
  <div class="col-sm-2"  style="background-color:pink;">
  
    </div>
	<div  class="col-sm-10" ;>
<?php
	$myCol=$_GET['myid'];
?>    <p>Venues</p>
		<?php
			$sql1="SELECT * FROM venues where id_col='$myCol'";
			$result1=mysqli_query($con,$sql1);
			while($row1 = mysqli_fetch_array($result1)){
			?>
			<div  class="img-with-text">
					<?php echo $row1[2]; ?> <br>
					<?php
						$myAlbum="SELECT * FROM album where id_album='$row1[4]'";
						$resultAlbum=mysqli_query($con,$myAlbum);
						$rowAlbum= mysqli_fetch_array($resultAlbum);
						
						for($i=0; $i<3; $i++)
							if(empty($rowAlbum[$i]))
								break;
							else
?>
						<img class="size" src="<?php echo $rowAlbum[$i];?>"/> <?php ; ?>
					<p>Location: 
						<?php 
							$myLoc="SELECT * FROM location where id_location='$row1[8]'";
							$resultLoc=mysqli_query($con,$myLoc);
							while($rowLoc= mysqli_fetch_array($resultLoc)){
								echo $rowLoc[1].", ";
							} ?><br>
						Venue Type:
							<?php 
								$myVType="SELECT * FROM venuestype where venuestype_id='$row1[6]'";
								$resultVType=mysqli_query($con,$myVType);
								while($rowVType= mysqli_fetch_array($resultVType)){
									echo $rowVType[1]." ";
								}?><br>
						Maximum Capacity: <?php echo $row1[1]; ?><br>
						Price per person: <?php echo $row1[3]; ?>
					</p>
					<button id="<?php echo $row1[0]; ?>" type="button" name="reserve" value="Reserve" onclick="goToResVen(this.id)">Reserve</button>
					<button id="<?php echo $row1[0]; ?>" type="button" onclick="goToFavVen(this.id)">Add To Favorites</button>
				</div>
			<?php
			}
			?>
			
			<p>Music</p>
			<?php
			$sql="SELECT * FROM music where id_col='$myCol'";
			$result=mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($result)){
				?>
			<div  class="img-with-text">
					<?php echo $row[2]; ?> <br>
					<?php
						$myAlbum="SELECT * FROM album where id_album='$row[5]'";
						$resultAlbum=mysqli_query($con,$myAlbum);
						$rowAlbum= mysqli_fetch_array($resultAlbum);
						
						for($i=0; $i<3; $i++)
							if(empty($rowAlbum[$i]))
								break;
							else
					?>
								<img class="size" src="<?php echo $rowAlbum[$i];?>"/> <?php ; ?>
					<p>
					Music Type:
						<?php 
							$myMType="SELECT * FROM musictype where musictype_id='$row[3]'";
							$resultMType=mysqli_query($con,$myMType);
							while($rowMType= mysqli_fetch_array($resultMType)){
								echo $rowMType[1]." ";
							}?><br>
					Price per hour: <?php echo $row[1]; ?>
					</p>
					<input id="<?php echo $row[0]; ?>" type="button" name="reserve" value="Reserve" onclick="goToResMus(this.id)">
					<input id="<?php echo $row[0]; ?>" type="button" onclick="goToFavMus(this.id)" value="Add To favorites"/>
				</div>
			<?php } ?>
		
		</div>
	
	</div>
  </div>
  

<script type="text/javascript">
		function goToFavVen(clicked_id){
			var myid = clicked_id;
			window.location="favorites.php?myid=" +myid+" ?from=" +"venues";
		}
		
		function goToFavMus(clicked_id){
			var myid = clicked_id;
			window.location="favorites.php?myid=" +myid+" ?from=" +"music";
		}
		
		function goToResVen(clicked_id){
			var myid = clicked_id;
			window.location="reservation.php?myid=" +myid+" ?from=" +"venues";
		}
		
		function goToResMus(clicked_id){
			var myid = clicked_id;
			window.location="reservation.php?myid=" +myid+" ?from=" +"music";
		}
	</script>
	
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