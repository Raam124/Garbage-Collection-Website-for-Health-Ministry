<?php 


	$conn = mysqli_connect("localhost","root","","web");

	if (!$conn){

		die ("Connection Failed : ".mysqli_connect_error());

	}

$fname = $_POST['fname'];
$lname= $_POST['lname'];
$username = $_POST['username'];
$pass=$_POST['password'];
$position=$_POST['job'];

	$sql = "INSERT INTO Login (username,password,firstName,lName,position)  VALUES ('$username','$pass','$fname','$lname','$position')";



	$result = mysqli_query($conn,$sql);

	header("location:addNewUser.php");






 ?>