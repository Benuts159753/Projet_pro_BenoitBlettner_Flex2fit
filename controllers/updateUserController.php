<?php

require_once '../models/dbConnect.php';
require_once '../models/userModel.php';

/** Quand le bouton submit_update est déclenché, si il y a au moins un champ du formulaire rempli, on récupère les informations dans les variables correspondantes puis on hydrate et soumet ces dernières à la méthode correspondante dans le modèle user. */
if (isset($_POST['submit_update'])) {
    $user = new user();
    if (COUNT($_POST) > 0) {
        $id = $_SESSION['id'];
        $pseudo = htmlspecialchars($_POST['pseudoInput']);
        $firstname = htmlspecialchars($_POST['firstnameInput']);
        $lastname = htmlspecialchars($_POST['lastnameInput']);
        $mail = htmlspecialchars($_POST['mailInput']);
        $user->id_users = $id;
        $user->pseudo = $pseudo;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $mail;
        if ($user->updateUser()) {
            header('Location: /views/user.php');
        } else {
            echo 'Une erreur est survenu lors de l\'opération';
        }
    }
}
  