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
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Login</title>
</head>
<body>
  <div class="container  form text-center text-white justify-content-center">
        <p class="h1">Bienvenue  !</p>
    <form action="" method="post" class="d-block containe m-3 justify-content-center">
        <div class="container ">
            <p class="h6 text-danger"><?php echo $log ; ?></p>
        <input type="text" name="nom" id="" placeholder="Nom" class="m-2 border border-0 rounded-2" required autocomplete="off"><br>
        <input type="text" name="prenom" id="" placeholder="Prenom" class="m-2 border border-0 rounded-2" required autocomplete="off"><br>
        <input type="email" name="email" id="" placeholder="Email" class="m-2 border border-0 rounded-2" required autocomplete="off"><br>
        <input type="password" name="mdp" id="" placeholder="Mot de pass"class="m-2 border border-0 rounded-2" required autocomplete="off"><br>
        <input type="password" name="mdp1" id="" placeholder="Confirmer le Mot de pass"class="m-2 border border-0 rounded-2" required autocomplete="off"><br>
        <input type="submit" value="Enregistrer" class="m-4 subm">
        </div>
        
        <p class=" btn mt-3 btn-outline-white text-white"><a href="login.php"> Se connecter ?</a></p>
    </form>
  </div>
</body>
</html>