<?php
session_start();
header('location:index.php');
include 'connection.php';
$userID=$_SESSION['userID'];
$remove_active_user_01="DELETE FROM `usersession` WHERE userID='$userID'";
mysqli_query($connection,$remove_active_user_01);
session_destroy();
?>
