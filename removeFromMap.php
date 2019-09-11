<?php
	

    

	$link=mysqli_connect('localhost','root','','web');


	if($link==false) {
		die("ERROR: Could nor connect".mysqli_connect_error() );
	}


 
  	$author = $_GET['author'];
	



	$sql='DELETE FROM markers WHERE author ="'.$author.'"';
 
	if (mysqli_query($link,$sql) ){
		
		   header('location:viewUserPosts.php');
		
	}

	else{
		  echo 'error';
        
		
		
	
		
	}

/*close connection*/

	mysqli_close($link);


?>
