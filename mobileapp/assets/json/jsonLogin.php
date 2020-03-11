<?php
session_start();
$bdd = new PDO('mysql: host=localhost; dbname=newworld', "autheman", "ij4udh1A*");

// Si les informations envoyés par l'application existent
if(isset($_POST['login']) and isset($_POST['password']))
{
  // On sécurise les données
  $login = htmlspecialchars($_POST['login']);
  $password = $_POST['password'];

  // Si les variables ne sont pas vides
  if(!empty($login) and !empty($password))
  {
    // On interroge la base de données
    $req = $bdd->prepare("SELECT userId, userNom, userPrenom from utilisateur where userRole = 4 and userPseudo = ? and userPasswd = ?");
    $req->execute(array($login, $password));

    $cur = $req->fetch();
    if($req->rowcount() == 1)
    {
      $_SESSION['identifiant'] = $cur['userId'];
      echo json_encode($cur);
    } else echo "aucune correspondance";
  }
} else print_r($_POST);
?>
