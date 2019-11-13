<?php
include 'assets/include/connectBDD.php';
// On récupère toutes les données qui concernent le formulaire du client
if(isset($_POST['cliNom']) AND isset($_POST['cliPrenom']) AND isset($_POST['cliMail']) AND isset($_POST['cliTelPort']) AND isset($_POST['cliPassword']) AND isset($_POST['cliPasswordConfirm']))
{
  // On sécurise toutes les valeurs
  $cliNom = htmlspecialchars($_POST['cliNom']);
  $cliPrenom = htmlspecialchars($_POST['cliPrenom']);
  $cliMail = htmlspecialchars($_POST['cliMail']);
  $cliTelPort = htmlspecialchars($_POST['cliTelPort']);
  $cliTelFix = htmlspecialchars($_POST['cliTelFix']);
  // On crypte le mot de passe
  $cliPassword = sha1($_POST['cliPassword']);
  $cliPasswordConfirm = sha1($_POST['cliPasswordConfirm']);

  // On ajoute un grain de sel
  // $salt = "dqf@5545qf";

  if(!empty($cliNom) AND !empty($cliPrenom) AND !empty($cliMail) AND !empty($cliTelPort) AND !empty($cliPassword) AND !empty($cliPasswordConfirm))
  {
    // On vérifie si l'email est valide
    if(filter_var($cliMail, FILTER_VALIDATE_EMAIL))
    {
      // On vérifie si l'email n'existe pas ou si il n'est pas identique à une autre
      $reqMail = $bdd->prepare("SELECT * FROM clients WHERE cliEmail = ?");
      $reqMail->execute(array($cliMail));
      $mailExist = $reqMail->rowCount();
      // Si elle est unique
      if($mailExist == 0)
      {
        if($cliPassword == $cliPasswordConfirm)
        {
          // On créer une clé d'identification
          $longueurKey = 15;
          $key = "";
          for($i=1;$i<$longueurKey;$i++) {
            $key .= mt_rand(0,9);
          }
          $req = $bdd->prepare("INSERT INTO clients(cliNom, cliPrenom, cliEmail, cliPw, cliTelFix, cliTelPort, cliKey) VALUES(?, ?, ?, ?, ?, ?, ?)");
          $req->execute(array($cliNom, $cliPrenom, $cliMail, $cliPassword, $cliTelFix, $cliTelPort, $key));

          // On envoie le mail de confirmation
          $header="MIME-Version: 1.0\r\n";
          $header.='From: "autheman-victor.fr"<contact@autheman-victor.fr>'."\n";
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
              <table bgcolor="#112f41"width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td bgcolor="#112f41">
                      <div>
                        <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                          <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center" style="text-align:center;">
                              <a href="https://www.newworld.com">
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
                              <a href="http://autheman-victor.fr/newworld/confirmation.php?class=client&email='.urlencode($cliMail).'&key='.$key.'">Confirmation</a>
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

          mail($cliMail, "Confirmation de compte", $messageMail, $header);
          echo "Un mail de confirmation vous à été envoyé !";
        } else echo "Les mots de passe ne sont pas identiques";
      } else echo "Le mail est deja existant"; // Sinon si le mail est déjà existant, on affiche un message d'erreur
    }
  } else echo "Les valeurs ne peuvent pas êtres vides !";
}

// On récupère toutes les données qui concernent le formulaire du client
if(isset($_GET['prodNom']) AND isset($_GET['prodPrenom']) AND isset($_GET['prodMail']) AND isset($_GET['prodTelPort']) AND isset($_GET['prodPassword']) AND isset($_GET['prodPasswordConfirm']) AND isset($_GET['prodNomEnt']) AND isset($_GET['prodAdresse']) AND isset($_GET['prodActivite']) AND isset($_GET['prodSiret']))
{
  // On securise les valeurs
  $prodNom = htmlspecialchars($_GET['prodNom']);
  $prodPrenom = htmlspecialchars($_GET['prodPrenom']);
  $prodMail = htmlspecialchars($_GET['prodMail']);
  $prodTelPort = htmlspecialchars($_GET['prodTelPort']);
  $prodTelFix = htmlspecialchars($_GET['prodTelFix']);
  // On crypte le mot de passe
  $prodPassword = sha1($_GET['prodPassword']);
  $prodPasswordConfirm = sha1($_GET['prodPasswordConfirm']);

  $prodNomEnt = htmlspecialchars($_GET['prodNomEnt']);
  $prodAdresse = htmlspecialchars($_GET['prodAdresse']);
  $prodActivite = htmlspecialchars($_GET['prodActivite']);
  $prodSiret = htmlspecialchars($_GET['prodSiret']);

  if(!empty($prodNom) AND !empty($prodPrenom) AND !empty($prodMail) AND !empty($prodTelPort) AND !empty($prodPassword) AND !empty($prodNomEnt) AND !empty($prodAdresse) AND !empty($prodActivite) AND !empty($prodSiret))
  {
    // On ajoute un grain de sel
    // $salt = "jzabjc548422qds";

    // On vérifie si l'email est valide
    if(filter_var($prodMail, FILTER_VALIDATE_EMAIL))
    {
      // On vérifie si l'email n'existe pas ou si il n'est pas identique à une autre
      $reqMail = $bdd->prepare("SELECT * FROM producteurs WHERE prodEmail = ?");
      $reqMail->execute(array($prodMail));
      $mailExist = $reqMail->rowCount();
      // Si l'adresse email est unique
      if($mailExist == 0)
      {
        if($prodPassword == $prodPasswordConfirm)
        {
          // On créer une clé d'identification
          $longueurKey = 15;
          $key = "";
          for($i=1;$i<$longueurKey;$i++) {
            $key .= mt_rand(0,9);
          }

          $req = $bdd->prepare("INSERT INTO producteurs(prodNom, prodPrenom, prodEmail, prodPw, prodTelFix, prodTelPort, prodNomEnt, prodActivite, prodAdresse, prodSIREN, prodKey) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
          $req->execute(array($prodNom, $prodPrenom, $prodMail, $prodPassword, $prodTelFix, $prodTelPort, $prodNomEnt, $prodAdresse, $prodActivite, $prodSiret, $key));

          // On envoi le mail de confimation
          $header="MIME-Version: 1.0\r\n";
          $header.='From: "autheman-victor.fr"<contact@autheman-victor.fr>'."\n";
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
              <table bgcolor="#112f41"width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td bgcolor="#112f41">
                      <div>
                        <table align="center" width="590" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                          <tr>
                            <td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center" style="text-align:center;">
                              <a href="https://www.newworld.com">
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
                              <a href="http://autheman-victor.fr/newworld/confirmation.php?class=producteur&email='.urlencode($prodMail).'&key='.$key.'">Confirmation</a>
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

          mail($prodMail, "Confirmation de compte", $messageMail, $header);
          echo "Un mail de confirmation vous à été envoyé !";
        } else echo "Les mots de passes ne correspondent pas !";
      } else echo "Le mail est deja utilsé";
    }
  } else echo "Les valeurs ne peuvent pas êtres vides !";
}







/***************************************************/
/****************** CONNEXION **********************/
/***************************************************/
// On vérifi si les valeurs existent
if(isset($_GET['email']) AND isset($_GET['password']))
{
  // On sécurise les valeurs
  $email = htmlspecialchars($_GET['email']);
  $password = sha1($_GET['password']);
  // Si les valeurs ne sont pas vides
  if(!empty($email) AND !empty($password))
  {
    // On récupère les données des clients et des producteurs de la base de donnée
    $reqCli = $bdd->prepare("SELECT * FROM clients WHERE cliEmail = ? AND cliPw = ?");
    $reqProd = $bdd->prepare("SELECT * FROM producteurs WHERE prodEmail = ? AND prodPw = ?");
    // On execute les requetes
    $reqCli->execute(array($email, $password));
    $reqProd->execute(array($email, $password));
    // On vérifi si les valeurs existent dans la base de donnée
    $userExistCli = $reqCli->rowCount();
    $userExistProd = $reqProd->rowCount();

    if($userExistCli == 1)
    {
      $curCli = $reqCli->fetch();
      $_SESSION['id'] = $curCli['cliId'];
      $_SESSION['email'] = $curCli['cliEmail'];
      $_SESSION['client'] = 1;
      if(isset($_SESSION['erreurMsg'])) unset($_SESSION["erreurMsg"]);
      header("Location: index.php");
    }

    if($userExistProd == 1)
    {
      $curProd = $reqProd->fetch();
      $_SESSION['id'] = $curProd['prodId'];
      $_SESSION['email'] = $curProd['prodEmail'];
      $_SESSION['producteur'] = 1;
      if(isset($_SESSION['erreurMsg'])) unset($_SESSION["erreurMsg"]);
      header("Location: index.php");
    }
    if($userExistProd == 0 AND $userExistCli == 0)
    {
      // On crée le message d'erreur
      $_SESSION['erreurMsg'] = "Erreur : L'email ou le mot de passe est incorrect";
      // On redirige vers la page d'accueil
      header("Location: index.php");
    }

  } else {
    // On crée le message d'erreur
    $_SESSION['erreurMsg'] = "Erreur : Tous les champs doivent êtres complétés";
    // On redirige vers la page d'accueil
    header("Location: index.php");
  }
} // fin du systeme connexion



// Inscription RELAI

?>
