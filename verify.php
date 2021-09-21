<?php 
session_start();
include 'connection.php';
if(!isset($_SESSION['userID'])){
    die("<h2 style='position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -60%);'>Please Login to access this page</h2>");
}

$userid=$_SESSION['userID'];

$sessionid=$_SESSION['sessionid'];

$active_session_check="SELECT * FROM usersession WHERE userID='$userid' AND isActive=1 ";
$active_user_check=mysqli_query($connection,$active_session_check);
$active_user_row = mysqli_fetch_array($active_user_check);
if($active_user_row){
    if($active_user_row['sessionID']!=$sessionid){
        //$sendResult = true;
        $string = "TRUE";
        echo $string; //$sendResult;
    }   
}else{
    $string = "TRUE";
    echo $string; //$sendResult;

}
?>