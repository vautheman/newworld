<!DOCTYPE html>
<?php session_start(); ?>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/css/mdb.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>New world - Inscription</title>
  </head>
  <body>
    <a class="navbar-brand text-dark" href="#"><img src="https://pngimage.net/wp-content/uploads/2018/06/logo-terre-png-1.png" width="50px" class="mr-2 ml-2">New World</a>

    <!--<nav class="navbar navbar-expand-lg navbar-dark">
    </nav>-->
    <!-- Tableau pills affiche les différents formulaires -->
    <div id="inscription-container" class="container">
      <h3 style="font-size: 24px; text-align: center;">Créer un compte</h3>
      <form class="" action="" method="post">
        <div class="btn-connexion">
          <input type="button" class="btn btn-facebook" name="" value="Continuer avec Facebook">
          <input type="button" class="btn btn-google" name="" value="Continuer avec Google">
        </div>
      </form>
      <hr>
      <form class="" action="#" method="post">
        <label for="Email" class="float-left text-dark">E-Mail</label>
        <input required id="cliEmail" onchange="client_verifMail()" type="email" class="form-control" name="mail" placeholder="Votre adresse email">
        <small id="cliErreurMsgMail" class="form-text text-muted">Saisir un email valide !</small>
        <label for="cliPassword" class="float-left text-dark">Mot de passe</label>
        <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="client_verifPw()" id="cliPassword" type="password" name="password" class="form-control" placeholder="Choisissez un mot de passe">
        <!-- Affiche message d'erreur -->
        <small id="cliErreurMsgPw" class="text-danger form-text text-muted">Erreur : Le mot de passe doit contenir au moins 8 caractères, une majuscule et une minuscule</small>
        <div class="d-flex">
          <div><input onchange="rejoindre()" type="checkbox" id="check1" class="mr-2" required></div>
          <div class="p12">
            <label style="text-transform: inherit;" for="check1">J'accepte les conditions de service. Veuillez également lire la politique de confidentialité, notamment la clause Utilisation des cookies.</label>
          </div>
        </div>
        <div class="d-flex">
          <div><input type="checkbox" id="check2" class="mr-2"></div>
          <div class="p12">
            <label style="text-transform: inherit;" for="check2">Me tenir informé(e) des produits, actualités et promotions newWorld.</label>
          </div>
        </div>
        <div class="btn-connexion">
          <button id="btnRejoindre" type="submit" class="btn btn-lg btnRejoindre" value="">Rejoindre newWorld</button>
        </div>
      </form>
      <?php
        if(isset($_POST['mail']) AND isset($_POST['password']))
        {
          // On sécurise les valeurs
          $mail = htmlspecialchars($_POST['mail']);
          $password = $_POST['password'];
          $check1 = $_POST['check1'];
          $check2 = $_POST['check2'];
          if(!empty($mail) AND !empty($password))
          {
            $_SESSION['mail'] = $mail;
            $_SESSION['password'] = $password;
            header("Location: inscriptionBis.php");
          }
        }
      ?>
      <hr>
      <p>Vous êtes déjà membre ? <a href="connexion.php">Se connecter</a></p>
    </div>


    <?php //include 'assets/include/footer.php'; ?>
    <!-- SCRIPT -->
    <!-- control des inputs -->
    <script src="assets/js/inputControl.js" charset="utf-8"></script>
    <script src="assets/js/autocompletition.js" charset="utf-8"></script>
    <script src="assets/js/horaire.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.4/js/mdb.min.js"></script>
  </body>
</html>
