
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    

    <title>Log in here</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="adminLogin.php">
        <h2 class="form-signin-heading">Select Login Type</h2>
 
     
        <button class="btn btn-lg btn-primary btn-block" type="submit">Super User (ADMIN)</button>
      </form>
      <form class="form-signin" method="POST" action="normalUserLogin.php">
        
 
     
        <button class="btn btn-lg btn-primary btn-block" type="submit">Normal User</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
