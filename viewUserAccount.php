<?php 
session_start();
$_SESSION['position'];
$_SESSION['username'];

if(!isset($_SESSION['username'])){
   header("location:allLogin.php");

}

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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>User Area</title>
  <!-- Bootstrap core CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="adminArea.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <?php 
          if (isset($_SESSION['position'])){
            echo '  <a class="navbar-brand" href="#">User Dashboard   -  '.$_SESSION['position'].'</a>';
          }else {
           
          }

         ?>


    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="normalUserPanel.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Add to Map</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="viewUserPosts.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">My Posts</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="userNews.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Create News</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="myNews.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">My News</span>
          </a>
        </li>
      
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="viewUserAccount.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">My Account</span>
          </a>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="sigleUserMapView.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">My Map</span>
          </a>
        </li>


       
       

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
   
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
        
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
         
          <ul class="sidenav-second-level collapse" id="collapseMulti">
                       
            
             
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
         
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          
            
        </li>
        <li class="nav-item">
       
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" href="logOut.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="normalUserPanel.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Account</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
      
      <!-- Example DataTables Card-->
   <div class="card mb-3">

        <div class="card-header">
          <i class="fa fa-table"></i> My Account Information</div>
        <div class="card-body">
          <div class="table-responsive">

              <?php 

                      $sql=' select * from Login where username="'.$_SESSION['username'].'"';
                      $link=mysqli_connect('localhost','root','','web');
                      $data=mysqli_query($link,$sql);
                      while($res=mysqli_fetch_array($data)){

  
                echo '     
                    <div class="container">
      <div class="row">
  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">My Account</h3>
            </div>
         
                        
                                    
                                                
                                         
                        

            
            
            <div class="panel-body">
              <div class="row">
                
                
         
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID NO :</td>
                        <td>'.$res[0].'</td>
                      </tr>
                    <tr>
                        <td>Your Name :</td>
                        <td>'.$res[3].'</td>
                      </tr>
                        <tr>
                        <td>Job Role :</td>
                        <td>'.$res[5].'</td>
                      </tr>
                  <tr>
                        <td>Username :</td>
                        <td>'.$res[1].'</td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td>...........
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="changeUserPassword.php" class="btn btn-primary">Change Password</a>
                  
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div> ';                       

   
   
                      }


                   ?>         
                    




           </div>
        </div>
        
      </div>
    </div>
            

      
        
     

           
   
        
    

            
            

   
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">

        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"></button>
            <a class="btn btn-primary" href="login.html"></a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </div>
</body>

</html>
