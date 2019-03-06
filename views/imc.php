<?php
session_start();
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
  <nav class="navbar fixed-top navbar-expand-md navbar-dark page-navbar gradient bg-warning mb-5">
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
        </ul>
      </div>
    </div>
  </nav> 
  <div class="container-fluid">
    <div class="row mt-3">
    <div class="col-md-12 text-center mt-5">
     <img src="/assets/img/imc_banner.png" alt="bannière_page_imc">
     <div class="col-md-12 text-center mt-2">
    <h1>Calcul de l'indice de masse corporelle (IMC)</h1>
    </div>
        <div class="col-md-12 mt-4">
          <form class="imcForm" name="imcForm" id="imcForm" method="post">
            <div class="form-group col-md-6 mx-auto text-center">
              <label class="userLabelForm my-auto text-center"for="weightInput">Poids :</label>
              <input class="userInputForm mr-1 text-center" type="number" name="weightInput" id="weightInput" placeholder="Ex : 58"><span class="my-auto">
                kgs.
              </span>
            </div>
            <div class="form-group col-md-6 mx-auto text-center">
              <label class="userLabelForm my-auto text-center" for="heightInput">Taille :</label>
              <input class="userInputForm mr-1 text-center" type="number" name="heightInput" id="heightInput" placeholder=" Ex : 170"><span class="my-auto">
                cms.
              </span>
            </div>
              <div class="text-center">
                 <button type="submit" name="submit_imc" form="imcForm" class="btn btn-primary imcFormButton">Envoyer !</button>
            </div>
          </form>
    <?php
if (isset($_POST['submit_imc'])){
// vérification et création des variables weight et taille_cm
if(isset($_POST['weightInput'])){ // si existe -> vérification de la valeur

  if($_POST['weightInput'] > 250 OR $_POST['weightInput'] < 25) {
    $weight = NULL;
    ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Bootstrap</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        L'entrée poids est incorecte, veuillez renseigner un poids entre 25kg et 250kg.
      </div>
    </div>
    <?php
  }
  else
  {
    $weight = $_POST['weightInput'];
  }
}
else // n'existe pas -> création de la variable
{
  $weight = NULL;
}
if (isset($_POST['heightInput'])) // si existe -> vérification de la valeur
{
  if ( $_POST['heightInput'] > 250 OR $_POST['heightInput'] < 50)
  {
    $height = NULL;
    ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Bootstrap</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        L'entrée taille est incorecte, veuillez renseigner une taille entre 250cm et 50cm.
      </div>
    </div>
    <?php
  }
  else
  {
    $height = $_POST['heightInput'];
  }
}
else // n'existe pas -> création de la variable
{
  $height = NULL;
}
?>

<?php // calcul de l'IMC ou affichage du champ de saisi
if ($height != NULL AND $weight != NULL)
{
  $taille_m = $height/100;
  $IMC = $weight/($taille_m*$taille_m);
  $float_imc= round($IMC,1);
}
?>
            
  <div class="col-lg-12">
    <p>tu pèses <?= $weightInput?> kg et mesures <?= $heightInput?> cm. Votre IMC est de <?= $float_imc?>.</p>;
  </div>
            
<?php
if (isset($IMC)) // existe -> on répond
{
  if ($IMC < 19)
  {
    echo "IMC inférieur à 19, seuil de maigreur.";
  }
  elseif ($IMC < 24.9)
  {
    echo "IMC située entre 19 et 24.9. Votre poids est idéal compte tenu de votre taille.";
  }
  elseif ($IMC < 26.9)
  {
    echo "IMC située entre 25 et 26.9. Léger surpoids.";
  }
  elseif ($IMC < 29.9)
  {
    echo "IMC située entre 27 et 29.9. Surpoids modérée";
  }
  else
  {
    echo "IMC supérieure à 30. Obésité.";
  }
}
else // la variable n'a pas de valeur -> message d'erreur
{
  echo "Une erreur s'est produite, veuillez retenter l'opération en renseignant correctement les données.";
}
}else{
    echo "veuillez remplir les champs requis.";
}
?>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script></body>
</body>
</html>
