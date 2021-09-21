<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['userID'])){
    die("<h2 style='position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -60%);'>Please Login to access this page</h2>");
}


if(isset($_POST['OK'])){
  // echo"YOU SELECTED OK";
  session_regenerate_id();
  $new_session_id = session_id();
  $_SESSION['sessionid']=$new_session_id;

  $hidden_user_id=$_POST['user_ID'];
  // echo "UPDATE usersession SET sessionID='$new_session_id' WHERE userID='$hidden_user_id'";
  mysqli_query($connection,"UPDATE usersession SET sessionID='$new_session_id' WHERE userID='$hidden_user_id'");
  // session_start();
  ?>
  <!-- <script>location.replace("welcome.php");</script>  -->
  <?php
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | TechCup 2021</title>
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
        <a href="welcome.php" class="brand-logo"><img class="brandlogo" src="./assets/tld.png" > TechCup 2021</a>
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
    <h1 class='center-align'>Hello, <?=$_SESSION['userID']?></h1>
    <br>
    <br>
    <div class="center-align Rounds">
    <a class="waves-effect waves-light btn-large " href="test_paper.php?round=1" disabled>Round 1.1</a><br><br>
    <a class="waves-effect waves-light btn-large " href="test_paper.php?round=2" disabled>Round 1.2</a><br><br>
    <a class="waves-effect waves-light btn-large pulse " href="test_paper.php?round=3">Round 1.3</a>
    </div>
   

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var elem = document.querySelector('.sidenav');
        var instance = new M.Sidenav(elem);
    </script>
      <script src="preloader.js"></script>
</body>
</html>