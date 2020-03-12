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
    <title></title>
  </head>
  <body>
    <?php
    include 'assets/include/menu.php';
    ?>

    <div style="padding-top: 100px;" class="container">
      <h1>Nos produits</h1>
      <hr>
      <div class="row d-flex justify-content-center">
        <?php
        if(isset($_GET['idRayon']))
        {
            $req = $bdd->prepare("SELECT * FROM produits WHERE produitValid = 1 AND produitRayon = ?");
            $req->execute(array($_GET['idRayon']));
            while($cur = $req->fetch())
            {
              ?>
              <div style="width: 300px;" class="card m-2">
                <img class="card-img-top produitsBig" src="assets/images/produits/<?php echo $cur[4]; ?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title"><a><?php echo $cur[2]; ?></a></h4>
                  <p class="card-text"><?php echo $cur[3]; ?></p>
                  <a href="#" class="btn btn-primary">Ajouter</a>
                </div>
              </div>
              <?php
            }
        } else {
          $req = $bdd->prepare("SELECT * FROM produits WHERE produitValid = 1");
          $req->execute();
          while($cur = $req->fetch())
          {
          ?>
          <div style="width: 300px;" class="card m-2">
            <img class="card-img-top produitsBig" src="assets/images/produits/<?php echo $cur[4]; ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a><?php echo $cur[2]; ?></a></h4>
              <p class="card-text"><?php echo $cur[3]; ?></p>
              <a href="#" class="btn btn-primary">Ajouter</a>
            </div>
          </div>
        <?php
          }
        }
        ?>
      </div>
      <div class="m-4">
        <nav aria-label="...">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
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
