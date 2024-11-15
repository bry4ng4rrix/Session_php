<?php
require_once ('dbconf.php');
$log = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $pass  = $_POST['mdp'];
    $mdp = hash('sha256', $pass);

    $verification = $bdd->prepare('SELECT * FROM utilisateur WHERE email=:email');
    $verification->execute([':email'=>$email]);
    $data = $verification->fetch();
        if($data){
            if($data['mdp'] == $mdp){
                session_start();
                $_SESSION['user_name']=$data['nom'];
                $_SESSION['user_lastn']=$data['prenom'];
                header('location:/dash/index.php');
            }else $log = "Mot de pass incorect";
        }else $log  = "Email inconue";


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Connexion</title>
</head>
<body>
<section class="mb-5">
        <div class="container">
            <div class="row mx-auto d-flex justify-content-center">
                <div class="col-xl-4">
                        <div class=" flex-column align-items-center">
                        <div class="h1 text-light text-center mb-5"><span>BIENVENUE !</span></div>
                        <p class="h6 text-center text-danger"><?php echo $log; ?></p>
                        <form action="#" method="post" class="mt-3 text-center">
                            <div class="mb-3"><input class="form-control inp" type="email" name="email" placeholder="Email" required></div>
                            <div class="mb-5"><input class="form-control inp" type="password" name="mdp" placeholder="Mot de pass" required></div>
                            <div class="mb-3"><button class="btn btn-outline-light form-control sbm" type="submit">Se connecter</button></div>
                            <p class="text-muted">Mot de pass oubliée ? <a href="reg.php">Crée un compte ?</a></p>
                            </form>
                    </div>

                </div>

            </div>
        </div>
</section>
</body>
</html>


