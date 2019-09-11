<?php
	

    

	$link=mysqli_connect('localhost','root','','web');


	if($link==false) {
		die("ERROR: Could nor connect".mysqli_connect_error() );
	}


 
  	$Username = $_GET['Username'];
  	$Title = $_GET['Title'];
  	
	



	$sql='DELETE FROM News WHERE Username ="'.$Username.'" AND Title="'.$Title.'"';
 
	if (mysqli_query($link,$sql) ){
		
		   header('location:myNews.php');
		
	}

	else{
		  echo 'error';
        
		
		
	
		
	}

/*close connection*/

	mysqli_close($link);


?>