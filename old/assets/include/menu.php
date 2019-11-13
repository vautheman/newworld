<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand text-dark" href="index.php">New World</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <li>
        <?php if(isset($_SESSION['id']) AND isset($_SESSION['email'])){ ?>
          <a href="profil.php" class="font-weight-bold mr-4 text-light">Mon compte</a>
          <li class="nav-item">
            <a class="nav-link text-dark text-dark" href="profil.php">Mon compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark text-dark" href="deconnexion.php">Deconnexion</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link text-dark" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="" data-toggle="modal" data-target="#basicExampleModal">Connexion</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link text-dark icon-shopping" href="inscription.php">Boutique <i class="fas fa-shopping-cart"></i></a>
        </li>
      </li>
    </ul>
  <!-- Inscription -->
</nav>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(isset($_SESSION['erreurMsg'])){ ?>
          <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['erreurMsg']; ?>
          </div>
        <?php } ?>
        <form action="traitement.php" method="get">
          <input id="email" onchange="verifMail()" type="email" name="email" class="form-control mb-4" placeholder="E-mail">
          <input type="password" name="password" class="form-control" placeholder="Mot de passe">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" onclick="return verif()" class="btn btn-primary">Connexion</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
