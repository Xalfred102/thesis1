<!--PHP-->
<?php
require 'dbconnect.php';

if(!empty($_SESSION["uname"]) && !empty($_SESSION["role"])){
    $uname = $_SESSION["uname"];
    $role = $_SESSION["role"];
    $result = mysqli_query($conn, "select * from users where uname = '$uname'");
    $row = mysqli_fetch_assoc($result);
}else{
    echo '';
}


?>
<!--PHP END-->


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <!--sidebar una -->
    <nav class="navbar fixed-bottom" style="background-color: #ecffff;">
      <div class="col-md-12" style="text-align: right; font-size: 15px; font-weight: 100;">
        <a href="login.html" style="text-decoration: none; color: black;">Logout</a> 
      </div>
    </nav>

    <div class="side-bar">
      <div class="logo-name">
        <a class="navbar-brand" href="#"><img src="logo.png" alt="Bootstrap" width="110" height="100"></a>
      </div>
      
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="dashboard.html">DASHBOARD</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="home.html">HOME</a>
    </li>
     
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="detail.html">DETAILS</a>
    </li>

       <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="about.html">ABOUT US </a>
      </li> <br>
  </div>
 <!--sidebar end -->

  <!--table una -->
  
<!--table end -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>