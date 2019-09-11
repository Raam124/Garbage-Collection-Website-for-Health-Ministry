<?php
	

    

	$link=mysqli_connect('localhost','root','','web');


	if($link==false) {
		die("ERROR: Could nor connect".mysqli_connect_error() );
	}


 
  	$postID = $_GET['id'];
  
  	
	



	$sql='DELETE FROM News WHERE id ="'.$postID.'"';
 
	if (mysqli_query($link,$sql) ){
		
		   header('location:posts.php');
		
	}

	else{
		  echo 'error';
        
		
		
	
		
	}

/*close connection*/

	mysqli_close($link);


?>