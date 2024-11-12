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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G_blog</title>
    <style>
        a{
            color: white;
        }
        .navb{
            border-radius: 20px;
        }
    </style>
</head>
<body>
   <nav class=" navb navbar navbar-expand-sm bg-success m-2">
        <div class="container-fluid">
            <p class="h6 text-light">Hello <?php echo $uname ; ?></p>
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Contact</a>
                </li>
            </ul>
            <a href="decon.php" class="nav-link"><input type="button" class="btn btn-light text-success" value="Deconnexion"></a>

        </div>
   </nav>
    
</body>
</html>