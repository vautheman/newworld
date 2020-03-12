<!DOCTYPE html>
<?php include 'assets/include/connectBDD.php'; ?>
<html lang="fr" dir="ltr">
<div class="loader" style="display: none;">
  <img src="https://cdn-images-1.medium.com/max/1600/0*zzg_YoHtb5wXe98Z.gif" alt="">
	<script type="text/javascript" src="assets/js/jquery-latest.js"></script>
	<script type="text/javascript">
  	$(window).load(function() {
  		$(".loader").fadeOut("1000");
  	})
	</script>
</div>
  <head>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="assets/cdn/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/cdn/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
    <title></title>
  </head>
  <body id="body">
    <?php include 'assets/include/menu.php'; ?>
    <div id="banner" class="container-fluid">
      <div class="row">
        <div class="col banner-text">
          <h1 class=""><b>New World</b></h1>
          <h4 class="">Retrouvez vos producteurs locaux et recevez vos produits dans le point relais près de chez vous !</h4>
          <button type="button" class="btn" name="button">Découvrir les produits</button>
        </div>
        <div class="col-10 banner-img"></div>
      </div>
    </div>
    <div id="sous-banner" class="row">
      <div class="col img-left">
        <div class="row">
          <div class="col"></div>
          <div class="col text">
            <p class="btn aqua-gradient">nouveau</p>
            <h4>Chocolaterie</h4>
          </div>
        </div>
      </div>
      <div class="col img-center">
        <div class="row">
          <div class="col"></div>
          <div class="col text">
            <p class="btn aqua-gradient">nouveau</p>
            <h4>Boulangerie</h4>
          </div>
        </div>
      </div>
      <div class="col img-right">
        <div class="row">
          <div class="col"></div>
          <div class="col text">
            <p class="btn aqua-gradient">nouveau</p>
            <h4>Agriculteur</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg); background-repeat: no-repeat; background-size:cover;">
      <div class="text-white text-center py-5 px-4 my-5">
        <div>
          <h2 class="card-title h1-responsive pt-3 mb-5 font-bold"><strong>New World : Projet Drive, PPE 2019 </strong></h2>
          <p class="mx-5 mb-5">PPE (projet personnel encadré) : Création d'un site de drive où producteur et client peuvent s'inscrire, vendre et acheter des produits selon la localisation des différents points relais.
          </p>
          <a target="_blank" href="https://docs.google.com/document/d/1QfUcgxkbaF7lZk-YFCJD6nZFb9mIXfm5kn9BfqPbH8g" class="btn btn-outline-white btn-md text-light"><i class="fas fa-clone left"></i> View project</a>
        </div>
      </div>
    </div>


    <div class="container">
      <h1 class="text-center">Nos produits</h1>
      <style media="screen">
        #myTab{
          text-align: center !important;
          display: block;
        }
        #myTab li{
          list-style-type: none;
          display: inline-block;
        }
      </style>
      <ul class="text-center nav" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
            aria-selected="false">Contact</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active d-flex flex-row justify-content-between" id="home" role="tabpanel" aria-labelledby="home-tab">
          <?php
            $req = $bdd->prepare("SELECT * FROM produits LIMIT 4");
            $req->execute();
            while($cur = $req->fetch())
            {
          ?>
            <div style="width: 250px;" class=" border border-dark p-2 m-2 text-center">
              <img style="margin: 25px" width="150px" src="assets/images/produits/<?php echo $cur[4]; ?>" alt=""><br>
              <h5 class="text-left"><?php echo $cur[2]; ?></h5>
              <p class="text-left"><?php echo $cur[5]; ?> €</p>
              <button style="max-width: 100px; width: auto; padding: 4px !important;" class="btn btn-primary" type="button" name="button">Add to cart</button>
            </div>
          <?php
            }
          ?>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
      </div>
    </div>

    <section id="homeCard" class="container" style="margin-top: 100px;">
      <div class="row">
        <div style="position: relative;" class="col-4">
          <img src="assets/images/co1.jpg" alt="">
          <div style="width: 80%; position: absolute; top: 50%; left: 50%; transform:translate(-50%, -50%);" class="text-light text-center">
            <h4 class="text-light">NEW COLLECTIONS</h4>
            <h1><b>Season<span>ing</span></b></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <div style="position: relative;" class="col-4">
          <img src="assets/images/co.jpg" alt="">
          <div style="width: 80%; position: absolute; top: 50%; left: 50%; transform:translate(-50%, -50%);" class="text-light text-center">
            <h1><b>Big <span>Sale</span></b></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="col-4">
          <div class="row ">
            <a>
              <div style="position: relative;" class="col mb-2">
                <img class="" src="assets/images/co2.jpg" alt="">
                <div style="width: 80%; position: absolute; top: 50%; left: 50%; transform:translate(-50%, -50%);" class="text-light text-center">
                  <h1><b>Cooking <span>Oil</span></b></h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </a>
            <a>
              <div style="position: relative;" class="col mt-4">
                <img class="" src="assets/images/co3.jpg" alt="">
                <div style="width: 80%; position: absolute; top: 50%; left: 50%; transform:translate(-50%, -50%);" class="text-light text-center">
                  <h1><b>Vegeta<span>ble</span></b></h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>



    <?php include 'assets/include/footer.php'; ?>
    <!-- SCRIPT -->
    <!-- control des inputs -->
    <script src="assets/js/inputControl.js" charset="utf-8"></script>
    <!-- CDN -->
    <script src="assets/cdn/js/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="assets/cdn/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/cdn/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/cdn/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/cdn/js/mdb.min.js"></script>
  </body>
</html>
