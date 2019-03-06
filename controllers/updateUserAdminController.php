<?php

require_once '../models/dbConnect.php';
require_once '../models/userModel.php';

if (isset($_POST['submit_update_admin'])) {
    $user = new user();
    if (COUNT($_POST) > 0) {
        $id = $_POST['id'];
        $pseudo = htmlspecialchars($_POST['pseudoInput']);
        $firstname = htmlspecialchars($_POST['firstnameInput']);
        $lastname = htmlspecialchars($_POST['lastnameInput']);
        $mail = htmlspecialchars($_POST['mailInput']);
        $user->id_users = $id;
        $user->pseudo = $pseudo;
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $mail;
        if ($user->updateUserAdmin()) {
            echo 'mise à jour effectuée';
        } else {
            echo 'Une erreur est survenu lors de l\'opération';
        }
    }
}
  