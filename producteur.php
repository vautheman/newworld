<!DOCTYPE html>
<?php
include 'assets/include/connectBDD.php';
?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>New World</title>
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css"> <!-- bootstrap -->
  <link rel="stylesheet" href="assets/css/wow.css"> <!-- Animate -->
  <link rel="stylesheet" href="assets/css/slider/lightslider.css"> <!-- Slider -->
  <link rel="stylesheet" href="assets/css/toastify/toastify.css"> <!-- Notification -->
  <link rel="stylesheet" href="assets/css/styles.css"> <!-- Style master -->

  <!-- SCRIPT -->
  <script src="https://kit.fontawesome.com/3ba462b0e4.js" crossorigin="anonymous"></script>
  <script src="assets/js/slider/lightslider.js" charset="utf-8"></script> <!-- Slider -->
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/panier/panier.js">

  </script>
  <script src="assets/js/wow.js" charset="utf-8"></script>

  <script type="text/javascript">
    new WOW().init();
  </script>
</head>
  <body>
    <?php
    include 'assets/include/header-simple.php';
    include 'assets/include/header.php';
    ?>

    <?php include 'assets/include/footer.php'; ?>

    <script src="assets/js/toastify/toastify.js" charset="utf-8"></script>
    <script src="assets/js/toastify/script.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive').lightSlider({
          item:4,
          loop:false,
          slideMove:2,
          easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
          speed:600,
          responsive : [
              {
                  breakpoint:800,
                  settings: {
                      item:3,
                      slideMove:1,
                      slideMargin:6,
                    }
              },
              {
                  breakpoint:480,
                  settings: {
                      item:2,
                      slideMove:1
                    }
              }
          ]
      });
    });
    </script>
  </body>
</html>
