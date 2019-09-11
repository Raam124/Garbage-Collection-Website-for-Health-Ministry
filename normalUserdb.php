<?php 


  $conn = mysqli_connect("localhost","root","","web");

  if (!$conn){

    die ("Connection Failed : ".mysqli_connect_error());

  }

// Gets data from URL parameters.
$name = $_GET['name'];
$author = $_GET['author'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];




            
             

            
    

  $sql = "INSERT INTO markers (name,address,lat,lng,type,author)  VALUES ('$name','$address','$lat','$lng','$type','$author')";



  $result = mysqli_query($conn,$sql);

   

   if(move_uploaded_file(($_FILES['image']['tmp_name']),$traget)){
            echo'done';
            
        }
        else{
            echo'dfh';
            
        }
        






 ?>