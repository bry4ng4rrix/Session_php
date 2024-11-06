<?
require_once ('dbconf.php');
$log = " ";

if($_SERVER['REQUEST_METHOD'] == $_POST){
    $log = "mety";
    $email = $_POST['email'];
    $pass  = $_POST['mdp'];
    
    $mdp = hash('sha256', $pass);

    $verification = $bdd->exec('SELECT * FROM user ');
}