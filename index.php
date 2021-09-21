<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | TechCup 2021</title>
    <link rel="icon" href="./assets/trophy.png" type="image/png">
    <link rel="stylesheet" href="styleHome.css">
    <link rel="stylesheet" href="preloader.css">
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
    <nav >
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo"><img class="brandlogo" src="./assets/tld.png" > TechCup 2021</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="round2.html">Round 2.0</a></li>
            <li><a href="leaderboard.html">LeaderBoard</a></li>
            
          </ul>
        </div>
      </nav>
    
      <ul class="sidenav" id="mobile-demo">
        <li><a href="round2.html">Round 2.0</a></li>
            <li><a href="leaderboard.html">LeaderBoard</a></li>
      </ul>
      
   <br>
   <br>
   <br>
   <form action="validate.php" method="post">
    <div class="container">
        <div class="row">
      <div class="col s12 l6 offset-l3 white-text card hoverable">
        <div class="col s12 center">
        <h3 class="text-center light greencolor"><b>Login</b></h3>
          </div>
        <div class="divider"></div>  
        <div class="input-field col s12">
          <i class="material-icons prefix greencolor">person</i>
          <input id="UserID" name="UserID" type="text" class="greencolor" required>
          <label for="UserID">UserID</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix greencolor">password</i>
          <input id="password" name="password" type="password" class="greencolor" required>
          <label for="password">Password</label>
        </div>
        <div class="col s12">&nbsp;</div>
        <div class="col s12 center">
        <button type="Submit" class="col s12 btn hoverable" name="submit" id="submit">Submit</button>
          </div>
        <div class="col s12">&nbsp;</div>
      </div>
        </div>
        </div>
   </form>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var elem = document.querySelector('.sidenav');
        var instance = new M.Sidenav(elem);
        
    </script>
    <script src="preloader.js"></script>
</body>
</html>