<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" crossorigin="anonymous">  
  <title>Projet V 0.1</title>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark page-navbar gradient bg-danger">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item item">
            <a class="nav-link" href="home.php">Accueil</a>
          </li>
          <li class="nav-item item">
            <a class="nav-link" href="user.php">Utilisateur</a>
          </li>
          <li class="nav-item item">
            <a class="nav-link" href="nutrition.php">Nutrition</a>
          </li>
          <li class="nav-item item">
            <a class="nav-link" href="fitness.php">Fitness</a>
          </li>
              <?php
          if(isset($_SESSION) && (COUNT($_SESSION) > 0)){
                ?>
          <ul class="navbar-nav">
          <li class="nav-item item">
              <a class="nav-link" href="home.php?disconnect" >Déconnection utilisateur</a>
          </li>
           </ul>
            <?php
            }else{
            ?>
          <li class="nav-item item mr-auto">
            <a name="logIn" data-toggle="modal" data-target="#modalLogin" class="nav-link" >Veuillez vous connecter</a>
          </li>
                <?php
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-md-12 text-center">
  <img class="mt-5" id="fitness_banner" src="/assets/img/fitness_banner.jpg" alt="bannière_page_fitness">
  <h2 class="mt-5">Programme sportif</h2>
  <p>Gain/perte poids, entretien</p>
  </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
</body>
</html>
