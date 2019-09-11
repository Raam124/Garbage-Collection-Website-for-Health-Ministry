
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

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Latest Emergency News</h1>
           
          </div>

                  <?php  
                      $sql="Select * from News ";
                      $link=mysqli_connect('localhost','root','','web');
                      $data=mysqli_query($link,$sql);
                      while($res=mysqli_fetch_array($data)){
                        
                                     
           echo  '  <div class="row">
                  <div>
                    <h2>'.$res[3].'</h2>
                    <p>'.$res[4].'</p>
                    <p><a class="btn btn-secondary" href="readMoreNews.php? id='.$res[0].'" role="button">Read More &raquo;</a></p>
                  </div><!--/span-->
                  
                 
                  
                  
                </div>     


                          <!--/row-->
       


      ' ;         
          
                                                
                                                
                        

                      }


                   ?>
                    </div><!--/span-->
      </div><!--/row-->

      <hr>


    

    </main>


        


 








  

                       

      <div class="row marketing">
        <div class="col-lg-6">
    

        

        </div>

    
      </div>

      <footer class="footer">

      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
