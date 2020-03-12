<!DOCTYPE html>
<?php include 'assets/include/connectBDD.php'; ?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>New World</title>
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/wow.css">
  <link rel="stylesheet" href="assets/css/styles.css">

  <!-- Notification -->
  <link rel="stylesheet" href="assets/css/toastify/toastify.css">

  <!-- SCRIPT -->
  <script src="https://kit.fontawesome.com/3ba462b0e4.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/wow.js" charset="utf-8"></script>

  <script type="text/javascript">
    new WOW().init();
  </script>
</head>
  <body>
    <main class="container-fluid p-0 wow fadeIn">
      <?php include 'assets/include/header.php'; ?>

      <div class="container text-center" style="margin-top: 200px; margin-bottom: 100px;">
        <img src="assets/images/tache/tache1.jpg" style="position: absolute; z-index: -1; top: -100px; left: -100px; width: 800px;" alt="">
        <img src="assets/images/tache/tache2.jpg" style="position: absolute; z-index: -1; top: 200px; right: 0px; width: 800px;" alt="">
        <h2 class="display-3 text-dark">Welcome to</h2>
        <h1 class="text-dark wow pulse infinite" style="font-family: 'Satisfy'; font-weight: 600; font-size: 152px;">New World</h1>
      </div>

      <div class="container wow fadeIn">
        <div class="jumbotron card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">
          <div class="text-white text-center py-5 px-4">
            <div>
              <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>Projet drive New World with QT and web langage</strong></h2>
              <p class="mx-5 mb-5">Newworld is a site that allows you to buy local products online. Select your relay point according to your choice and have it delivered to your location in no time at all ;)
              </p>
              <a href="#" class="btn btn-outline-white btn-md text-light"><i class="fab fa-github"></i> View github project</a>
            </div>
          </div>
        </div>
      </div>

      <div class="container mb-5">
        <ul class="list-group list-group-horizontal-md">
          <?php
          // Récupération des produits dans la base de données
          $reqProduit = $bdd->prepare("SELECT * FROM produits");
          $reqProduit->execute();
          while($cur = $reqProduit->fetch())
          {
          ?>
          <li class="list-group-item item-produit m-2 border" style="height: 300px;">
            <div class="">
              <a href="#">
                <div class="img pb-1">
                  <img width="150px" class="text-center" src="assets/images/produits/<?php echo $cur["produitImg"]; ?>" alt="">
                </div>
              </a>
              <div class="w-100 p-2" style="position: absolute; bottom: -20px; left:0;">
                <button class="btn btn-primary float-right" type="button" name="button"><i class="fas fa-cart-plus"></i></button>
                <p class="text-left" style="font-size: 27px; font-weight: bold;" class="text-dark"><?php echo $cur['produitPU']; ?> €</p>
                <a href="#" class="text-dark"><p class="text-left" style="max-width: 200px; width: auto; line-height: 10px;"><small><?php echo $cur["produitLib"]; ?><br><?php echo $cur["produitDesc"]; ?></small></p></a>
              </div>
            </div>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </main>

    <?php include 'assets/include/footer.php'; ?>

    <script src="assets/js/toastify/toastify.js" charset="utf-8"></script>
    <script src="assets/js/toastify/script.js" charset="utf-8"></script>
  </body>
</html>
