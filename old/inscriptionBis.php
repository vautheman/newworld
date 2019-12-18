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
    <div class="container bis" id="inscription-container">
      <div class="row mt-4">
        <div class="col">
          <h4 class="text-dark mb-4">Type d'inscription</h4>
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true">Client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Producteur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                aria-controls="pills-contact" aria-selected="false">Point relais</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="tab-content pt-2 pl-1" id="pills-tabContent">
        <p class="text-dark text-left"><i>Tous les champs marqués d'une * sont obligatoires</i></p>
        <!-- ***************** CLIENT ********************** -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <form class="text-center" method="post" action="traitement.php">
            <h4 class="text-dark text-left mb-4">Inscription en tant que client</h4>
            <!-- Première partie -->
            <div class="form-row mb-4">
              <!-- Nom -->
              <div class="col">
                <label for="cliNom" class="float-left text-dark">*Nom</label>
                <input required name="cliNom" type="text" class="form-control" placeholder="Votre nom..." id="cliNom">
              </div>
              <!-- Prénom -->
              <div class="col">
                <label for="cliPrenom" class="float-left text-dark">*Prénom</label>
                <input required name="cliPrenom" type="text" class="form-control" placeholder="Votre prénom...">
              </div>
            </div>
            <hr>
            <!-- Deuxième partie -->
            <div class="form-row mb-4">
              <div class="col">
                <!-- E-mail -->
                <label for="cliEmail" class="float-left text-dark">*E-Mail</label>
                <input required id="cliEmail" onchange="client_verifMail()" type="email" class="form-control" name="cliMail" placeholder="E-mail" value="<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];} ?>">
                <!-- Affiche message d'erreur -->
                <small id="cliErreurMsgMail" class="form-text text-muted">Erreur : Veuillez saisir une adresse valide !</small>
                <!-- Phone number -->
                <!-- Le téléphone fixe n'est pas obligatoire -->
                <label for="cliTelFix" class="float-left text-dark">Numéro de téléphone fixe</label>
                <input type="text" id="cliTelFix" class="form-control mb-4" name="cliTelFix" placeholder="Votre numéro de téléphone fixe...(facultatif)">
                <label for="cliTelPort" class="float-left text-dark">*Numéro de téléphone portable</label>
                <input required type="text" class="form-control" name="cliTelPort" placeholder="Votre numéro de téléphone Portable">
              </div>
              <div class="col">
                <!-- Password -->
                <label for="cliPassword" class="float-left text-dark">*Mot de passe</label>
                <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="client_verifPw()" id="cliPassword" type="password" name="cliPassword" class="form-control" placeholder="Votre mot de passe..." value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'];} ?>">
                <!-- Affiche message d'erreur -->
                <small id="cliErreurMsgPw" class="text-danger form-text text-muted">Saisissez un mot de passe valide</small>
                <!-- Password Confirm -->
                <label for="cliPasswordConfirm" class="float-left text-dark">*Confirmation du mot de passe</label>
                <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="client_verifPwConfirm()" id="cliPasswordConfirm" type="password" name="cliPasswordConfirm" class="form-control" placeholder="Confirmer votre mot de passe..." required>
                <!-- Affiche message d'erreur -->
                <small id="cliErreurMsgPwConfirm" class="text-danger form-text text-muted">Erreur : Les mots de passe ne corresponde pas !</small>
                <!-- On fixe un pattern à respecter -->
                <small>8 caractères, 1 majuscule, 1 minuscule</small>
              </div>
            </div>
            <!-- Bouton de validation du formulaire -->
            <input class="btn btn-info" onclick="return verif()" type="submit" value="Valider l'inscription">
            <hr>
            <!-- Termes de service -->
            <p class="text-dark">By AUTHEMAN Victor
              <em>En vous inscrivant,</em> vous acceptez
              <a href="" target="_blank">les termes de service</a>
            </p>
          </form>
        </div>

        <!-- ***************** PRODUCTEUR ********************** -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <!-- Début du formulaire -->
          <form class="text-center" method="get" action="traitement.php">
            <h4 class="text-dark text-left mb-4">Inscription en tant que producteur</h4>
            <!-- Première partie -->
            <div class="form-row mb-4">
              <div class="col">
                <!-- Nom -->
                <label for="prodNom" class="float-left text-dark">*Nom</label>
                <input id="prodNom" type="text" class="form-control" name="prodNom" placeholder="Votre nom...">
              </div>
              <div class="col">
                <!-- Prénom -->
                <label for="prodPrenom" class="float-left text-dark">*Prénom</label>
                <input id="prodPrenom" name="prodPrenom" type="text" class="form-control" placeholder="Votre prénom...">
              </div>
            </div>
            <hr>
            <!-- Deuxième partie -->
            <div class="form-row mb-4">
              <div class="col">
                <!-- E-mail -->
                <label for="prodEmail" class="float-left text-dark">*E-Mail</label>
                <input id="prodEmail" onchange="prod_VerifMail()" type="email" class="form-control" name="prodMail" placeholder="Votre adresse E-mail..." value="<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];} ?>">
                <!-- On affiche un message d'erreur -->
                <small id="prodErreurMsgMail" class="form-text text-muted">Erreur : Veuillez saisir une adresse valide !</small>
                <!-- Phone number -->
                <label for="prodTelFix" class="float-left text-dark">Numéro de téléphone fixe</label>
                <input type="text" class="form-control mb-4" name="prodTelFix" placeholder="Votre numéro de téléphone Fixe...">
                <!-- Le téléphone fix n'est pas obligatoire -->
                <label for="prodTelPort" class="float-left text-dark">*Numéro de téléphone portable</label>
                <input type="text" class="form-control" name="prodTelPort" placeholder="Votre numéro de téléphone Portable... (facultatif)">
              </div>
              <div class="col">
                <!-- Password -->
                <!-- On fixe un pattern à respecter -->
                <label for="prodPassword" class="float-left text-dark">*Mot de passe</label>
                <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="prod_verifPw()" id="prodPassword" type="password" name="prodPassword" class="form-control" placeholder="Votre mot de passe..."  value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'];} ?>">
                <small id="prodErreurMsgPw" class="text-danger form-text text-muted">Erreur : Le mot de passe doit contenir au moins 8 caractères, une majuscule et une minuscule</small>
                <!-- Password Confirm -->
                <label for="prodPasswordConfirm" class="float-left text-dark">*Confirmation du mot de passe</label>
                <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="prod_verifPwConfirm()" id="prodPasswordConfirm" name="prodPasswordConfirm" type="password" class="form-control" placeholder="Confirmer votre mot de passe...">
                <small id="prodErreurMsgPwConfirm" class="text-danger form-text text-muted">Erreur : Les mots de passe ne corresponde pas !</small>
                <small>8 caractères, 1 majuscule, 1 minuscule</small>
              </div>
            </div>
            <!-- Troisième partie -->
            <div class="form-row mb-4">
              <div class="col">
                <!-- Nom de l'entreprise -->
                <label for="prodNomEnt" class="float-left text-dark">*Nom de l'entreprise</label>
                <input id="prodNomEnt" class="form-control mb-4" type="text" name="prodNomEnt" placeholder="Nom de votre entreprise...">
                <!-- Adresse postale de l'entreprise -->
                <label for="prodAdresse" class="float-left text-dark">*Adresse postale</label>
                <input id="prodAdresse" class="form-control" type="text" name="prodAdresse" placeholder="Votre Adresse postale">
              </div>
              <div class="col">
                <!-- Activité du producteur -->
                <label for="prodActivite" class="float-left text-dark">*Activité</label>
                <select id="prodActivite" class="browser-default custom-select mb-4" name="prodActivite">
                  <option value="">Choisir votre activité</option>
                  <option value="Artisanale">Artisanale</option>
                  <option value="Commerciale">Commerciale</option>
                  <option value="Industrielle">Industrielle</option>
                  <option value="Agricole">Agricole</option>
                  <option value="Libérale">Libérale</option>
                </select>
                <label for="prodSiret" class="float-left text-dark">Numéro de SIRET / SIREN</label>
                <input id="prodSiret" class="form-control" type="text" name="prodSiret" placeholder="votre numéro de Siret / Siren">
              </div>
            </div>
            <!-- Bouton de validation du formulaire -->
            <button name="prodInscription" class="btn btn-info my-4 btn-block" onclick="return verif()" type="submit">Valider l'inscription</button>
            <hr>
            <!-- Termes de service -->
            <p class="text-dark">By AUTHEMAN Victor
              <em>En vous inscrivant,</em> vous acceptez
              <a href="" target="_blank">les termes de service</a>
            </p>
          </form>
        </div>
        <!-- ************** POINT RELAI ****************** -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <form class="text-center" action="traitement.php" method="post">
            <h4 class="text-dark text-left mb-4">Inscription en tant que Point Relais</h4>
            <div class="form-row mb-4">
              <div class="col">
                <label for="relaiNom" class="float-left text-dark">*Nom du relai</label>
                <input class="form-control mb-4" type="text" name="relaiNom" placeholder="Le nom de votre relai..." id="relaiNom">
                <label for="e-mail" class="float-left text-dark">*E-mail</label>
                <input class="form-control" type="email" name="relaiEmail" placeholder="Votre E-mail..." id="e-mail"  value="<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];} ?>">
              </div>
              <div class="col">
                <label for="nomGerant" class="float-left text-dark">*Nom du gérant</label>
                <input class="form-control mb-4" type="text" name="relaiNomGerant" placeholder="Nom du gérant..." id="nomGerant">
                <label for="nomGerant" class="float-left text-dark">Site Internet</label>
                <input class="form-control" type="text" name="relaiSite" placeholder="Votre site internet... (facultatif)">
              </div>
            </div>
            <hr>
            <h5 class="text-dark text-left mb-4">Horaire d'ouverture</h5>
            <div class="form-row mb-4">
              <div class="col text-left">
                <?php
                // on déclare les jours de la semaine
                $jour = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
                for($noTour = 0; $noTour<count($jour); $noTour++)
                {
                ?>
                <div style="margin-top: 10px; margin-bottom: 21px;" class="custom-control custom-switch">
                  <input onchange="horaire<?php echo $jour[$noTour]; ?>()" type="checkbox" class="custom-control-input" id="inputHoraire<?php echo $jour[$noTour]; ?>">
                  <label class="custom-control-label text-dark" for="inputHoraire<?php echo $jour[$noTour]; ?>"><?php echo $jour[$noTour]; ?></label>
                </div>
                <?php
                }
                ?>
              </div>
            <div class="col text-left">
              <?php
                for($noTour = 0; $noTour<count($jour); $noTour++)
                {
              ?>
              <div class="row">
                <div style="display: inherit; visibility: hidden;" class="col mb-2" id="dispHoraire<?php echo $jour[$noTour]; ?>">
                  <select id="inputSelectOuverture" onchange="selectHorraire()" class="browser-default custom-select mr-4">
                    <option value="Ouverture à" disabled selected>Ouverture à</option>
                    <option value="24h/24">24h/24</option>
                    <?php
                      for($heure = 0; $heure<24; $heure++)
                      {
                        echo "<option value='$heure:00'>$heure:00</option>";
                        echo "<option value='$heure:30'>$heure:30</option>";
                      }

                    ?>
                  </select>
                  <select id="inputSelectFermeture" onchange="selectHorraire()" class="browser-default custom-select">
                    <option value="Fermeture à" disabled selected>Fermeture à</option>
                    <option value="24h/24">24h/24</option>
                    <?php
                      for($heure = 0; $heure<24; $heure++)
                      {
                        echo "<option value='$heure:00'>$heure:00</option>";
                        echo "<option value='$heure:30'>$heure:30</option>";
                      }

                    ?>
                  </select>
                </div>
              </div>
              <script type="text/javascript">
              function horaire<?php echo $jour[$noTour]; ?>()
              {
                var horaire = document.getElementById('dispHoraire<?php echo $jour[$noTour]; ?>');
                var inputHoraire = document.getElementById('inputHoraire<?php echo $jour[$noTour]; ?>');

                if(inputHoraire.checked)
                {
                  horaire.style.visibility="visible";
                }
                else
                {
                  horaire.style.visibility="hidden";
                }
              }

              function selectHorraire()
              {
                var inputOuverture = document.getElementById('inputSelectOuverture');
                var inputFermeture = document.getElementById('inputSelectFermeture');
                // On vérifie les 24h/24
                if(inputOuverture.value == "24h/24")
                {
                  inputFermeture.style.visibility="hidden";
                } else inputFermeture.style.visibility="visible";
                if(inputFermeture.value == "24h/24")
                {
                  inputOuverture.style.visibility="hidden";
                } else inputOuverture.style.visibility="visible";

                // On vérifie pour demander plus d'horaire
                if(inputOuverture.value !== null && inputFermeture.value !== null)
                {
                  alert("ploum");
                }

              }
              </script>
              <?php
              }
              ?>
            </div>
          </div>
          <hr>
          <h5 class="text-dark text-left mb-4">Situation géographique</h5>
          <div id="address" class="form-row mb-4">
            <div class="col">
              <label for="ville" class="float-left text-dark">*Ville</label>
              <input class="form-control mb-4" name="relaiVille" type="text" id="ville" placeholder="Votre ville...">
              <label for="cp" class="float-left text-dark">*Code Postale</label>
              <input class="form-control" name="relaiCP" type="text" id="cp" placeholder="Votre code postal...">
            </div>
            <div class="col">
              <label for="adresse" class="float-left text-dark">*Adresse postale</label>
              <input class="form-control" name="relaiAdresse" type="text" id="adresse" placeholder="Adresse postale...">
            </div>
          </div>
          <button name="prodInscription" class="btn btn-info my-4 btn-block" onclick="return verif()" type="submit">Valider l'inscription</button>
          <hr>
          <!-- Termes de service -->
          <p class="text-dark">By AUTHEMAN Victor
            <em>En vous inscrivant,</em> vous acceptez
            <a href="" target="_blank">les termes de service</a>
          </p>
          </form>
        </div>
      </div>
      <!-- AUTO COMPLETITION -->


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
