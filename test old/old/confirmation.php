<?php
// On inclu le fichier de connexion à la base
include 'assets/include/connectBDD.php';
// On vérifie si toutes les variables existent
if(isset($_GET['class']))
{
  // On sécurise les données
  $class = htmlspecialchars($_GET['class']);
  // Si l'inscription concerne un client
  if($class == "client")
  {
    if(isset($_GET['email']) AND !empty($_GET['email']) AND isset($_GET['key']) AND !empty($_GET['key']))
    {
      // On décode le mail que l'on à codé précedement
      $clientMail = htmlspecialchars(urldecode($_GET['email']));
      $key = htmlspecialchars($_GET['key']);

      //echo "$nom, $prenom, $mail, $class, $telPort, $telFix, $password";
      // On récupère toutes les adresses email qui correspondent à celle cité
      $reqmail = $bdd->prepare("SELECT * FROM clients WHERE cliEmail = ? AND cliKey = ?");
      $reqmail->execute(array($clientMail, $key));
      $mailExist = $reqmail->rowCount();
      // Si l'adresse existe
      if($mailExist == 1)
      {
        $$mailExist = $reqmail->fetch();
        if($mailExist['cliConfirme'] == 0)
        {
          $updateClient = $bdd->prepare("UPDATE clients SET cliConfirme = 1 WHERE cliKey = ?");
          $updateClient->execute(array($key));
          echo "Votre compte à bien été confirmé !<br>";
          echo 'Vous pouvez vous connecter en cliquant <a href="connexion.php?page=index">ici</a>';
        } else echo "Le compte à déjà été confirmé !"; // Sinon on affiche un message d'erreur
      } else echo "L'utilisateur n'existe pas !";
    } else echo "Erreur : Aucun compte n'a été référencé !";
  }




  // Si l'inscription concerne un producteur
  if($class == "producteur")
  {
    if(isset($_GET['email']) AND !empty($_GET['email']) AND isset($_GET['key']) AND !empty($_GET['key']))
    {
      // On sécurise les valeurs
      $prodMail = htmlspecialchars(urldecode($_GET['email']));
      $key = htmlspecialchars($_GET['key']);
      // On récupère toutes les adresses email qui correspondent à celle cité
      $reqmail = $bdd->prepare("SELECT * FROM producteurs WHERE prodEmail = ? AND prodKey = ?");
      $reqmail->execute(array($prodMail, $key));
      $mailExist = $reqmail->rowCount();
      // Si elle existe
      if($mailExist == 1)
      {
        $mailExist = $reqmail->fetch();
        if($mailExist['prodConfirme'] == 0)
        {
          $updateProd = $bdd->prepare("UPDATE producteurs SET prodConfirme = 1 WHERE prodKey = ?");
          $updateProd->execute(array($key));
          echo "Votre compte à bien été confirmé !";
          echo 'Vous pouvez vous connecter en cliquant <a href="connexion.php?page=index">ici</a>';
        } else echo "Le compte à déjà été confirmé !"; // Sinon on affiche un message d'erreur
      } else echo "Erreur : Aucun compte n'a été référencé !";
    // Sinon si aucune données n'est référencé, on affiche un message d'erreur
    } else echo 'Erreur de mail de confirmation';
  }

} else header("Location: index.php");
?>
