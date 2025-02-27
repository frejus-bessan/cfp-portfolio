<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <i class="fa fa-home"></i>&nbsp;
        <span class="fs-4">Portfolio</span>
      </a>

      <ul class="nav nav-pills">
        <?php
          if(is_connected()){
        ?>
        <li class="nav-item"><a href="index.php?page=projets" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'projets') ? 'active' : '' ?>">Mes projets</a></li>
        <li class="nav-item"><a href="index.php?page=deconnexion" class="nav-link link-danger">Deconnexion</a></li>

        <?php
          } else {
        ?>
        <li class="nav-item"><a href="index.php?page=connexion" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'connexion') ? 'active' : '' ?>">Connexion</a></li>
        <li class="nav-item"><a href="index.php?page=inscription" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'inscription') ? 'active' : '' ?>">Inscription</a></li>

        <?php
          }
        ?>
      </ul>
    </header>
</div>