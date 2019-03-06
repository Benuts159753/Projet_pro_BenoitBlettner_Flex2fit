<?php
session_start();
require '../controllers/addUserController.php';
require '../controllers/logInUserController.php';
require '../controllers/userProfileController.php';
require '../controllers/updateUserController.php';
require '../controllers/sessionDestroyController.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"  crossorigin="anonymous">
  <title>Projet V 1.5</title>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark page-navbar gradient bg-warning">
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
          <li class="nav-item item mr-auto">
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
    <div class="row">
      <div class="col-md-12 border_blur text-center">
      <img id="banner_user" src="/assets/img/user_banner.png" alt="bannière-fruits">
      </div>
      <div class="col-lg-12">
        <h1 class="mt-5 mb-4 text-center">Bienvenue dans ton espace utilisateur, <?= $_SESSION['pseudo']?></h2>
          </div>
        <div class="col-lg-3 text-center">
            <h2 class="user_h2">Espace utilisateur</h2>
            <?php
           if(isset($_SESSION) && (COUNT($_SESSION) > 0)){
                ?>
            <a href="/views/profile.php"><img class="border_img" src="../assets/img/user_pic.png" alt="Espace utilisateur"></a>
            <?php
            }
            else{
            ?>
            <a href="/views/home.php"><img class="border_img" src="../assets/img/user_pic.png" alt="Espace utilisateur"></a>
             <?php
            }
            ?>
         </div>
        <div class="col-lg-3 text-center">
            <h2 class="user_h2">Indice de masse corporelle</h2>
            <a href="../views/imc.php"><img class="border_img" src="../assets/img/imc_pic.jpg" alt="Indice de masse corporelle"></a>
        </div>
        <div class="col-lg-3 text-center">
            <h2 class="user_h2">Metabolisme de base</h2>
            <a href="../views/apportCalorique.php"><img class="border_img" src="../assets/img/cmb_pic.jpg" alt="Calcul du métabolisme de base"></a>
        </div>
        <div class="col-lg-3 text-center">
            <h2 class="user_h2">Besoins et objectifs</h2>
            <a href=""><img class="border_img" src="../assets/img/goal_pic.jpg" alt="Besoins et objectifs"></a>
        </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"  crossorigin="anonymous"></script></body>
</body>
</html>
