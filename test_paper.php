<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['userID'])){
    die("<h2 style='position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -60%);'>Please Login to access this page</h2>");
}
$round= $_GET["round"];
$_SESSION['round']=$round;
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Round 1.<?=$round?></title>
<link rel="icon" href="./assets/trophy.png" type="image/png">
<link rel="stylesheet" href="preloader.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="styleHome.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
<style>

h6{
  -webkit-user-select: none; /* Safari */        
  -moz-user-select: none; /* Firefox */
  -ms-user-select: none; /* IE10+/Edge */
  user-select: none; /* Standard */
}
</style>
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<nav>
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo roundName">Round 1.<?=$round?></a>
          <ul class="right">
            <li><b><p id="demo" class="right"></p></b></li>
          </ul>
        </div>
</nav>
    <br>

<form action="Result.php"  method="POST" class="container" id="questionaire" >
<?php
  
  $userID=$_SESSION['userID'];

  $submitted_papers_sql="SELECT * FROM submitted_papers WHERE userID='$userID' AND Rounds=$round"; 
  $submitted_ppr=mysqli_query($connection,$submitted_papers_sql);

  $nums_of_submitted_ppr=mysqli_num_rows($submitted_ppr);

  if(!$nums_of_submitted_ppr){
  $branchID=$_SESSION["BranchID"];
  $question_sql="SELECT * FROM question_list WHERE BranchID=$branchID AND Rounds=$round"; 
  $question_ppr=mysqli_query($connection,$question_sql);
  $question_number=1;
  while ($display_que=mysqli_fetch_array($question_ppr)) {
    ?>
    <br>
     <h6 id="question_statement" unselectable><?= $question_number.") ".$display_que['Question'] ?></h6>
    <p>
      <label>
        <input name="<?= $display_que['QID']?>" type="radio" value="<?= $display_que['Option1'] ?>" />
        <span class="options"><?= $display_que['Option1'] ?></span>
      </label>
    </p>
    <p>
      <label>
        <input name="<?= $display_que['QID']?>" type="radio" value="<?= $display_que['Option2'] ?>" />
        <span class="options"><?= $display_que['Option2'] ?></span>
      </label>
    </p>
    <p>
      <label>
        <input  name="<?= $display_que['QID']?>" type="radio"  value="<?= $display_que['Option3'] ?>"/>
        <span class="options"><?= $display_que['Option3'] ?></span>
      </label>
    </p>
    <p>
      <label>
        <input name="<?= $display_que['QID']?>" type="radio" value="<?= $display_que['Option4'] ?>"/>
        <span class="options"><?= $display_que['Option4'] ?></span>
      </label>
    </p>
   

    <?php
     $question_number++;
  }

?>

       <button class="btn waves-effect waves-light btn-large test-submit center-align" id="submittest" type="submit" name="Submit">Submit</button>
<?php
}
else{
  echo "<h2 id='submitted_already'>Submitted already!<h2>";
 
}
 
?>
  </form>


  


<script>
// Set the date we're counting down to
var countDownDate = new Date("Feb 03, 2025 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s ";
    // manual submit
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    document.getElementById("submittest").click();
    
    
  }
}, 1000);

</script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript">
 
 checkTicket();

function checkTicket()
{
    $.ajax(
        {
            url: "verify.php",
            method: 'GET',
            dataType: 'text',
            async: true,
            success: function(text)
            {
              if(text.replace(/\s/g,'')!="TRUE"){
                setTimeout( checkTicket, 1000 ); // check every 5 sec
              }else{
                window.location = 'info.php';
              }
            }
        });       
}


   </script> 
  <script src="preloader.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script>
var grd = function(){
  $("input[type='radio']").click(function() {
    var previousValue = $(this).attr('previousValue');
    var name = $(this).attr('name');

    if (previousValue == 'checked') {
      $(this).removeAttr('checked');
      $(this).attr('previousValue', false);
    } else {
      $("input[name="+name+"]:radio").attr('previousValue', false);
      $(this).attr('previousValue', 'checked');
    }
  });
};

grd('1');

</script>
</body>
</html>
