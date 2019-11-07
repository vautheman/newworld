<!DOCTYPE html>
<?php
  include 'connectBDD.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/all.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- SCRIPT -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/f93438112c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  </head>
  <body>
    <section class="container-fluid bg-dark w-20 p-4">
      <div class="container">
        <form class="float-right mt-2" style="width: 250px; margin-left: auto;" action="index.html" method="post">
          <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Search ..." aria-label="Username" aria-describedby="addon-wrapping">
          </div>
        </form>
        <h1 class="text-success">NEWWORLD<span class="text-light"><b>DOCS</b></span></h1>
        <p class="text-secondary">Home / Quick Start</p>

      </div>
    </section>
    <section class="container">
      <div class="row mt-4">
        <div class="col-3">
          <ul class="list-group">
          <?php
            $req = $bdd->prepare("SELECT * FROM categorie");
            $reqItem = $bdd->prepare("SELECT * FROM item WHERE catId = ?");
            $req->execute();
            while($cur = $req->fetch())
            {
              $reqItem->execute(array($cur[0]));
          ?>
            <li class="p-1 list-group-item border-0"><?php echo $cur[1]; ?></li>
              <ul>
              <?php
              while($curItem = $reqItem->fetch())
              {
                ?>
                <li class="p-1 list-group-item border-0"><?php echo $curItem[2]; ?></li>
                <?php
              }
              ?>
              </ul>
              <?php
            }
          ?>
          </ul>
        </div>
        <div class="col">
          <textarea name="editor1"></textarea>
          <script>
                  CKEDITOR.replace( 'editor1' );
          </script>
          <?php
          if(isset($_GET['item']) AND !empty($_GET['item']))
          {
            $req = $bdd->prepare("SELECT * FROM item WHERE itemId = ?");
            $req->execute(array($_GET['item']));
            $cur = $req->fetch();
          ?>
          <h3 class="border-bottom border-secondary pb-2 pt-3 mb-4"><?php echo $cur['2']; ?></h3>
          <p><?php echo $cur['3']; ?></p>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
