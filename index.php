<?php 
require_once('dbconf.php');
session_start();
$uname = $_SESSION['user_name'];
$lastname = $_SESSION['user_lastn'];

if(empty($uname)){
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <p>tongasoa ianao ry : <?php echo $uname; ?></p>
    <a href="decon.php"><input type="button" value="Deconnexion"></a>
</body>
</html>