<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" crossorigin="anonymous">  <title>Projet V 0.15</title>
    </head>

    <!-- Navbar bootstrap 4.2 -->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark page-navbar gradient bg-info">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item item">
                        <a class="nav-link" href="/views/home.php">Accueil</a>
                    </li>
                    <li class="nav-item item">
                        <a class="nav-link" href="/views/user.php">Utilisateur</a>
                    </li>
                    <li class="nav-item item">
                        <a class="nav-link" href="/views/nutrition.php">Nutrition</a>
                    </li>
                    <li class="nav-item item">
                        <a class="nav-link" href="/views/fitness.php">Fitness</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--  -->
    <div class="container fluid">
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <img id="logo_home" src="/assets/img/logo_home.png" class="rounded mx-auto d-block mt-5 mb-4" alt="logo Flex2fit">
                <p id="welcome_p">Bienvenue sur Flex2fit</p>
                <div class="margin_bot">
                    <p class="welcome_p_2nd">Calories tracker </p>
                    <p id="welcome_p_3rd">& </p>
                    <p class="welcome_p_2nd">conseils fitness</p>
                </div>
                <a id="link_welcome" href="/views/home.php"> <button class="welcome_button" name="welcome" data-toggle="modal">Get started !</button></a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>
