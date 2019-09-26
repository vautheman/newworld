<!DOCTYPE html>
<?php include 'assets/include/connectBDD.php';
if(isset($_SESSION['id']) AND isset($_SESSION['email']))
{
  if(isset($_SESSION['client']))
  {
    $id = htmlspecialchars($_SESSION['id']);
    $email = htmlspecialchars($_SESSION['email']);
    $req = $bdd->prepare("SELECT * FROM clients WHERE cliId = ?");
    $req->execute(array($id));
    $cur = $req->fetch();
?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <?php
    include 'assets/include/menu.php';
    ?>
    <div style="padding-top: 100px;" class="container">
      <?php
      if($cur['cliConfirme'] == 0)
      {
        ?>
        <div class="alert alert-warning" role="alert">
          <h4 class="alert-heading">Confirmation de compte</h4>
          <p>Bienvenue ! Veuillez confirmer votre adresse email si vous n'avez rien reçu, vérifier dans vos spam ou cliquez-ici.</p>
          <hr>
          <p class="mb-0">Si la confirmation n'a pas été effectué d'ici 48 heures, le compte sera supprimé !</p>
        </div>
        <?php
      }
      ?>
      <img class="mt-4" width="200px" src="assets/images/profile.png" alt="">
      <div style="display: inline-block; position: relative; top: 40px;">
        <h4 class="ml-4 text-dark"><?php echo $cur['cliNom']." ".$cur['cliPrenom']; ?></h4>
        <h5 class="ml-4 text-dark">Enregistrement : <?php if(isset($_SESSION['client'])){echo "Client ";} if(isset($_SESSION['producteur'])){echo "Producteur";}  ?></h5>
        <p class="ml-4 text-dark">Adresse de contact : <?php echo $cur['cliEmail']; ?></p>
      </div>

      <div class="">

      </div>
    </div>

    <?php include 'assets/include/footer.php'; ?>
    <!-- SCRIPT -->
    <!-- control des inputs -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/inputControl.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js"></script>
  </body>
</html>
<?php
}
} else header("Location: index.php"); ?>
