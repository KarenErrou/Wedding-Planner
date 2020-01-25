<?php 
	extract($_POST);
	$con = mysqli_connect("localhost","root","","project");
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
   </div>
<div class="row">
<div class="col-sm-2" >
</div>
<div class="col-sm-10" >
	<b>Types Collection</b>
	
	
	   <div  class="img-with-text">
		<?php
			$sql="SELECT * FROM typecollection"; 
			$result=mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result)){
				echo $row[1];
				$musicsql = "SELECT * FROM music where id_col='$row[0]'"; 
				$musicresult=mysqli_query($con,$musicsql);
				$i=0;
				while($musicrow = mysqli_fetch_array($musicresult) && $i<2){
				?>
					<img class="size" src="<?php echo $musicrow[6]; ?> "/><br>
				<?php
				 $i++;
				}
				?>
				<input id="<?php echo $row[0]; ?>" type="button" name="viewcol" value="View" onclick="goToCol(this.id)"/><br>
			<?php } ?>
	      </div>
		
</div>
</div>
	
	<script type="text/javascript">
		function goToCol(clicked_id){
			var myid = clicked_id;
			window.location="collection.php?myid=" +myid;
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