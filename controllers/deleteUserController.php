<?php

require_once '../models/dbConnect.php';
require_once '../models/userModel.php';

/** Si le bouton submit_delete est déclencher, on instancie un objet user et on l'hydrate pour lui attribuer un id_users qui correspond a l'id enregistré par l'id de session. */
if (isset($_POST['submit_delete'])) {
    $user = new user();

    $user->id_users = $_SESSION['id'];

    /** Si l'objet user active la méthode deleteUser, on réinitialise les valeurs de la session et détruit les variables. Puis on renvoie vers la view principale, d'accueil. */
    if ($user->deleteUser()) {
        session_unset();
        session_destroy();
        header('Location: ../views/home.php');
    }
}