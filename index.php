<!DOCTYPE html>
<?php include 'assets/include/connectBDD.php'; ?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>New World</title>
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/wow.css">
  <!-- SCRIPT -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="assets/js/wow.js" charset="utf-8"></script>
  <script type="text/javascript">
    new WOW().init();
  </script>
</head>
  <body>
    <main class="container-fluid p-0 wow fadeIn">
      <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="row">
          <div class="col-sm d-flex flex-row flex-wrap">
            <h4 class="text-dark mt-1"><i class="fas fa-globe-europe"></i> New World</h4>
            <form class="form w-50 ml-4" action="index.html" method="post">
              <input type="text" class="form-control" name="" value="" placeholder="Search ...">
            </form>
          </div>
          <div class="col-sm d-flex flex-row flex-wrap justify-content-end">
            <ul class="nav">
              <li class="nav-item">
                <a href="#" class="nav-link text-dark">Home</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-dark">Store</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-dark"><i class="fas fa-user"></i> Login</a>
              </li>
              <li>
                <a href="register.php" class="btn btn-primary p-2 pl-3 pr-3 bg-primary mr-2 text-capitalize"><i class="fas fa-sign-in-alt"></i></i> Register Now</a>
              </li>
              <li>
                <a href="#" class="btn btn-dark p-2 pl-3 pr-3 bg-dark text-capitalize"><i class="fab fa-github"></i> Github</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

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
        <div class="d-flex flex-row justify-content-between flex-wrap">
          <!-- Card -->
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div class="card wow zoomIn mb-4" style="width: 22rem;">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
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
