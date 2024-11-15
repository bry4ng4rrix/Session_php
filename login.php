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
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Login</title>
</head>
<body>
  <div class="container  form text-center text-white justify-content-center">
        <p class="h1">Bienvenue  !</p>
    <form action="" method="post" class="d-block containe m-3 justify-content-center">
        <div class="container ">
            <p class="h6 text-danger"><?php echo $log ; ?></p>
        <input type="email" name="email" id="" placeholder="Email" class="m-2 border border-0 rounded-2" required autocomplete="off"><br>
        <input type="password" name="mdp" id="" placeholder="Mot de pass"class="m-2 border border-0 rounded-2" required autocomplete="off"><br>
        <input type="submit" value="Se Connecter" class="m-4 subm">
        </div>
        
        <p class=" btn mt-3 btn-outline-white text-white">Mot de passe oublier ? <a href="reg.php"> Cree un compte ?</a></p>
    </form>
  </div>
</body>
</html>