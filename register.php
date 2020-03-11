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
  <body onload="verifPw(), verifMail()">
    <a class="text-light btn btn-dark mt-4 ml-4" href="javascript:history.go(-1)">Return</a>
    <div class="container">
      <img src="assets/images/tache/tache3.jpg" class="wow fadeIn" style="position: absolute; z-index:-1; width: 1000px; right: 0; top:0;" alt="">
      <div class="row" style="margin-top: 50px;">

          <?php
          if(isset($_POST['userMail']) AND isset($_POST['userPassword']) AND isset($_POST['userRole']))
          {
            $mail = htmlspecialchars($_POST['userMail']);
            $password = $_POST['userPassword'];
            $role = htmlspecialchars($_POST['userRole']);
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
                        <small id="userErreurMsgPwConfirm" class="text-danger form-text text-muted" style="visibility: hidden;">Error: Passwords are not identical</small>
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

                    <?php

                  }
                  if($role == 4)
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
                        <small id="userErreurMsgPwConfirm" class="text-danger form-text text-muted" style="visibility: hidden;">Error: Passwords are not identical</small>
                      </div>
                    </div>

                    <label for="userMail" class="float-left text-dark"><small class="text-secondary text-uppercase">E-Mail</small></label>
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
                        <input type="text" name="relaiAdresse" id="relaiAdresse" value="" class="form-control" placeholder="ex: lieu-dit ...">
                      </div>
                      <div class="col-lg">
                        <label for="relaiPays" class="float-left"><small class="text-secondary text-uppercase">Your country</small></label>
                        <input type="text" name="relaiPays" id="relaiPays" value="" placeholder="ex: FRANCE" class="form-control">
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col-lg">
                        <label for="relaiVille" class="float-left"><small class="text-secondary text-uppercase">Your city</small></label>
                        <input type="text" name="relaiVille" id="relaiVille" class="form-control" value="" placeholder="ex: GAP">
                      </div>
                      <div class="col-lg">
                        <label for="relaiCP" class="float-left"><small class="text-secondary text-uppercase">Your zip code</small></label>
                        <input type="text" name="relaiCP" id="relaiCP" class="form-control" value="" placeholder="ex: 05000">
                      </div>
                    </div>

                    <h3 class="border-bottom mb-5 mt-5 text-dark">Timetable</h3>
                    <div class="row" id="TimetableRow">
                      <div class="col-lg">
                        <?php
                        $day = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
                        for($noTourDay = 0; $noTourDay<7; $noTourDay++)
                        {
                        ?>
                          <div class="d-flex">
                            <div class="custom-control custom-switch mb-2" style="width: 200px;">
                              <input type="checkbox" class="custom-control-input" onclick="timetable_check()" id="check<?php echo $day[$noTourDay]; ?>">
                              <label class="custom-control-label" for="check<?php echo $day[$noTourDay]; ?>"><?php echo $day[$noTourDay]; ?></label>
                            </div>
                            <div id="select<?php echo $day[$noTourDay]; ?>" style="visibility:hidden;">
                              <select style="margin-left: 100px;" class="mr-3" name="" required>
                                <option disabled selected hidden>Opening Hours</option>
                                <option value="24h/24">24h/24</option>
                                <?php
                                $heure = 24;
                                $minute = array("00", "30");
                                for($tour = 0; $tour<$heure; $tour++)
                                {
                                  for($tourMin = 0; $tourMin<count($minute); $tourMin++)
                                  {
                                    echo "<option value=".$tour.":".$minute[$tourMin].">".$tour.":".$minute[$tourMin]."</option>";
                                  }
                                }
                                ?>
                              </select> -
                              <select class="ml-3" name="">
                                <option disabled selected hidden>Closing Hours</option>
                                <option value="24h/24">24h/24</option>
                                <?php
                                $heure = 24;
                                $minute = array("00", "30");
                                for($tour = 0; $tour<$heure; $tour++)
                                {
                                  for($tourMin = 0; $tourMin<count($minute); $tourMin++)
                                  {
                                    echo "<option value=".$tour.":".$minute[$tourMin].">".$tour.":".$minute[$tourMin]."</option>";
                                  }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        <?php } ?>

                        <script type="text/javascript">
                          function timetable_check()
                          {
                            var checkLundi = document.getElementById("checkLundi");
                            var selectLundi = document.getElementById("selectLundi");

                            var checkMardi = document.getElementById("checkMardi");
                            var selectMardi = document.getElementById("selectMardi")

                            var checkMercredi = document.getElementById("checkMercredi");
                            var selectMercredi = document.getElementById("selectMercredi");

                            var checkJeudi = document.getElementById("checkJeudi");
                            var selectJeudi = document.getElementById("selectJeudi");

                            var checkVendredi = document.getElementById("checkVendredi");
                            var selectVendredi = document.getElementById("selectVendredi");

                            var checkSamedi = document.getElementById("checkSamedi");
                            var selectSamedi = document.getElementById("selectSamedi");

                            var checkDimanche = document.getElementById("checkDimanche");
                            var selectDimanche = document.getElementById("selectDimanche");
                            if(checkLundi.checked == true)
                            {
                              selectLundi.style.visibility = "visible";
                            } else selectLundi.style.visibility = "hidden";

                            if(checkMardi.checked == true)
                            {
                              selectMardi.style.visibility = "visible";
                            } else selectMardi.style.visibility = "hidden";

                            if(checkMercredi.checked == true)
                            {
                              selectMercredi.style.visibility = "visible";
                            } else selectMercredi.style.visibility = "hidden";

                            if(checkJeudi.checked == true)
                            {
                              selectJeudi.style.visibility = "visible";
                            } else selectJeudi.style.visibility = "hidden";

                            if(checkVendredi.checked == true)
                            {
                              selectVendredi.style.visibility = "visible";
                            } else selectVendredi.style.visibility = "hidden";

                            if(checkSamedi.checked == true)
                            {
                              selectSamedi.style.visibility = "visible";
                            } else selectSamedi.style.visibility = "hidden";

                            if(checkDimanche.checked == true)
                            {
                              selectDimanche.style.visibility = "visible";
                            } else selectDimanche.style.visibility = "hidden";
                          }
                        </script>
                      </div>
                    </div>

                    <input type="submit" class="btn btn-dark w-100 mt-5 p-3" onclick="adresseInput()" value="LET'S GO !">


                    <?php

                  }
                  ?>
                </form>
              </div>
              <?php
            }
          } else {
          ?>
          <div class="col-sm wow fadeIn">
            <h1 class="display-4">Register Form</h1>
            <p class="text-justify mt-5" style="width: 80%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="btn btn-dark mt-5">Contact Administrator</a>
          </div>
          <div class="col-sm-5">

          <div class="shadow p-3 mb-5 bg-white rounded wow fadeInRight">
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

              <select class="form-control mt-2" name="userRole">
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
        <?php }
        // *********** AJOUT DE L'UTILISATEUR ************* //
        // Si toute les données de l'utilisateur existent
        if(isset($_POST['userNom']) AND isset($_POST['userPrenom']) AND isset($_POST['userPassword']) AND isset($_POST['userPasswordConfirm']) AND isset($_POST['userMail']) AND isset($_POST['userTelFixe']))
        {
          // On stocke les données de l'utilisateur dans des variables
          $userNom = htmlspecialchars($_POST['userNom']);
          $userPrenom = htmlspecialchars($_POST['userPrenom']);
          $userEmail = htmlspecialchars($_POST['userMail']);
          $userTelFixe = htmlspecialchars($_POST['userTelFixe']);
          $userTelPort = htmlspecialchars($_POST['userTelPort']);
          $userPassword = sha1($_POST['userPassword']);
          $userPasswordConfirm = sha1($_POST['userPasswordConfirm']);
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

          // On récupère l'identifiant unique de l'utilisateur créer par l'auto_increment grâce au mail et la clé d'identification du mail
          // On prépare la requete
          $reqUserId = $bdd->prepare("SELECT userId from utilisateur where userKey = ? AND userEmail = ?");
          // Puis on l'exécute
          $reqUserId->execute(array($userKey, $userEmail));
          // on stocke son identifiant récupéré dans une variable
          $userId = $reqUserId->fetch();

          // Si toutes les données de l'utilisateur ne sont pas vides
          if(!empty($userNom) AND !empty($userPrenom) AND !empty($userEmail) AND !empty($userTelFixe) AND !empty($userTelPort) AND !empty($userPassword) AND !empty($userPasswordConfirm))
          {
            // On prépare la requête pour l'ajout de l'utilisateur à la base de données
            $reqUser = $bdd->prepare("INSERT INTO utilisateur(userNom, userPrenom, userEmail, userTelFixe, userTelPort, userPasswd, userRole, userDateInscription, userKey, userConfirm) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // Si la requête est correctement exécuté, alors ...
            if($reqUser->execute(array($userNom, $userPrenom, $userEmail, $userTelFixe, $userTelPort, $userPassword, $userRole, $userDateInscription, $userKey, $userConfirm)))
            {
              // Si toutes les données du nouveau producteurs existent
              if(isset($_POST['prodNomEnt']) AND isset($_POST['prodActivite']) AND isset($_POST['prodAdresse']) AND isset($_POST['prodPays']) AND isset($_POST['prodCP']) AND isset($_POST['prodVille']) AND isset($_POST['prodSiren']))
              {
                // On stocke toutes les données dans des variables
                $prodNomEnt = htmlspecialchars($_POST['prodNomEnt']);
                $prodActivite = htmlspecialchars($_POST['prodActivite']);
                $prodAdresse = htmlspecialchars($_POST['prodAdresse']);
                $prodPays = htmlspecialchars($_POST['prodPays']);
                $prodVille = htmlspecialchars($_POST['prodVille']);
                $prodCP = htmlspecialchars($_POST['prodCP']);
                $prodSiren = htmlspecialchars($_POST['prodSiren']);

                // Si toutes les données du nouveau producteur ne sont pas vides
                if(!empty($prodNomEnt) AND !empty($prodActivite) AND !empty($prodAdresse) AND !empty($prodPays) AND !empty($prodVille) AND !empty($prodCP) AND !empty($prodSiren))
                {
                  // On prépare la requête pour l'ajout du producteur dans la base de données
                  $reqProd = $bdd->prepare("INSERT INTO producteurs(prodnomEnt, prodActivite, prodAdresse, prodPays, prodVille, prodCP, prodSIREN, userId) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

                  // Si la requete d'ajout du nouveau producteur dans la base de données s'execute correctement
                  if($reqProd->execute(array($prodNomEnt, $prodActivite, $prodAdresse, $prodPays, $prodVille, $prodCP, $prodSiren, $userId["userId"])))
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
      							mail($email, "Confirmation de compte", $messageMail, $header);
                    ?>
                    <SCRIPT LANGUAGE="JavaScript">
                      document.location.href="registerValid.php";
                    </SCRIPT>
                    <?php
                  } else $msgError = "Un problème est survenu lors de l'ajout à la base de données";
                } else echo "fail add";
              }  else $msgError = "Tous les champs doivent être complétés";
              // Si toutes les données du nouveau point relai existent
              if(isset($_POST['relaiNom']) AND isset($_POST['relaiPays']) AND isset($_POST['relaiVille']) AND isset($_POST['relaiCP']) AND isset($_POST['relaiAdresse']))
              {
                // On stocke toutes les données dans des variables
                $relaiNom = htmlspecialchars($_POST['relai']);
              }
            } else $msgError = "Un problème est survenu lors de l'ajout à la base de données";
          } else $msgError = "Tous les champs doivent être complétés";
        }
        ?>
        </div>
      </div>
    </div>

    <footer class="container-fluid bg-dark mt-5" style="height: 250px;">

    </footer>
  </body>
  <script src="assets/js/inputControl.js" charset="utf-8"></script>
</html>
