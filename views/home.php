<?php
/** Démarage de la session sur cette page pour obtenir les informations de l'utilisateur s'il est connecté. */
session_start();
/** Appel des controllers dont on peut avoir besoin */
require '../controllers/addUserController.php';
require '../controllers/logInUserController.php';
require '../controllers/sessionDestroyController.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" crossorigin="anonymous">  <title>Projet V 0.15</title>
</head>
<body>
  <!-- Navbar bootstrap 4.2 -->
  <nav class="navbar fixed-top navbar-expand-md navbar-dark page-navbar gradient bg-info">
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
          /** utilisation d'une condition en php pour avoir un affichage dynamique selon que l'utilisateur soit connecté ou non. */
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
<!-- Mise en page de la partie principale du document, comprennant logo, titre et sous titre du site/web application, ainsi que bouton d'inscription et connection, activant chacun une modale leur étant associée. -->
  <div class="container fluid">
    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <img id="logo_home"src="/assets/img/logo_home.png" class="rounded mx-auto d-block mt-5 mb-3" alt="logo Flex2fit">
        <p id="welcome_p">Bienvenue sur Flex2fit</p>
        <div>
          <p class="welcome_p_2nd">Calories tracker </p>
          <p id="welcome_p_3rd">& </p>
          <p class="welcome_p_2nd">conseils fitness</p>
        </div>
        <button class="register_button mt-5 mb-2" name="register" data-toggle="modal" data-target="#modalRegister">S'inscrire</button>
        <p>Si vous etes déja inscrit, veuillez vous <button name="logIn" id="style_button_modal" data-toggle="modal" data-target="#modalLogin">connecter</button>.</p>
      </div>
    </div>
  </div>
  <!-- Modal bootstrap, contenant un formulaire bootstrap d'inscription -->
  <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegister" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRegister">Inscription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="registerForm" name="registerForm">
          <div class="form-group" >
            <label for="pseudoInput">Pseudo :</label>
            <input type="text" data-trigger="focus" data-toggle="tooltip" data-container="body" data-placement="right" data-title="Foo" class="form-control" id="pseudoInput" name="pseudoInput" placeholder="Ex : Bobby123">
          </div>
          <div class="form-group">
            <label for="firstnamedInput">Prénom :</label>
            <input type="text" class="form-control" id="firstnameInput" name="firstnameInput" placeholder="Bobby">
          </div>
          <div class="form-group">
            <label for="lastnameInput">Nom :</label>
            <input type="text" class="form-control" id="lastnameInput" name="lastnameInput" placeholder="Ex : McBob">
          </div>
          <div class="form-group">
            <label for="mailInput">Email :</label>
            <input type="email" class="form-control" id="mailInput" name="mailInput" placeholder="Ex : BobbyBob@bobmail.com">
          </div>
          <div class="form-group">
            <label for="passwordInput">Mot de passe :</label>
            <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="*********">
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
          <button type="submit" name="submit_register" form="registerForm" class="btn btn-primary">C'est parti !</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal bootstrap, contenant un formulaire bootstrap de connexion -->
  <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="#modalLogin" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLogin">Connection</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST" id="logInUserForm" name="logInUserForm">
            <div class="form-group">
              <label for="pseudoInput">Pseudo :</label>
              <input type="text" class="form-control" id="pseudoInput" name="pseudoInput" placeholder="Ex : Bobby123">
            </div>
            <div class="form-group">
              <label for="passwordInput">Mot de passe :</label>
              <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="*********">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
          <button type="submit" name="submit_login" form="logInUserForm" class="btn btn-primary">En avant !</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>