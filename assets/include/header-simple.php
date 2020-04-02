<div class="w-100 bg-dark d-table pb-3" id="firstHeader" style="position: fixed; z-index: 9;">
  <div class="row pl-4 pr-4 pt-4">
    <div class="col-sm d-flex flex-row flex-nowrap">
      <h4 class="text-light mt-1"><i class="fas fa-globe-europe text-orange"></i><a href="/newworld/" class="text-decoration-none text-white ml-2">New World</a></h4>
      <form style="flex: 1;" class="form ml-4" action="index.html" method="post">
        <input type="text" class="form-control" name="" value="" placeholder="Qu'est-ce qui vous ferait plaisir ?">
      </form>
      <div class="">
        <ul class="nav ml-4 mr-4">
          <li class="nav-item dropdown text-light d-table-cell" style="vertical-align: middle;">
          <?php
          if(!isset($_SESSION['userId'])){
          ?>
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuAccount" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><span>My account</span></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuAccount" style="margin-right: 150px !important;">
              <div class="p-3" style="width: 400px !important;">
                <div class="text-center">
                  <a href="login.php" class="btn btn-success w-100">Identifiez-vous</a>
                  <small>New customer ? <a href="#">Create an account here</a> </small>
                </div>
                <hr>
              </div>
            </div>
          <?php
          } else {
          ?>
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuAccount" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><span><?php echo "Welcome ".$curUser['userPrenom']; ?></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuAccount" style="margin-right: 150px !important;">
              <div class="p-3" style="width: 400px !important;">
                <div class="d-flex justify-content-center">
                  <div class="d-table">
                    <img width="75px" src="/newworld/assets/images/<?php echo $avatarId; ?>.png" alt="">
                    <div class="d-table-cell" style="vertical-align: middle;">
                      <h4 class="ml-3"><?php echo $curUser['userNom'].' '.$curUser['userPrenom']; ?></h4>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="">
                  <ul class="list-unstyled">
                    <p class="badge ml-3 float-right" id="badge-role-header"><?php echo $curRole['roleLib']; ?></p>
                    <li class="pl-3"><a href="/newworld/profile.php" class="text-decoration-none">View my account</a></li>
                    <li class="pl-3"><a href="/newworld/logout.php" class="text-decoration-none">Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
          </li>
          <li class="nav-item dropdown text-light d-table-cell" style="vertical-align: middle;">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><span><i class="fas fa-shopping-cart pr-2"></i>Cart<span class="badge badge-primary ml-1" id="panier-length"></span></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" style="margin-right: 150px !important;">
              <div class="p-3" style="width: 400px !important;">
                <div class="text-center">
                  You don't have any articles
                  <ul id="panierContient">

                  </ul>
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
