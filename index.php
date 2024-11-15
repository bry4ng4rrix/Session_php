<?php 

require_once('dbconf.php');
session_start();
$uname = $_SESSION['user_name'];
$lastname = $_SESSION['user_lastn'];

if(empty($uname)){
    header('location:dash/index.php');
}else{
    header('location:login.php');
}

?>
