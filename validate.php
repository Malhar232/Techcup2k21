<?php
session_start();
include 'connection.php';
// echo "BEFORE SUBMIT";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate | TechCup 2021</title>
    <link rel="icon" href="./assets/trophy.png" type="image/png">

    <link rel="stylesheet" href="preloader.css">
    <link rel="stylesheet" href="styleHome.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@800&display=swap" rel="stylesheet">
</head>


<?php

if(isset($_POST['submit'])){
  
    // echo "AFTER SUBMIT";
        $userid=$_POST['UserID'];
        $pass=md5($_POST['password']); 
        
        $user_select="SELECT username,BranchID FROM users WHERE username='$userid' AND passwd='$pass'";
        $user_exist=mysqli_query($connection,$user_select);
        $row = mysqli_fetch_array($user_exist);
        
        if($row){
            // echo "User found!";
            // echo session_id();
            if (!empty($_SERVER['HTTP_CLIENT_IP']))   
            {
                $ip_address = $_SERVER['HTTP_CLIENT_IP'];
            }
            //whether ip is from proxy
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
            {
                $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //whether ip is from remote address
            else
            {
                $ip_address = $_SERVER['REMOTE_ADDR'];
            }
            $_SESSION['BranchID']=$row['BranchID'];
            $_SESSION['userID']=$row['username'];
            
             $sessionid=session_id();
            $_SESSION['sessionid']=$sessionid;
            
            //     $_SESSION['ip']=$ip_address;
                $active_session_check="SELECT * FROM usersession WHERE userID='$userid' AND isActive=1  ";
                $active_user_check=mysqli_query($connection,$active_session_check);
                $active_user_row = mysqli_fetch_array($active_user_check);
                
                // print_r($active_user_row);
                if($active_user_row){
                    ?>
                    <body>
                    
                    <div id="preloader">
                        <div id="status">&nbsp;</div>
                    </div>
                    <form method="POST" action="welcome.php" class="center-align" id="validate_form">
                    <h4>DO YOU WANT TO CONTINUE ON THIS TAB/BROWSER?</h4>
                    
                    <?php
                    if ($active_user_row[4]!=$sessionid){
                        echo " <h6 class='center-align'><b>Already have active session on different browser! </b></h6><br>";
                    }
                    else{
                        echo " <h6 class='center-align'>Already have active session on different tab! </h6><br>";
                    }
                    // echo $userid;
                    // die("YOU ALREADY HAVE A SESSION ACTIVE!");
                    ?>
                    <input type="hidden" name="user_ID" value="<?= $userid?>">
                    <button class="btn waves-effect waves-light btn-large" id="ok" type="submit" name="OK">OK
                    <i class="material-icons right">send</i>
                    </button>
                    
                    <a class="waves-effect waves-light btn-large" href="index.php" id="cancel">CANCEL</a>
                    
                    
                    </form>
                    <script src="preloader.js"></script>
                    </body>
                    <?php
                    
                    // echo " session active";
                }
                else{
                    // echo " session not active";
                    $insert_user_for_malpractice="insert into usersession(userID,IP_address,isActive,sessionID) values('$userid','$ip_address',1,'$sessionid')";
                    // echo $insert_user_for_malpractice;
                    mysqli_query($connection,$insert_user_for_malpractice);
                    ?>
                    <script>location.replace("welcome.php");</script>
                    <?php
                }
            //     $insert_active_user="insert into active_users(userID) values('$userid')";
                
        }
        else{
            die("<div class='center-align' style='position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -60%);'><h4>User Not Found!<br><br>Please Check Your Credentials</h4><br>
            <a class='waves-effect waves-light btn-large ' id='LoginAgain' href='index.php'>LOGIN AGAIN</a></div>");
        }
            ?>
            
            <?php
    
    
    
    // if (($userid=="enu1101"&&$pass=="ghost1")||($userid=="enu1102"&&$pass=="ghost2") ){
    //     mysqli_query($connection,$insert_active_user);
    //     $count_active_01="SELECT COUNT(*) FROM active_users WHERE userID='enu1101'";
    //     $result=mysqli_query($connection,$count_active_01);
    //     $row = mysqli_fetch_array($result);
    //     $_SESSION['users_active']=$row[0];
        // print_r ($row[0]);
        
        
        ?>
       
     
        <?php
   
}

?>
</html>