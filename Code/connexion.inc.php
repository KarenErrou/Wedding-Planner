<?php
	function connex(){
		$idcon = mysqli_connect("localhost","root","","weddingpalnner");
		$idbase=mysqli_select_db($idcon, "weddingpalnner");
		
		return $idcon;
	}
?>