<?php 
    require_once("dbconf.php");
    $log = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $pass = $_POST['mdp'];
        $pass2 = $_POST['mdp1'];

        $verification = $bdd->prepare('SELECT * FROM utilisateur WHERE email=:email');
        $verification->execute([':email'=>$email]);
        $data = $verification->fetch();
        if(!$data){     
                    if($pass == $pass2){
                        $mdp = hash ('sha256',$pass);
                            $insertion = $bdd->prepare("INSERT INTO utilisateur(nom,prenom,email,mdp) VALUES(?,?,?,?)");
                            $insertion->execute(array($nom,$prenom,$email,$mdp));
                            header("location:login.php");
                    }else $log = " les deux mot de pass ne correspond pas !";
        }else $log ="Email deja prise ";
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
    <title>Register</title>
</head>
<body>
<section class="mb-4">
        <div class="container">
            <div class="row mx-auto d-flex justify-content-center">
                <div class="col-xl-4">
                        <div class=" flex-column align-items-center">
                        <div class="h1 text-light text-center mb-5"><span>BIENVENUE !</span></div>
                        <p class="h6 text-center text-danger"><?php echo $log; ?></p>
                        <form action="#" method="post" class="mt-3 text-center">
                            <div class="mb-3"><input class="form-control inp" type="text" name="nom" placeholder="Nom" required></div>
                            <div class="mb-3"><input class="form-control inp" type="text" name="prenom" placeholder="Prenom" required></div>
                            <div class="mb-3"><input class="form-control inp" type="email" name="email" placeholder="Email" required></div>
                            <div class="mb-3"><input class="form-control inp" type="password" name="mdp1" placeholder="Mot de pass" required></div>
                            <div class="mb-5"><input class="form-control inp" type="password" name="mdp2" placeholder="Confirmer votre Mot de pass" required></div>
                            <div class="mb-3"><button class="btn btn-outline-light form-control sbm" type="submit">Enregistre</button></div>
                            <p class="text-muted">Deja un compte ? <a href="login.php">Se connecter ?</a></p>
                            </form>
                    </div>

                </div>

            </div>
        </div>
</section>
</body>
</html>