<?php 

session_start();

	$conn = mysqli_connect('localhost','root','','web');

	if (!$conn){

		die ("Connection Failed : ".mysqli_connect_error());

	}

$uid = $_POST['username'];
$pwd = $_POST['password'];


$sql = "SELECT * FROM Login WHERE username='$uid' AND password='$pwd'";

$result = mysqli_query($conn,$sql);

if(!$row = mysqli_fetch_assoc($result)){
	
		header('Location:adminLogin.php');
	

	
}else if($row['username']=='admin'&&$row['password']=='admin'){
	$_SESSION['ID'] = $row['ID'];
 	$_SESSION['username'] = $row['username'];

header('Location:adminArea.php');

}
else if($row['username']=='staff1'&&$row['password']=='Staffstaff1') {
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['username'] = $row['username'];

    header('Location:normalStaffPanel.php');
}
else if($row['username']=='Manager'&&$row['password']=='Managermanager1') {
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['username'] = $row['username'];

    header('Location:managerArea.php');
}


else{

	$_SESSION['position'] = $row['position'];
	$_SESSION['username'] = $row['username'];
 	

	header('Location:normalUserPanel.php');
}


