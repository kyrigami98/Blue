<?php
session_start();
include "TRAITEMENT/fonctions.php";
?>
<!DOCTYPE html>
<html>

<head>
  <title>BLUE</title>
  <meta name="description" content="Blue">
  <meta name="keywords" content="HTML,code,tags">
  <meta name="author" content="Kyriel&Kriss">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!--link rel="icon" type="image/png" href="" /-->

  <link rel="stylesheet" href="CSS/MyStyle.css">
  <link rel="stylesheet" href="CSS/all.css">
  <link rel="stylesheet" href="CSS/bootstrap.css">
  <link rel="stylesheet" href="CSS/buttonflottant.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="CSS/sb-admin-2.min.css" rel="stylesheet">

  <script src="vendor/jquery/jquery.min.js"></script>

  <script>
    function isMobileDevice() {
      const toMatch = [
        /Android/i,
        /webOS/i,
        /iPhone/i,
        /iPad/i,
        /iPod/i,
        /BlackBerry/i,
        /Windows Phone/i
      ];

      return toMatch.some((toMatchItem) => {
        return navigator.userAgent.match(toMatchItem);
      });
    }
  </script>

</head>

<!-- Topbar -->
<nav id="manavbar" class="navbar fixed-top navbar-expand-lg scrolling-navbar navbar-light bg-white topbar mb-4 fixed-top shadow">
  <a class="navbar-brand blue-primary" href="index.php" style="font-family:Forte;color:#4E73DF;">BLUE</a>
  <!-- Sidebar Toggle (Topbar) -->

  <button class="navbar-toggler btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <!--     <span class="navbar-toggler-icon"></span> -->
    <i class="mini-menu-icon fas fa-bars fa-sm"></i>
  </button>

  <div class="collapse navbar-collapse bg-white" id="navbarSupportedContent">

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" id="recherche">

      <div class="input-group">

        <input type="text" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="form-control bg-light border-0 small dropdown-toggle" placeholder="Rechercher un projet ou un auteur..." aria-label="Search" aria-describedby="basic-addon2" id="recherche" name="recherche">

        <div class="col-12 dropdown-menu animated--grow-in" aria-labelledby="navbarDropdown" id="reception">

        </div>

        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>

      </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle btn btn-block" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i> Recherche rapide
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


      <?php
      if (!isset($_SESSION['pseudo'])) { ?>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <button class="btn btn-block text-uppercase" data-toggle="modal" data-target=".bd-example-modal-lg">Connexion</button>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <button class="btn btn-block btn-primary text-uppercase" data-toggle="modal" data-target=".bd-inscription-modal-lg" type="submit">Inscription</button>
          </a>
        </li>

      <?php } else { ?>
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">

            <h6 class="dropdown-header">
              Alerts Center
            </h6>
            <div style="overflow: auto; height:500px;">
              <?php
              getHistorique($_SESSION['id']);
              ?>
            </div>
            <!-- 
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-success">
                <i class="fas fa-thumbs-up text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 7, 2019</div>
              Kriss à aimer votre projet Symfonia
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-warning">
                <i class="fas fa-exclamation-triangle text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 2, 2019</div>
              Veillez confirmer votre email.
            </div>
          </a> 
          <a class="dropdown-item text-center small text-gray-500" href="#">voir plus</a>-->
          </div>
        </li>

        <!-- Nav Item - Messages 
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger badge-counter">7</span>
        </a>
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">
            Message Center
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
              <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
              <div class="text-truncate">Je vois que tu dessine Super bien, </div>
              <div class="small text-gray-500">Emily Fowler · 58m</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
              <div class="status-indicator"></div>
            </div>
            <div>
              <div class="text-truncate">ca te dirais de travailler avec moi sur un projet?</div>
              <div class="small text-gray-500">Jae Chun · 1d</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
              <div class="status-indicator bg-warning"></div>
            </div>
            <div>
              <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
              <div class="small text-gray-500">Morgan Alvarez · 2d</div>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
              <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
              <div class="status-indicator bg-success"></div>
            </div>
            <div>
              <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
              <div class="small text-gray-500">Chicken the Dog · 2w</div>
            </div>
          </a>
          <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
        </div>
      </li>

      <div class="topbar-divider d-none d-sm-block"></div>
      -->

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">

          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline small blue-primary">Bienvenue, <strong><?php echo $_SESSION['pseudo']; ?></strong></span>
            <?php if ($_SESSION['image']) { ?>
              <img class="img-profile rounded-circle" src="IMAGES/PROFILS/<?php echo $_SESSION['image']; ?>">
            <?php } else { ?>
              <img class="img-profile rounded-circle" src="IMAGES/PROFILS/STAND.jpg">
            <?php } ?>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profil.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Mon Profil
            </a>
            <a class="dropdown-item" href="atelier.php">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Mon atelier
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="TRAITEMENT/systeme.php">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Deconnexion
            </a>
          </div>
        </li>

      <?php
      } ?>

    </ul>
  </div>

</nav>
<!-- End of Topbar -->


<br><br>

<script>

</script>

<body>