<!DOCTYPE html>
<?php include '../include/connectBDD.php'; ?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="assets/js/datagouv.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <input type="text" id="adresse" onchange="adresseInput()" name="" value="">
    <?php
    if(isset($_POST["relayCoordX"]) AND isset($_POST["relayCoordY"]) AND isset($_POST["userMail"]))
    {
      json_encode($_POST);
      $reqUser = $bdd->prepare("SELECT userId from utilisateur where userEmail = ?");
      $reqUser->execute(array($_POST['userMail']));
      $curUser = $reqUser->fetch();
      $userId = $curUser['userId'];

      $req = $bdd->prepare("update pointRelai set relaiCoordX = ?, relaiCoordY = ? where userId = ?");
      $req->execute(array($_POST['relayCoordX'], $_POST['relayCoordY'], $userId));
    }
    ?>
  </body>
</html>
