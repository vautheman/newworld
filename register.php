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
    <script src="assets/js/ajax/datagouv.js" charset="utf-8"></script>
    <script type="text/javascript">
      new WOW().init();

      // Fonction qui affiche une popup de validation
      function showSuccessSign()
      {
        var modal = document.getElementById('centralModalSuccess');
        modal.style.opacity = "1";
        modal.style.display = "block";
      }

      // Fonction de redirect avec une methode post
      function redirect_post(link, post_var) {
        var form = '';
        $.each(post_var, function(key, value) {
            form+='<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form class="hidden" action="'+link+'" method="get">'+form+'</form>').appendTo('body').submit();
      }
    </script>
  </head>
  <body onload="formNext_ifPasswordIsGood(), formNext_ifMailIsGood(), cMail()">
    <!-- Central Modal Medium Success -->
    <div class="modal wow zoomIn" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <p class="heading lead">Modal Success</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">&times;</span>
            </button>
          </div>

          <!--Body-->
          <div class="modal-body">
            <div class="text-center">
              <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam
                blanditiis ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat.
                Esse ratione fuga, enim, ab officiis totam.</p>
            </div>
          </div>

          <!--Footer-->
          <div class="modal-footer justify-content-center">
            <a type="button" class="btn btn-success">Get it now <i class="far fa-gem ml-1 white-text"></i></a>
            <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <a class="text-light btn btn-dark mt-4 ml-4" href="register.php">Return</a>
    <div class="container">
      <img src="assets/images/tache/tache3.jpg" class="wow fadeIn" style="position: absolute; z-index:-1; width: 1000px; right: 0; top:0;" alt="">
      <div class="row" style="margin-top: 50px;">

          <?php
          // On vérifie si les données du premier formulaire d'inscription existent
          if(isset($_GET['userMail']) AND isset($_GET['userPassword']))
          {
            if(isset($_GET['userRole']))
            {
              // On crée une variable de session avec le numéro de code du role que le nouvel utilisateur a choisi
              $_SESSION['role'] = htmlspecialchars($_GET['userRole']);
            }
            // Si la variable $role existe
            if(isset($_SESSION['role']))
            {
              // On met la varible de session dans une variable plus synthétique
              $role = $_SESSION['role'];
              echo $_SESSION['role'];
              // On sécurise les données dans des variables
              $mail = htmlspecialchars($_GET['userMail']);
              $password = $_GET['userPassword'];
              // Si les données ne sont pas vides
              if(!empty($mail) AND !empty($password) AND !empty($_SESSION['role']))
              {
                ?>
                <div class="col-sm">
                <div class="shadow p-3 mb-5 bg-white rounded">
                  <?php
                  // Si le numéro de code du role est 2 : Producteur
                  if($role == 2)
                  {
                    // On affiche le formulaire du nouveau producteur
                    ?>
                    <form class="form mt-5" action="#" method="get">
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
                          <small id="userErreurMsgPwConfirm" class="text-danger form-text text-muted" style="visibility: hidden;">Error: Passwords are not identical</small>
                        </div>
                      </div>

                      <label for="userMail" class="float-left text-dark mt-3"><small class="text-secondary text-uppercase">E-Mail</small></label>
                      <input required id="userMail" onchange="verifMail(), verifMailExist()" type="email" class="form-control" value="<?php echo $mail; ?>" name="userMail" placeholder="Your email address">
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
                            <option value="ecommerce">ecommerce</option>
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
                    </form>
                    <?php
                    }
                    if($role == 4)
                    {
                    ?>
                    <form class="form mt-5" action="#" method="get">
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
                          <label for="formNext_pwdControl" class="float-left text-dark"><small class="text-secondary text-uppercase">Password</small></label>
                          <input id="formNext_pwdControl" required onchange="formNext_ifPasswordIsGood()" value="<?php echo $password; ?>" type="password" name="userPassword" class="form-control" placeholder="Choose a password">
                          <!-- Affiche message d'erreur -->
                          <small id="formNext_pwdMsg" class="form-text text-danger"></small>
                        </div>
                        <div class="col-lg">
                          <label for="formNext_pwdConfirm" class="float-left text-dark"><small class="text-secondary text-uppercase">Confirm password</small></label>
                          <input required onchange="formNext_ifPasswordIsSimilar()" id="formNext_pwdConfirm" type="password" name="userPasswordConfirm" class="form-control" placeholder="Confirm your password">
                          <!-- Affiche message d'erreur -->
                          <small id="formNext_pwdConfirmMsg" class="form-text text-danger"></small>
                        </div>
                      </div>

                      <label for="formNext_emailControl" class="float-left text-dark"><small class="text-secondary text-uppercase">E-Mail</small></label>
                      <input required id="formNext_emailControl" onchange="formNext_ifMailIsGood()" type="email" class="form-control" value="<?php echo $mail; ?>" name="userMail" placeholder="Your email address">
                      <small id="formNext_emailMsg" class="form-text text-danger"></small>

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


                      <!-- Information RELAY -->
                      <h3 class="border-bottom mb-5 mt-5 text-dark">Relay Information</h3>

                      <div class="row">
                        <div class="col-lg">
                          <label for="relaiNom" class="float-left"><small class="text-secondary text-uppercase">Name of the relay</small></label>
                          <input type="text" name="relaiNom" class="form-control" value="" id="relaiNom" placeholder="ex: Mondial Relay">
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-lg">
                          <label for="relaiAdresse" class="float-left"><small class="text-secondary text-uppercase">Your address</small></label>
                          <input type="text" name="relaiAdresse" onchange="cAdresse()" id="relaiAdresse" value="" class="form-control" placeholder="ex: lieu-dit ...">
                        </div>
                        <div class="col-lg">
                          <label for="relaiPays" class="float-left"><small class="text-secondary text-uppercase">Your country</small></label>
                          <input type="text" name="relaiPays" id="relaiPays" value="" placeholder="ex: FRANCE" class="form-control">
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-lg">
                          <label for="relaiVille" class="float-left"><small class="text-secondary text-uppercase">Your city</small></label>
                          <input type="text" name="relaiVille" onchange="cVille()" id="relaiVille" class="form-control" value="" placeholder="ex: GAP">
                        </div>
                        <div class="col-lg">
                          <label for="relaiCP" class="float-left"><small class="text-secondary text-uppercase">Your zip code</small></label>
                          <input type="text" name="relaiCP" id="relaiCP" class="form-control" value="" placeholder="ex: 05000">
                        </div>
                      </div>

                      <button type="button" name="button" onclick="test()">test</button>

                      <input type="submit" onclick="test()" class="btn btn-dark w-100 mt-5 p-3" value="LET'S GO !">


                      <?php

                    }
                    ?>
                  </form>
                </div>
                <?php
              }
            }
          } else {
          ?>
          <div class="col-sm wow fadeIn">
            <h1 class="display-4" style="font-family: 'Satisfy'; font-size: 64pt;">Register Form</h1>
            <p class="text-justify mt-5" style="width: 80%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="btn btn-dark mt-5">Contact Administrator</a>
          </div>
          <div class="col-sm-5">

          <div class="shadow p-3 mb-5 bg-white rounded wow fadeInRight">
            <a href="#" class="btn btn-light w-100 mb-2"><i class="fab fa-google mr-3"></i> Sign in with Google</a>
            <a href="#" class="btn btn-dark w-100 mb-2"><i class="fab fa-github mr-3"></i> Sign in with Github</a>
            <a href="#" class="btn w-100 text-light" style="background: #465996;"><i class="fab fa-facebook-square mr-3"></i> Sign in with Facebook</a>

            <form class="mt-5" action="" method="get">
              <label for="Email" class="float-left text-dark"><small class="text-secondary text-uppercase">E-Mail</small></label>
              <input id="form0_emailControl" required onchange="form0_ifMailIsGood()" type="email" class="form-control" name="userMail" placeholder="Votre adresse email">
              <small id="form0_emailMsg" class="text-danger"></small>
              <small id="registerErreurMsgMail" style="visibility:hidden;" class="form-text text-danger text-muted">Saisir un email valide !</small>
              <!-- Control : Mot de passe -->
              <label for="cliPassword" class="float-left text-dark"><small class="text-secondary text-uppercase">Mot de passe</small></label>
              <input id="form0_pwdControl" required onchange="form0_ifPasswordIsGood()" type="password" name="userPassword" class="form-control password" placeholder="Choisissez un mot de passe">
              <small id="form0_pwdMsg" class="form-text text-danger"></small>

              <select class="form-control mt-5" name="userRole">
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
                <div><input onchange="form0_ifCheckIsGood()" type="checkbox" id="check1" class="mr-2" required></div>
                <div class="p12">
                  <label style="text-transform: inherit;" for="check1"><small class="text-secondary">J'accepte les conditions de service. Veuillez également lire la politique de confidentialité, notamment la clause Utilisation des cookies.</small></label>
                </div>
                <small id="check_msg"></small>
              </div>
              <div class="d-flex">
                <div><input type="checkbox" id="check2" class="mr-2"></div>
                <div class="p12">
                  <label style="text-transform: inherit;" for="check2"><small class="text-secondary">Me tenir informé(e) des produits, actualités et promotions newWorld.</small></label>
                </div>
              </div>
              <div class="btn-connexion mt-4">
                <input id="form0_submit" disabled type="submit" class="btn w-100 btnRejoindre btn-dark" value="Rejoindre New World">
              </div>

            </form>
          </div>
        <?php
        }
        // *********** AJOUT DE L'UTILISATEUR ************* //
        // Si toute les données de l'utilisateur existent
        if(isset($_GET['userNom']) AND isset($_GET['userPrenom']) AND isset($_GET['userPassword']) AND isset($_GET['userPasswordConfirm']) AND isset($_GET['userMail']) AND isset($_GET['userTelFixe']))
        {
          // On stocke les données de l'utilisateur dans des variables
          $userNom = htmlspecialchars($_GET['userNom']);
          $userPrenom = htmlspecialchars($_GET['userPrenom']);
          $userEmail = htmlspecialchars($_GET['userMail']);
          $userTelFixe = htmlspecialchars($_GET['userTelFixe']);
          $userTelPort = htmlspecialchars($_GET['userTelPort']);
          $userPassword = sha1($_GET['userPassword']);
          $userPasswordConfirm = sha1($_GET['userPasswordConfirm']);
          $userRole = 2;
          // On fixe la date de l'inscription à aujourd'hui
          $userDateInscription = date("Y-m-d");
          // On crée une clé d'identification pour la vérification par mail
          $userKey = "";
          for($i=1;$i<15;$i++) {
            $userKey .= mt_rand(0,9);
          }
          // On fixe la confirmation du mail à 0
          $userConfirm = 0;

          // Si toutes les données de l'utilisateur ne sont pas vides
          if(!empty($userNom) AND !empty($userPrenom) AND !empty($userEmail) AND !empty($userTelFixe) AND !empty($userTelPort) AND !empty($userPassword) AND !empty($userPasswordConfirm))
          {
            // On prépare la requête pour l'ajout de l'utilisateur à la base de données
            $reqUser = $bdd->prepare("INSERT INTO utilisateur(userNom, userPrenom, userEmail, userTelFixe, userTelPort, userPasswd, userRole, userDateInscription, userKey, userConfirm) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // Si la requête est correctement exécuté, alors ...
            if($reqUser->execute(array($userNom, $userPrenom, $userEmail, $userTelFixe, $userTelPort, $userPassword, $userRole, $userDateInscription, $userKey, $userConfirm)))
            {
              // On récupère l'identifiant unique de l'utilisateur créer par l'auto_increment grâce au mail et la clé d'identification du mail
              // On prépare la requete
              $reqUserId = $bdd->prepare("SELECT userId from utilisateur where userKey = ? AND userEmail = ?");
              // Puis on l'exécute
              $reqUserId->execute(array($userKey, $userEmail));
              // On stocke son identifiant récupéré dans une variable
              $userId = $reqUserId->fetch();

              // Si toutes les données du nouveau producteurs existent
              if(isset($_GET['prodNomEnt']) AND isset($_GET['prodActivite']) AND isset($_GET['prodAdresse']) AND isset($_GET['prodPays']) AND isset($_GET['prodCP']) AND isset($_GET['prodVille']) AND isset($_GET['prodSiren']))
              {
                // On stocke toutes les données dans des variables
                $prodNomEnt = htmlspecialchars($_GET['prodNomEnt']);
                $prodActivite = htmlspecialchars($_GET['prodActivite']);
                $prodAdresse = htmlspecialchars($_GET['prodAdresse']);
                $prodPays = htmlspecialchars($_GET['prodPays']);
                $prodVille = htmlspecialchars($_GET['prodVille']);
                $prodCP = htmlspecialchars($_GET['prodCP']);
                $prodSiren = htmlspecialchars($_GET['prodSiren']);

                // Si toutes les données du nouveau producteur ne sont pas vides
                if(!empty($prodNomEnt) AND !empty($prodActivite) AND !empty($prodAdresse) AND !empty($prodPays) AND !empty($prodVille) AND !empty($prodCP) AND !empty($prodSiren))
                {
                  // On prépare la requête pour l'ajout du producteur dans la base de données
                  $reqProd = $bdd->prepare("INSERT INTO producteurs(prodnomEnt, prodActivite, prodAdresse, prodPays, prodVille, prodCP, prodSIREN, userId) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

                  // Si la requete d'ajout du nouveau producteur dans la base de données s'execute correctement
                  if($reqProd->execute(array($prodNomEnt, $prodActivite, $prodAdresse, $prodPays, $prodVille, $prodCP, $prodSiren, $userId['userId'])))
                  {
                    // On crée le mail que l'on va envoyer au nouvel utilisateur
                    $header="MIME-Version: 1.0\r\n";
      							$header.='From: "kvmserver.ddns.net"<contact@autheman-victor.fr>'."\n";
      							$header.='Content-Type:text/html; charset"utf-8"'."\n";
      							$header.='Content-Transfer-Encoding: 8bit';

      							$messageMail='
      							<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      							"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      							<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      							"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      							<html xmlns:v="urn:schemas-microsoft-com:vml">
      								<head>
      									<meta http-equiv="content-type" content="text/html; charset=utf-8">
      									<meta charset="utf8">
      									<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
      								</head>
      								<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
      									<table bgcolor="#242943"width="100%" border="0" cellpadding="0" cellspacing="0">
      										<tbody>
      											<tr>
      												<td bgcolor="#242943">
      													<div>
      														<table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
      															<tbody>
      															<tr>
      																<td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
      															</tr>
      															<tr>
      																<td align="center" style="text-align:center;">
      																	<a href="http://autheman-victor.fr">
      																		<img src="http://autheman-victor.fr/ancienSite/images/logo.png" width="78" border="0" alt="Logo autheman-victor.fr">
      																	</a>
      																</td>
      															</tr>
      															<tr>
      																<td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
      															</tr>
      															<tr>
      																<td align="center" style="font-family: Helvetica, sans-serif; text-align: center; font-size:32px; color: #FFF; mso-line-height-rule: exactly; line-height: 28px;">
      																	Confirmation de votre compte
      																</td>
      															</tr>
      															<tr>
      																<td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
      															</tr>
      															<tr>
      																<td align="center" style="font-family: Helvetica, sans-serif; text-align: center; font-size:15px; color: #878b99; mso-line-height-rule: exactly; line-height: 26px;">
      																	<a href="kvmserver.ddns.net/newworld/registerConfirm.php?user'.urlencode($userEmail).'&key='.$userKey.'">Confirmation</a>
      																</td>
      															</tr>
      															<tr>
      																<td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
      															</tr>
      															</tbody>
      														</table>
      													</div>

      												</td>
      											</tr>
      										</tbody>
      									</table>
      								</body>
      							</html>
      							';
                    // On envoi le mail de confirmation
      							mail($userEmail, "Confirmation de compte", $messageMail, $header);
                    ?>
                    <script type="text/javascript">
                      addCoordBdd();
                      showSuccessSign();
                    </script>
                    <?php
                  } else $msgError = "Un problème est survenu lors de l'ajout à la base de données";
                } else $msgError = "Tous les champs doivent être complétés";
              }
              // Si toutes les données du nouveau point relai existent
              if(isset($_GET['relaiNom']) AND isset($_GET['relaiPays']) AND isset($_GET['relaiVille']) AND isset($_GET['relaiCP']) AND isset($_GET['relaiAdresse']))
              {
                // On stocke toutes les données dans des variables
                $relaiNom = htmlspecialchars($_GET['relaiNom']);
                $relaiPays = htmlspecialchars($_GET['relaiPays']);
                $relaiCP = htmlspecialchars($_GET['relaiCP']);
                $relaiVille = htmlspecialchars($_GET['relaiVille']);
                $relaiAdresse = htmlspecialchars($_GET['relaiAdresse']);
                $userId = $userId['userId'];

                // Si toutes les données ne sont pas vides
                if(!empty($relaiNom) AND !empty($relaiPays) AND !empty($relaiCP) AND !empty($relaiVille) AND !empty($relaiAdresse))
                {
                  // On prepare la requête d'ajout du point relai dans la base de données
                  $reqAddPr = $bdd->prepare("INSERT INTO pointRelai(relaiNom, relaiPays, relaiVille, relaiCP, relaiAdresse, userId) VALUES (?, ?, ?, ?, ?, ?)");

                  // Si le point relai a bien été ajouté à la base de données
                  if($reqAddPr->execute(array($relaiNom, $relaiPays, $relaiVille, $relaiCP, $relaiAdresse, $userId)))
                  {
                    ?>
                    <script type="text/javascript">
                      addCoordBdd();
                      showSuccessSign();
                    </script>
                    <?php
                  } else $msgError = "Un problème est survenu lors de l'ajout à la base de données";
                } else $msgError = "Tous les champs doivent être complétés";
                $relaiNom = htmlspecialchars($_POST['relai']);
              }
            } else $msgError = "Un problème est survenu lors de l'ajout à la base de données";
          } else $msgError = "Tous les champs doivent être complétés";
        }
        ?>
        </div>
      </div>
    </div>





    <?php
    if(isset($_GET['valid']))
    {
      if($_GET['valid'] == 1)
      {
        ?>
        <script type="text/javascript">
          showSuccessSign();
        </script>
        <?php
      }
    }

    if(isset($msgError)){
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert" style="position:fixed; top: 30px; right: 50px; z-index:2;">
        <i class="fas fa-eye mr-2"></i> <?php echo $msgError; ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
    ?>
    <!--
    <footer class="container-fluid bg-dark mt-5" style="height: 250px;">

    </footer>
  -->
  </body>
  <script src="assets/js/inputControl.js" charset="utf-8"></script>
  <script src="assets/js/ajax/verifMail.js" charset="utf-8"></script>
</html>
