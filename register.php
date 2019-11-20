<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New World</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- SCRIPT -->
    <script src="https://kit.fontawesome.com/3ba462b0e4.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
  <body>
    <a class="text-light btn btn-dark mt-4 ml-4" href="#">Retour</a>
    <div class="container">
      <div class="row" style="margin-top: 50px;">
        <div class="col-sm">
          <h1 class="display-4">Register Form</h1>
          <p class="text-justify mt-5" style="width: 80%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a href="#" class="btn btn-dark mt-5">Contact Administrator</a>
        </div>
        <div class="col-sm-5">
          <div class="shadow p-3 mb-5 bg-white rounded">
            <a href="#" class="btn btn-light w-100 mb-2"><i class="fab fa-google mr-3"></i> Sign in with Google</a>
            <a href="#" class="btn btn-dark w-100 mb-2"><i class="fab fa-github mr-3"></i> Sign in with Github</a>
            <a href="#" class="btn w-100 text-light" style="background: #465996;"><i class="fab fa-facebook-square mr-3"></i> Sign in with Facebook</a>

            <form class="mt-5" action="#" method="post">
              <label for="Email" class="float-left text-dark"><small class="text-secondary text-uppercase">E-Mail</small></label>
              <input required id="cliEmail" onchange="client_verifMail()" type="email" class="form-control" name="mail" placeholder="Votre adresse email">
              <small id="cliErreurMsgMail" class="form-text text-muted">Saisir un email valide !</small>
              <label for="cliPassword" class="float-left text-dark"><small class="text-secondary text-uppercase">Mot de passe</small></label>
              <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="client_verifPw()" id="cliPassword" type="password" name="password" class="form-control" placeholder="Choisissez un mot de passe">
              <!-- Affiche message d'erreur -->
              <small id="cliErreurMsgPw" class="text-danger form-text text-muted">Erreur : Le mot de passe doit contenir au moins 8 caractères, une majuscule et une minuscule</small>
              <div class="d-flex mt-4">
                <div><input onchange="rejoindre()" type="checkbox" id="check1" class="mr-2" required></div>
                <div class="p12">
                  <label style="text-transform: inherit;" for="check1"><small class="text-secondary">J'accepte les conditions de service. Veuillez également lire la politique de confidentialité, notamment la clause Utilisation des cookies.</small></label>
                </div>
              </div>
              <div class="d-flex">
                <div><input type="checkbox" id="check2" class="mr-2"></div>
                <div class="p12">
                  <label style="text-transform: inherit;" for="check2"><small class="text-secondary">Me tenir informé(e) des produits, actualités et promotions newWorld.</small></label>
                </div>
              </div>
              <div class="btn-connexion mt-4">
                <button id="btnRejoindre" type="submit" class="btn w-100 btnRejoindre btn-dark" value="">Rejoindre newWorld</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <footer class="container-fluid bg-dark mt-5" style="height: 250px;">

    </footer>
  </body>
</html>
