<!DOCTYPE html>
<?php
include 'assets/include/connectBDD.php';
if(!isset($_SESSION['userId'])){
  header("Location: index.php");
} else {
  // On récupère l'id du producteur
  $userId = $_SESSION['userId'];
  $reqIdProd = $bdd->prepare("SELECT prodId from producteurs natural join utilisateur where userId = ?");
  $reqIdProd->execute(array($userId));
  $curIdProd = $reqIdProd->fetch();
?>
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
  <body onload="verifPw(), verifMail()" class="bg-light">
    <?php include 'assets/include/header-simple.php'; ?>
    <div class="container-fluid p-5">
      <div class="row" style="margin-top: 100px;">
        <div class="col">
          <img width="175px" src="assets/images/<?php echo $avatarId; ?>.png" alt="">
          <a href="" class="text-decoration-none"><i class="fas fa-plus-square fa-4x text-warning" style="position: relative; top: 100px; left: -10px;"></i></a>
          <div class="ml-4 mt-5">
            <h3><?php echo $curUser['userNom'].' '.$curUser['userPrenom']; ?></h3>
            <p class="badge" id="badge-role"><?php echo $curRole['roleLib']; ?></p>

            <h3 class="mt-5">Profile</h3>
            <ul class="list-unstyled">
              <li class="text-secondary"><h5><a href="">Products</a></h5></li>
              <li class="text-secondary"><h5><a href="">Type Products</a></h5></li>
              <li class="text-secondary"><h5><a href="profile/settings.php"><i class="fas fa-cogs mr-2"></i>Settings</a></h5></li>
            </ul>
          </div>
        </div>
        <div class="col-6">
          <!-- Block latest products -->
          <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <div class="container">
              <div class="pb-3">
                <h5 class="d-inline">Your latest products online :</h5>
                <a href="product/add-product.php" class="d-inline btn btn-primary" style="float: right;"><i class="fas fa-plus mr-2"></i>Add product</a>
              </div>
              <ul class="list-group list-group-horizontal-md">
                <?php
                // Récupération des produits dans la base de données
                $reqProduit = $bdd->prepare("SELECT * FROM produits where prodId = ? LIMIT 4");
                $reqProduit->execute(array($curIdProd['prodId']));
                while($cur = $reqProduit->fetch())
                {
                ?>
                <li class="list-group-item item-produit m-2 border" style="height: 300px;">
                  <div class="">
                    <a href="#">
                      <div class="img pb-1">
                        <img width="150px" class="text-center" src="assets/images/produits/<?php echo $curIdProd['prodId'] . '/' . $cur["produitImg"]; ?>" alt="">
                      </div>
                    </a>
                    <div class="w-100 p-2" style="position: absolute; bottom: -20px; left:0;">
                      <a href="product/drop-product.php?produitId=<?php echo $cur['produitId']; ?>&prodId=<?php echo $curIdProd['prodId']; ?>&produitImg=<?php echo $cur['produitImg']; ?>" class="btn btn-danger float-right" type="button" name="button"><i class="fas fa-trash-alt"></i></a>
                      <a href="product/update-product.php?produitId=<?php echo $cur['produitId']; ?>" class="btn btn-warning float-right mr-1" type="button" name="button"><i class="fas fa-cog"></i></a>
                      <p class="text-left" style="font-size: 27px; font-weight: bold;" class="text-dark"><?php echo $cur['produitPU']; ?> €</p>
                      <a href="#" class="text-dark"><p class="text-left" style="max-width: 200px; width: auto; line-height: 10px;"><small><?php echo $cur["produitLib"]; ?><br><?php echo $cur["produitDesc"]; ?></small></p></a>
                    </div>
                  </div>
                </li>
                <?php
                }
                ?>
              </ul>
            </div>
          </div>

          <!--  -->
          <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <div class="container">
              <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square fa-2x text-primary float-right" title="add categorie"></i></a>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add categorie</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form" method="post">
                        <label for="">Categorie name :</label>
                        <input type="text" name="typeProduitLib" class="form-control" placeholder="Insert categorie name ...">

                        <label class="mt-4" for="">Select this rayon :</label>
                        <select class="form-control" name="rayonId">
                          <?php
                          $reqRayon = $bdd->prepare("SELECT * from rayons");
                          $reqRayon->execute();
                          while($curRayon = $reqRayon->fetch())
                          {
                            ?>
                            <option value="<?php echo $curRayon['rayonId']; ?>"><?php echo $curRayon['rayonLib']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                        <?php
                        if(isset($_POST['typeProduitLib']) and isset($_POST['rayonId'])){
                          $typeProduitLib = htmlspecialchars($_POST['typeProduitLib']);
                          $rayonId = htmlspecialchars($_POST['rayonId']);
                          if(!empty($typeProduitLib) and count($rayonId)>0)
                          {
                            $reqAddType = $bdd->prepare("INSERT INTO typeProduit(typeProduitLib, rayonId, prodId) values(?,?,?)");
                            $reqAddType->execute(array($typeProduitLib, $rayonId, $curIdProd['prodId']));
                          }
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              <h5>Your categories :</h5>
              <ul class="list-group list-group-horizontal-md">
                <?php
                  $reqTypeProduit = $bdd->prepare("SELECT * from typeProduit where prodId = ?");
                  $reqTypeProduit->execute(array($curIdProd['prodId']));
                  while($curTypeProduit = $reqTypeProduit->fetch())
                  {
                ?>
                  <div class="badge badge-secondary m-1 p-2" style="font-size: 11pt !important;"><?php echo $curTypeProduit['typeProduitLib']; ?><a class="text-white" href="product/drop-categories.php?idType=<?php echo $curTypeProduit['typeProduitId']; ?>"><i class="fas fa-times ml-1"></i></a></div>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>

        </div>
        <div class="col">

        </div>
      </div>
    </div>
  </body>
  <script src="assets/js/inputControl.js" charset="utf-8"></script>
  <!-- script badge role -->
  <script src="assets/js/badge/badge.js" charset="utf-8"></script>
</html>
<?php
}
?>
