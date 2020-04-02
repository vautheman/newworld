<?php
  include '../assets/include/connectBDD.php';
  if(isset($_GET['produitId']) and $_GET['produitImg'] and $_GET['prodId'])
  {
    if(count($_GET['produitId'])>0 and !empty($_GET['produitImg']) and count($_GET['prodId'])>0)
    {
      system("rm ../assets/images/produits/".$_GET['prodId']."/".$_GET['produitImg']);
      $reqDropProduct = $bdd->prepare("DELETE from produits where produitId = ?");
      $reqDropProduct->execute(array($_GET['produitId']));
      header("Location: ../profile.php");
    } else echo "vide";
  } else echo "non";
?>
