<!DOCTYPE html>
<?php include 'assets/include/connectBDD.php';?>
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
    <title>Produits</title>
  </head>
  <body>
    <?php
    include 'assets/include/menu.php';
    ?>

    <!-- Produits -->
    <?php
    if(isset($_GET['idProduit']))
    {
      $req = $bdd->prepare("SELECT * FROM produits WHERE produitId = ?");
      $req->execute(array($_GET['idProduit']));
      $cur = $req->fetch();
    ?>
      <div style="padding-top: 100px;" class="container">
        <div class="row">
          <div class="col">
            <img src="assets/images/produits/<?php echo $cur[4]; ?>" alt="">

          </div>
          <div class="col">
            <h1><?php echo $cur[2]; ?></h1>
            <p><?php echo $cur[3]; ?></p>
            <a href="#" class="btn btn-primary">Ajouter au panier</a>
          </div>

        </div>
      </div>
      <?php } else header("Location:index.php"); ?>
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
