<?php
  session_start();
  include 'connection.php';
  if(!isset($_SESSION['userID'])){
    die("<h2 style='position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -60%);'>Please Login to access this page</h2>");
}

  $userID=$_SESSION['userID'];
  $remove_active_user_01="DELETE FROM `usersession` WHERE userID='$userID'";
  mysqli_query($connection,$remove_active_user_01);
  session_destroy();
  ?>        
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info | TechCup 2021</title>
    <link rel="icon" href="./assets/trophy.png" type="image/png">
    <link rel="stylesheet" href="preloader.css">

    <link rel="stylesheet" href="styleHome.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
    <nav>
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">TechCup 2021 </a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    
      <ul class="sidenav" id="mobile-demo">
         <li><a href="logout.php">Logout</a></li>
      </ul>
   <br>
    <h2 class='center-align'><u>Multiple sessions are enable Please re-login to continue!</u></h2>
    <br>
    <br>
    
   

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var elem = document.querySelector('.sidenav');
        var instance = new M.Sidenav(elem);
    </script>
      <script src="preloader.js"></script>
</body>
</html>
