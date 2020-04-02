<!DOCTYPE html>
<?php
include '../assets/include/connectBDD.php';
if(!isset($_SESSION['userId']))
{
  header("Location: index.php");
} else {
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New World</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/wow.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- SCRIPT -->
    <script src="https://kit.fontawesome.com/3ba462b0e4.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/wow.js" charset="utf-8"></script>
    <script src="../assets/js/datagouv.js" charset="utf-8"></script>
    <script type="text/javascript">
      new WOW().init();
    </script>
  </head>
  <body onload="verifPw(), verifMail()" class="bg-light">
    <div class="w-100 bg-dark" style="position: fixed; z-index: 9;">
      <div class="row pl-4 pr-4 pt-4">
        <div class="col-sm d-flex flex-row flex-nowrap">
          <h4 class="text-light mt-1"><i class="fas fa-globe-europe text-orange"></i> New World</h4>
          <form style="flex: 1;" class="form ml-4" action="index.html" method="post">
            <input type="text" class="form-control" name="" value="" placeholder="Qu'est-ce qui vous ferait plaisir ?">
          </form>
          <div class="">
            <ul class="nav ml-4 mr-4">
              <li class="nav-item dropdown text-light d-block" style="position: relative; top: -12px;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span>My account</span><br><span><small>Identify yourself</small></span></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" style="margin-right: 150px !important;">
                  <div class="p-3" style="width: 400px !important;">
                    <div class="text-center">
                      <a href="login.php" class="btn btn-success w-100">Identifiez-vous</a>
                      <small>New customer ? <a href="#">Create an account here</a> </small>
                    </div>
                    <hr>
                  </div>

                </div>
              </li>
              <li class="nav-item dropdown text-light d-block" style="position: relative; top: -12px;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span><i class="fas fa-shopping-cart"></i>Cart</span><br><span><small>0 article</small></span></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" style="margin-right: 150px !important;">
                  <div class="p-3" style="width: 400px !important;">
                    <div class="text-center">
                      You don't have any articles
                    </div>
                    <hr>
                  </div>

                </div>
              </li>
              <li>
                <a href="#" class="btn btn-light text-dark p-2 pl-3 pr-3 bg-light text-capitalize"><i class="fab fa-github text-dark"></i> Github</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <div class="container p-5">
      <?php
      $reqUser = $bdd->prepare("SELECT * from utilisateur where userId = ?");
      $reqUser->execute(array($_SESSION['userId']));
      $curUser = $reqUser->fetch();
      ?>
        <form class="form" method="post">
          <div class="row bg-white rounded p-3" style="margin-top: 100px;">
            <div class="col">
              <label for="userNom">Enter your name :</label>
              <input id="userNom" type="text" name="userNom" placeholder="Your name ..." class="form-control" value="<?php echo $curUser['userNom']; ?>"><br>

              <label for="userPseudo">Enter your pseudo :</label>
              <input id="userPseudo" type="text" name="userPseudo" placeholder="Your pseudo ..." class="form-control" value="<?php echo $curUser['userPseudo']; ?>"><br>
            </div>
            <div class="col">
              <label for="userPrenom">Enter your surname :</label>
              <input id="userPrenom" type="text" name="userPrenom" placeholder="Your surname ..." class="form-control" value="<?php echo $curUser['userPrenom']; ?>"><br>

              <label for="userEmail">Enter your email :</label>
              <input id="userEmail" type="text" name="userEmail" placeholder="Your email ..." class="form-control" value="<?php echo $curUser['userEmail']; ?>"><br>
            </div>
            <input type="submit" class="btn btn-primary" name="" value="">
          </div>
        </form>
    </div>
  </body>
  <script src="../assets/js/inputControl.js" charset="utf-8"></script>
</html>
<?php
}
?>
