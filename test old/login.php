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
    <script src="assets/js/datagouv.js" charset="utf-8"></script>
    <script type="text/javascript">
      new WOW().init();
    </script>
  </head>
  <body id="login-body" onload="verifPw(), verifMail()">
    <div class="container">
      <div class="row" style="margin-top: 100px;">
        <div class="col-sm-5 m-auto text-center">
          <div class="shadow p-3 mb-5 bg-white rounded wow zoomIn">
            <a href="#" class="btn btn-light w-100 mb-2"><i class="fab fa-google mr-3"></i> Sign in with Google</a>
            <a href="#" class="btn btn-dark w-100 mb-2"><i class="fab fa-github mr-3"></i> Sign in with Github</a>
            <a href="#" class="btn w-100 text-light" style="background: #465996;"><i class="fab fa-facebook-square mr-3"></i> Sign in with Facebook</a>

            <form class="mt-5" action="" method="post">
              <label for="Email" class="float-left text-dark"><small class="text-secondary text-uppercase">E-Mail</small></label>
              <input required id="registerMail" onchange="verifMailRegister(), rejoindre()" type="email" class="form-control" name="userMail" placeholder="Votre adresse email">
              <small id="registerErreurMsgMail" style="visibility:hidden;" class="form-text text-muted">Saisir un email valide !</small>
              <label for="cliPassword" class="float-left text-dark"><small class="text-secondary text-uppercase">Mot de passe</small></label>
              <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="verifPwRegister(), rejoindre()" id="RegisterPassword" type="password" name="userPassword" class="form-control" placeholder="Choisissez un mot de passe">
              <!-- Affiche message d'erreur -->
              <small id="registerErreurMsgPw" class="text-danger form-text text-muted" style="visibility: hidden;">Erreur : Le mot de passe doit contenir au moins 8 caractères, une majuscule et une minuscule</small>

              <div class="btn-connexion mt-4">
                <input id="btnRejoindre" type="submit" class="btn w-100 btnRejoindre btn-dark" value="Login">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
  <script src="assets/js/inputControl.js" charset="utf-8"></script>
</html>
