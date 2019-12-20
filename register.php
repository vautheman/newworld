<!DOCTYPE html>
<?php include 'assets/include/connectBDD.php'; ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New World</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- SCRIPT -->
    <script src="assets/js/fontawesome.js" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
  <body onload="verifPw(), verifMail(), verifMailConfirm()">
    <a class="text-light btn btn-dark mt-4 ml-4" href="#">Return</a>
    <div class="container">
      <div class="row" style="margin-top: 50px;">

          <?php
          if(isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['role']))
          {
            $mail = htmlspecialchars($_POST['mail']);
            $password = $_POST['password'];
            $role = htmlspecialchars($_POST['role']);
            if(!empty($mail) AND !empty($password) AND !empty($role))
            {
              ?>
              <div class="col-sm">
              <div class="shadow p-3 mb-5 bg-white rounded">
                <form class="form mt-5" action="#" method="post">
                  <?php
                  if($role == 2)
                  {
                    ?>
                    <!-- Information USER -->
                    <h3 class="border-bottom mb-5 text-dark">User Information</h3>
                    <div class="row">
                      <div class="col-lg">
                        <label for="userNom" class="float-left"><small class="text-secondary text-uppercase">Name</small></label>
                        <input type="text" name="userNom" class="form-control" value="" id="userNom" placeholder="ex: Dupond">
                      </div>
                      <div class="col-lg">
                        <label for="userPrenom" class="float-left"><small class="text-secondary text-uppercase">Firstname</small></label>
                        <input type="text" name="userPrenom" class="form-control" value="" id="userPrenom" placeholder="ex: Jean">
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-lg">
                        <label for="userPassword" class="float-left text-dark"><small class="text-secondary text-uppercase">Password</small></label>
                        <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="verifPw()" value="<?php echo $password; ?>" id="userPassword" type="password" name="userPassword" class="form-control" placeholder="Choose a password">
                        <!-- Affiche message d'erreur -->
                        <small id="userErreurMsgPw" class="text-danger form-text text-muted">Error: The password must contain at least 8 characters, one upper case and one lower case.</small>
                      </div>
                      <div class="col-lg">
                        <label for="userPasswordConfirm" class="float-left text-dark"><small class="text-secondary text-uppercase">Confirm password</small></label>
                        <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="verifPwConfirm()" value="" id="userPasswordConfirm" type="password" name="userPasswordConfirm" class="form-control" placeholder="Confirm your password">
                        <!-- Affiche message d'erreur -->
                        <small id="userErreurMsgPw" class="text-danger form-text text-muted">Error: Passwords are not identical</small>
                      </div>
                    </div>

                    <label for="userMail" class="float-left text-dark mt-3"><small class="text-secondary text-uppercase">E-Mail</small></label>
                    <input required id="userMail" onchange="verifMail()" type="email" class="form-control" value="<?php echo $mail; ?>" name="userMail" placeholder="Your email address">
                    <small id="userErreurMsgMail" class="form-text text-muted">Enter a valid email!</small>

                    <div class="row mt-3">
                      <div class="col">
                        <label for="userTelFixe" class="float-left"><small class="text-secondary text-uppercase">Landline phone</small></label>
                        <input type="text" name="userTelFixe" class="form-control" value="" id="userTelFixe" placeholder="Your landline phone">
                      </div>
                      <div class="col">
                        <label for="userTelPort" class="float-left"><small class="text-secondary text-uppercase">Mobile phone</small></label>
                        <input type="text" name="userTelPort" class="form-control" value="" id="userTelPort" placeholder="Your mobile phone">
                      </div>
                    </div>




                    <!-- Information PRODUCTEUR -->
                    <h3 class="border-bottom mb-5 mt-5 text-dark">Producer Information</h3>

                    <div class="row">
                      <div class="col-lg">
                        <label for="prodNomEnt" class="float-left"><small class="text-secondary text-uppercase">Name of the company</small></label>
                        <input type="text" name="prodNomEnt" class="form-control" value="" id="prodNomEnt" placeholder="ex: AgriBio">
                      </div>
                      <div class="col-lg">
                        <label for="prodActivite" class="float-left"><small class="text-secondary text-uppercase">Your activity</small></label>
                        <select class="form-control" name="prodActivite" id="prodActivite">

                        </select>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-lg">
                        <label for="prodAdresse" class="float-left"><small class="text-secondary text-uppercase">Your address</small></label>
                        <input type="text" name="prodAdresse" id="prodAdresse" value="" class="form-control" placeholder="ex: lieu-dit ...">
                      </div>
                      <div class="col-lg">
                        <label for="prodPays" class="float-left"><small class="text-secondary text-uppercase">Your country</small></label>
                        <input type="text" name="prodPays" id="prodPays" value="" placeholder="ex: FRANCE" class="form-control">
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-lg">
                        <label for="prodVille" class="float-left"><small class="text-secondary text-uppercase">Your city</small></label>
                        <input type="text" name="prodVille" id="prodVille" class="form-control" value="" placeholder="ex: GAP">
                      </div>
                      <div class="col-lg">
                        <label for="prodCP" class="float-left"><small class="text-secondary text-uppercase">Your zip code</small></label>
                        <input type="text" name="prodCP" id="prodCP" class="form-control" value="" placeholder="ex: 05000">
                      </div>
                    </div>

                    <label for="prodSiren" class="float-left mt-3"><small class="text-secondary text-uppercase">SIREN</small></label>
                    <input type="text" name="prodSiren" id="prodSiren" class="form-control" value="" placeholder="ex: 05000">

                    <input type="submit" class="btn btn-dark w-100 mt-5 p-3" value="LET'S GO !">

                    <?php
                    // Ajout du producteur
                    if(isset($_POST['userNom']) AND isset($_POST['userPrenom']) AND isset($_POST['userPassword']) AND isset($_POST['userPasswordConfirm']) AND isset($_POST['userMail']) AND isset($_POST['userTelFixe']) AND
                    isset($_POST['prodNomEnt']) AND isset($_POST['prodActivite']) AND isset($_POST['prodAdresse']) AND isset($_POST['prodPays']) AND isset($_POST['prodCP']) AND isset($_POST['prodVille']) AND isset($_POST['prodSiren']))
                    {
                      $userNom = htmlspecialchars($_POST['userNom']);
                      $userPrenom = htmlspecialchars($_POST['userPrenom']);
                      $userEmail = htmlspecialchars($_POST['userMail']);
                      $userTelFixe = htmlspecialchars($_POST['userTelFixe']);
                      $userTelPort = htmlspecialchars($_POST['userTelPort']);
                      $userPassword = sha1($_POST['userPassword']);
                      $userPasswordConfirm = sha1($_POST['userPasswordConfirm']);
                      $userRole = 2;
                      $userDateInscription = date("YYYY-mm-dd");
                      $userKey = mt_rand(10);
                      $userConfirm = 0;

                      $prodNomEnt = htmlspecialchars($_POST['prodNomEnt']);
                      $prodActivite = htmlspecialchars($_POST['prodActivite']);
                      $prodAdresse = htmlspecialchars($_POST['prodAdresse']);
                      $prodPays = htmlspecialchars($_POST['prodPays']);
                      $prodVille = htmlspecialchars($_POST['prodVille']);
                      $prodCP = htmlspecialchars($_POST['prodCP']);
                      $prodSiren = htmlspecialchars($prodSiren['prodSiren']);

		      if(!empty($userNom) AND !empty($userPrenom) AND !empty($userEmail) AND !empty($userTelFixe) AND !empty($userTelPort) AND !empty($userPassword) AND !empty($userPasswordConfirm) AND !empty($prodNomEnt) AND !empty($prodActivite) AND !empty($prodAdresse) AND !empty($prodPays) AND !empty($prodVille) AND !empty($prodCP) AND !empty($prodSiren))
		      {

		      } else echo "Tout les champs doivent être complétés";
                    }
                  }
                  ?>
                </form>
              </div>
              <?php
            }
          } else {
          ?>
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

              <select class="form-control mt-2" name="role">
                <?php
                $reqSelectTypeSign = $bdd->prepare("select * from role");
                $reqSelectTypeSign->execute();
                while($curSelect = $reqSelectTypeSign->fetch())
                {
                  if($curSelect["roleLib"] != "administrateur")
                  {
                  ?>
                    <option value="<?php echo $curSelect["roleId"]; ?>"><?php echo $curSelect['roleLib']; ?></option>
                  <?php
                  }
                }
                ?>
              </select>
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
                <input id="btnRejoindre" disabled type="submit" class="btn w-100 btnRejoindre btn-dark" value="Rejoindre New World">
              </div>

            </form>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>

    <footer class="container-fluid bg-dark mt-5" style="height: 250px;">

    </footer>
  </body>
  <script src="assets/js/inputControl.js" charset="utf-8"></script>
</html>
