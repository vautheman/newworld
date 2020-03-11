<?php
// On se connecte à la base de donnée
include 'assets/include/connectBDD.php';
// On vérifi si l'administrateur est connecté
if(isset($_SESSION['user']) AND $_SESSION['user'] == "admin")
{
  // On vérifi si l'identifiant de la section a supprimer existe
  if(isset($_GET['cardId']) AND !empty($_GET['cardId']) AND $_GET['cardId'] > 0)
  {
    // On sécurise les valeurs
    $cardId = htmlspecialchars($_GET['cardId']);
    // On récupère les données de la carte
    $req = $bdd->prepare("SELECT * FROM card WHERE cardId = ?");
    $req->execute(array($cardId));
    $cur = $req->fetch();
    // On sauvegarde l'identifiant dans une variable pour la redirection
    $portId = $cur['portId'];
    // On supprime la carte de la base de donnée
    $reqSuppr = $bdd->prepare("DELETE FROM card WHERE cardId = ?");
    $reqSuppr->execute(array($cardId));
    header("Location: portfolioDisplay.php?portId=$portId");
  } else header("Location: portfolioDisplay.php?portId=$portId");
} else header("Location: portfolioDisplay.php?portId=$portId");
?>
