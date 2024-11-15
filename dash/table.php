<?php 

require_once('dbconf.php');
session_start();
$uname = $_SESSION['user_name'];
$lastname = $_SESSION['user_lastn'];

if(empty($uname)){
    header('location:../login.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin_board</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<style>
    .nav_bg{
        background-color: rgb(22, 4, 34);
    }
</style>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-center sidebar sidebar-dark accordion nav_bg">

        
            <div class="container-fluid d-flex flex-column p-0">
               
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light " id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Admin</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="table.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="decon.php"><i class="fas fa-user-circle"></i><span>Deconexion</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>