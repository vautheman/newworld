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
      <div class="">
        <h1>Mes produits</h1>
        <div class="d-flex justify-content-center">
          <div style="width: 300px;" class="card mr-2">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div style="width: 300px;" class="card mr-2">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
          <div style="width: 300px;" class="card mr-2">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><a>Card title</a></h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
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
