<!DOCTYPE html>
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
    <?php include 'assets/include/menu.php'; ?>
    <div id="banner" class="container-fluid">
      <div id="text-banner" class="text-left text-light">
        <div class="row">
          <div class="col-2">

          </div>
          <div class="col">
            <h1 class="">New World</h1>
            <h4 class="text-light w-75">Retrouvez vos producteur locaux et recevez vos produit dans le point relai près de chez vous !</h4>
            <hr>
          </div>
        </div>
      </div>

    </div>
    <img id="logo" class="img-responsive center-block" src="assets/images/logo.png" alt="">
    <div id="" class="container">
      <form class="form-connexion" action="#" method="get">
        <h4 class="text-light text-left mb-4">Connexion</h4>
        <input id="email" onchange="verifMail()" type="email" name="email" class="form-control mb-4" placeholder="E-mail">
        <input type="password" name="password" class="form-control" placeholder="Mot de passe">
        <button class="btn btn-info my-4 btn-block" onclick="return verif()" type="submit">Connexion</button>
      </form>
      <?php
      include 'assets/include/connectBDD.php';
      if(isset($_GET['email']) AND isset($_GET['password']))
      {
        $email = htmlspecialchars($_GET['email']);
        $password = sha1($_GET['password']);
        if(!empty($email) AND !empty($password))
        {
          $req = $bdd->prepare("SELECT * FROM clients");

          if($req) header("Location: profil.php");
          else echo "Erreur de connexion";
        } else echo "Erreur : Tous les champs doivent être complété !";
      }
      ?>
    </div>

    <?php include 'assets/include/footer.php'; ?>
    <!-- SCRIPT -->
    <!-- control des inputs -->
    <script src="assets/js/inputControl.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js"></script>
  </body>
</html>
