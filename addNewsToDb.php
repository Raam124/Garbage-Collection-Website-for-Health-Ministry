<?php 

	$postName = $_POST['name'];
	$postUsername=$_POST['username'];
	$postTitle=$_POST['title'];
	$postBody=$_POST['post'];

$traget="css/"."one".basename($_FILES['image']['name']);
$image ="one".$_FILES['image']['name'];



	$conn = mysqli_connect('localhost','root','','web');

$sql = 'INSERT INTO News(FirstName,Username,Title,Body,Image) VALUES ("'.$postName.'","'.$postUsername.'","'.$postTitle.'","'.$postBody.'","'.$image.'")';


	$result = mysqli_query($conn,$sql);

	if(move_uploaded_file(($_FILES['image']['tmp_name']),$traget)){
            
           
            
        }
        else{
            
            
        }

	 header("location:userNews.php");

 ?>