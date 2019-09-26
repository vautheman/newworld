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
    <div class="d-flex flex-row bg-light mb-4 pt-4">
      <?php
      $req = $bdd->prepare("SELECT * FROM rayons");
      $req->execute();
      while($cur = $req->fetch())
      {
      ?>
      <a href="produits.php?idRayon=<?php echo $cur[0]; ?>"><div class="p-2 bd-highlight"><img class="rayons" src="assets/images/rayons/<?php echo $cur[4]; ?>"><br><p class="text-center"><?php echo $cur[2]; ?></p></div></a>
    <?php } ?>
    </div>

    <div class="container carte-producteur">
      <h2>Nos producteurs</h2>
      <hr>
      <div class="row">
        <div class="col">
          <div class="card">
            <img class="card-img-top producteurs" src="https://static.timesofisrael.com/fr/uploads/2018/10/TOV6-e1539258240137.jpg" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title"><a>Agriculteur</a></h4>
                <p class="card-text">Florent Augay est un pépiniériste et apiculteur qui mène ces deux activités de front  à Chalmazel dans le département de la Loire. Grâce à son lien avec la nature et une réflexion élaborée depuis plusieurs années, il a développé une nouvelle gestion de la culture des arbres qu’il utilise pour ALTI-PEP.</p>
                <a href="#" class="btn btn-primary">En savoir plus</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img class="card-img-top producteurs" src="http://www.chateauneuf-du-pape-tourisme.fr/sites/chateauneuf-du-pape-tourisme.fr/files/styles/slider_page_detail/public/3144663_3.jpg?itok=NjTJ8QcY" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title"><a>Chocolaterie Bernard Castelain</a></h4>
                <p class="card-text">Plongez dans le monde du chocolat avec la Chocolaterie artisanale Castelain, installée au cœur des vignes de Châteauneuf-du-Pape à 15km d'Avignon. Un site dédié à la gourmandise : 300m2 aux odeurs de Provence et un bar à chocolat.</p>
                <a href="#" class="btn btn-primary">En savoir plus</a>
              </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img class="card-img-top producteurs" src="https://www.ecriplume.com/wp-content/uploads/2013/02/1377051.jpg" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title"><a>Le petit magasin de Madame Bonbon</a></h4>
                <p class="card-text">Ce délicieux lieu de perdition des palais était le Temple du Bonbon. Vous n’y trouviez rien d’autres que des friandises… toutes les friandises dont vous pouviez rêver.</p>
                <a href="#" class="btn btn-primary">En savoir plus</a>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid m-4">
      <h2>Nos Produits</h2>
      <hr>
      <div class="row">
      <!-- Produits -->
      <?php
      $req = $bdd->prepare("SELECT * FROM produits WHERE produitValid = 1");
      $req->execute();
      while($cur = $req->fetch())
      {
      ?>
        <div class="card m-2" style="width: 18rem;">
          <a href="produitSingle.php?idProduit=<?php echo $cur[0]; ?>"><img src="assets/images/produits/<?php echo $cur[4]; ?>" class="card-img-top produits" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title"><?php echo $cur[2] ?><a class="float-right btn btn-primary" href="#">Voir</a></h5>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>

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
