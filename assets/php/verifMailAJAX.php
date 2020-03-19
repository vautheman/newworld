<?php
  $bdd = new PDO('mysql: host=localhost; dbname=newworld', "autheman", "ij4udh1A*");
  // On vérifie si l'adresse email n'existe pas déjà dans la base de données
  // On prépare la requete de vérification d'adresse Email
  $reqVerifMailExist = $bdd->prepare("SELECT userEmail from utilisateur where userEmail = ?");
  // On execute la requête
  $reqVerifMailExist->execute(array($_POST['userMail']));
  // Et on place le curseur sur la première valeur retourné
  $curMailVerif = $reqVerifMailExist->fetch();

  if($_POST['userMail'] == $curMailVerif[0])
  {
    echo "failed";
  } else echo "success";
?>
