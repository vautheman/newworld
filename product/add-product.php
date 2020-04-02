<!DOCTYPE html>
<?php
include '../assets/include/connectBDD.php';
if(!isset($_SESSION['userId']))
{
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
    <?php include '../assets/include/header-simple.php'; ?>
    <div class="container" style="padding-top: 150px;">
      <h1 class="mb-5"><i class="fas fa-plus-square mr-2 text-warning"></i>Add product</h1>
      <form class="form" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col">
            <label style="font-size: 14pt;" class="" for="addProductName">Name :</label>
            <input type="text" id="addProductName" class="form-control" name="addProductName" placeholder="Insert product name ...">
          </div>
          <div class="col">
            <label style="font-size: 14pt;" class="" for="addProductType">Select your product type</label>
            <select class="form-control" id="addProductType" name="addProductType">
              <?php
              // On récupère tout les types de produits du producteur concerné
              $reqTypeProduit = $bdd->prepare("SELECT * from typeProduit natural join producteurs where prodId = ?");
              $reqTypeProduit->execute(array($curIdProd['prodId']));
              while($curTypeProduit = $reqTypeProduit->fetch())
              {
              ?>
                <option value="<?php echo $curTypeProduit['typeProduitId']; ?>"><?php echo $curTypeProduit['typeProduitLib']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col mt-4">
            <label style="font-size: 14pt;" class="" for="addProductDesc" class="mt-2">Description :</label>
            <textarea style="height: 200px;" type="text" id="addProductDesc" class="form-control" name="addProductDesc" placeholder="Insert product description ..."></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col mt-4">
            <label style="font-size: 14pt;" for="fileUpload">Choose a picture :</label>
            <input type="file" name="photo" id="fileUpload">
          </div>

          <div class="col mt-4">
            <label style="font-size: 14pt;" class="" for="addProductPU">Per-unit price :</label>
            <input type="number" id="addProductPU" name="addProductPU" class="form-control">
          </div>
          <div class="col mt-4">
            <label style="font-size: 14pt;" class="" for="addProductStock">Number of products in stock :</label>
            <input type="number" id="addProductStock" name="addProductStock" class="form-control">
          </div>
        </div>

        <input type="submit" class="w-100 btn btn-info mt-5 p-2" name="" value="Validate" style="font-size: 16pt; text-transform: uppercase;">
      </form>

      <?php
      // Vérifier si le formulaire a été soumis
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          // Vérifie si le fichier a été uploadé sans erreur.
          if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
              $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
              $filename = $_FILES["photo"]["name"];
              $filetype = $_FILES["photo"]["type"];
              $filesize = $_FILES["photo"]["size"];

              // Vérifie l'extension du fichier
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
              if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

              // Vérifie la taille du fichier - 5Mo maximum
              $maxsize = 5 * 1024 * 1024;
              if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

              // Vérifie le type MIME du fichier
              if(in_array($filetype, $allowed)){
                  // Vérifie si le fichier existe avant de le télécharger.
                  if(file_exists("../assets/images/produits/" . $curIdProd['prodId'] . "/" . $_FILES["photo"]["name"])){
                      echo $_FILES["photo"]["name"] . " existe déjà.";
                  } else{
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/images/produits/" . $curIdProd['prodId'] . "/" . $_FILES["photo"]["name"]);
                    echo "Votre fichier a été téléchargé avec succès.";

                    if(isset($_POST['addProductName']) AND isset($_POST['addProductDesc']) AND isset($_POST['addProductPU']) AND isset($_POST['addProductStock']) and isset($_POST['addProductType']))
                    {
                      // On sécurise les données dans des variables
                      $productName = htmlspecialchars($_POST['addProductName']);
                      $productDesc = htmlspecialchars($_POST['addProductDesc']);
                      $productPU = htmlspecialchars($_POST['addProductPU']);
                      $productStock = htmlspecialchars($_POST['addProductStock']);
                      $productType = htmlspecialchars($_POST['addProductType']);
                      $productValid = 0;

                      if(!empty($productName) and !empty($productDesc) and !empty($productPU) and !empty($productStock) and !empty($productType))
                      {
                        $reqAddProduct = $bdd->prepare("INSERT INTO produits(produitLib, produitDesc, produitImg, produitPU, produitQuantite, produitValid, prodId, typeProduitId) values(?, ?, ?, ?, ?, ?, ?, ?)");
                        $reqAddProduct->execute(array($productName, $productDesc, $_FILES["photo"]["name"], $productPU, $productStock, $productValid, $curIdProd['prodId'], $productType));
                      } else echo "non";
                    } else echo "non";
                  }
              } else {
                  echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
              }
          } else{
              echo "Error: " . $_FILES["photo"]["error"];
          }
      }
      ?>


    </div>

  </body>
  <script src="../assets/js/inputControl.js" charset="utf-8"></script>
  <script src="../assets/js/badge/badge_header.js" charset="utf-8"></script>
</html>
<?php
}
?>
