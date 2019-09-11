<?php 


	$conn = mysqli_connect("localhost","root","","web");

	if (!$conn){

		die ("Connection Failed : ".mysqli_connect_error());

	}

$id=$_GET['id'];
$name=$_GET['name'];
$address=$_GET['address'];
$lat=$_GET['lat'];
$lng=$_GET['lng'];
$type=$_GET['type'];
$author=$_GET['author'];


	$sql = "INSERT INTO TempMarkers (id,name,address,lat,lng,type,author)  VALUES ('$id','$name','$address','$lat','$lng','$type','$author')";



	$result = mysqli_query($conn,$sql);

	header("location:adminArea.php");






 ?>