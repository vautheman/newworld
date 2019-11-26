<!DOCTYPE html>
<?php include 'assets/include/connectBDD.php'; ?>
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
    <form class="form" action="index.html" method="post">
      <label for="producteurEntName">Le nom de votre entreprise :</label>
      <input type="text" name="producteurEntName" class="form-control" value="" id="producteurEntName" placeholder="ex: AgriBio">

      <label for="producteurActivite">Votre activité :</label>
      <select class="form-control" name="producteurActivite" id="producteurActivite">
        <option value=""></option>
      </select>

      <label for="producteurAdresse">Votre adresse :</label>
      <input type="text" name="producteurAdresse" id="producteurAdresse" value="" class="form-control" placeholder="ex: lieu-dit ...">

      <label for="producteurPays">Votre pays :</label>
      <input type="text" name="producteurPays" value="" placeholder="ex: FRANCE" class="form-control">

      <label for="producteurVille">Votre ville :</label>
      <input type="text" name="producteurVille" class="form-control" value="" placeholder="ex: GAP">
    </form>

    <footer class="container-fluid bg-dark mt-5" style="height: 250px;">

    </footer>
  </body>
  <script src="assets/js/inputControl.js" charset="utf-8"></script>
</html>
