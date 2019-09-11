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
          if (isset($_SESSION['username'])){
            echo '  <a class="navbar-brand" href="#">Manager Dashboard For  -  '.$_SESSION['username'].'</a>';
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
        <li class="breadcrumb-item active">Add To Map</li>
      </ol>
      <!-- Icon Cards-->

      <!-- Area Chart Example-->

      <!-- Example DataTables Card-->
   <div class="card mb-3">

        <div class="card-header">
          <i class="fa fa-table"></i> Details</div>
        <div class="card-body">
          <div class="table-responsive">
<div id="map" height="460px" width="100%"></div>
                <div id="form">
      <table>
      <tr><td>City Name:</td> <td><input type='text' id='name'/> </td> </tr>
      <tr><td>Reason :</td> <td><input type='text' id='address'/> </td> </tr>

      <tr><td>Your Username :</td> <td><input type='text' id='author'/> </td> </tr>
      <tr><td>Emergency Type:</td> <td><select id='type'> +
                 <option value='High' SELECTED>High</option>
                 <option value='Medium'>Medium</option>
                 <option value='Low'>Low</option>
                 </select> </td></tr>
                 <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
      </table>

         </div>
         <div id="message">Emergency Details Added</div>

            <div id="map">




            <script>


      var map;
      var marker;
      var infowindow;
      var messagewindow;


      function initMap() {
        var colombo = {lat: 6.9271, lng: 79.8612};
        map = new google.maps.Map(document.getElementById('map'), {
          center: colombo,
          zoom: 10
        });

        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        });

        messagewindow = new google.maps.InfoWindow({
          content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });


          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });
        });
      }

      function saveData() {
        var name = escape(document.getElementById('name').value);
        var author = escape(document.getElementById('author').value);
        var address = escape(document.getElementById('address').value);
        var type = document.getElementById('type').value;

        var latlng = marker.getPosition();
        var url = 'normalUserdb.php?name=' + name + '&address=' + address +
                  '&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng()+'&author=' + author;

        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
          }
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request.responseText, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing () {
      }

    </script>






         <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALbofBIgeOTXWud0OLsxjCCqvc87MifGc&callback=initMap">
        </script>


      </div>

                       </div>
        </div>

      </div>
    </div>















    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © WeNoobs Labs</small>
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
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
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
