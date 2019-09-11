<?php 

$postID = $_GET['id'];






 ?>





<!DOCTYPE html>
<html lang="en">
  <head>
       <style>
       #map {
        height: 600px;
        width: 100%;


       }

       
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Latest News</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="index.css" rel="stylesheet">
  </head>

  <body>

 <
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item">
              <a class="nav-link" href="mainMap.php">Home</a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="news.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactUs.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminLogin.php">Login</a>
            </li>
          </ul>
        </nav>
        
      </div>


    <main role="main" class="container">

      

                  <?php  
                      $sql='Select * from News WHERE id="'.$postID.'"';
                      $link=mysqli_connect('localhost','root','','web');
                      $data=mysqli_query($link,$sql);
                      while($res=mysqli_fetch_array($data)){
                        
                                     
           echo  ' 
                  
                    <h2>'.$res[3].'</h2>
                    <p>'.$res[4].'</p>
                    <img src="css/'.$res[5].'" >
                    <hr>

                    <p>Author : '.$res[1].'</p>
                    
                 
                  
                 
                  
                  
             ' ;         
          
                                                
                                                
                        

                      }


                   ?>
      


    

    </main>


        


 








  

                       

      <div class="row marketing">
        <div class="col-lg-6">
    

        

        </div>

    
      </div>

      <footer class="footer">
        <p>&copy; Akila Devinda</p>
      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
