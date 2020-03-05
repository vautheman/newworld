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

      <div class="container text-center" style="margin-top: 100px; margin-bottom: 100px;">
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

      <div class="container">
        <div class="d-flex flex-row justify-content-left flex-wrap">
          <div class="item">
            <div class="img">
              <img width="150px" src="assets/images/banane.jpg" alt="">
            </div>
            <p style="max-width: 150px; width: auto; line-height: 10px;">
              <small>Banane Bio contaminé par le coronavirus</small>
            </p>
            <p>
              <span style="font-size: 27px; font-weight: bold; color: red;">399€</span>
            </p>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-between flex-wrap">
          <!-- Card -->
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="assets/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="assets/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="assets/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="assets/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php include 'assets/include/footer.php'; ?>
  </body>
</html>
