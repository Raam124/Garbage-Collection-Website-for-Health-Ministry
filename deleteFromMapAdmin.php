<?php
	

    

	$link=mysqli_connect('localhost','root','','web');


	if($link==false) {
		die("ERROR: Could nor connect".mysqli_connect_error() );
	}


 
  	$id = $_GET['id'];
	



	$sql='DELETE FROM TempMarkers WHERE id ="'.$id.'"';
 
	if (mysqli_query($link,$sql) ){
		
		   header('location:confirmedLocations.php');
		
	}

	else{
		  echo 'error';
        
		
		
	
		
	}

/*close connection*/

	mysqli_close($link);


?>
