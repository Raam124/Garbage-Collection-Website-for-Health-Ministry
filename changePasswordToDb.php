<?php
	session_start();
    $tid = $_SESSION['username'];
	$link=mysqli_connect('localhost','root','','web');
    

	if($link==false) {
		die("ERROR: Could nor connect".mysqli_connect_error() );
	}

   
    $pass1 = mysqli_real_escape_string($link,$_POST['pass1']);
    $passold = mysqli_real_escape_string($link,$_POST['passold']);
   
    $sql1='Select * from Login where username="'.$_SESSION['username'].'" and password="'.$passold.'" ';
     
    $data=mysqli_query($link,$sql1);
    
    $count=0;
    while($res=mysqli_fetch_array($data)){
        $count++;
    }

    
    if($count==1){
        $sql='UPDATE Login SET password = "'.$pass1.'"  where username = "'.$tid.'"' ;

        if (mysqli_query($link,$sql) ){
              
              header('location:viewUserAccount.php');

        }

        else{
              echo 'error';




        }
        
    }
    else{
        $_SESSION['error']='re enter the current password';
        header('location:changeUserPassword.php?part=2');
    }


	

/*close connection*/

	mysqli_close($link);


?>