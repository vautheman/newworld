<?php
  include '../assets/include/connectBDD.php';
  if(isset($_GET['idType']))
  {
    if(count($_GET['idType'])>0)
    {
      $reqDropProduct = $bdd->prepare("DELETE from typeProduit where typeProduitId = ?");
      $reqDropProduct->execute(array($_GET['idType']));
      header("Location: ../profile.php");
    } else echo "vide";
  } else echo "non";
?>
