<?php
/** Je require une fois mes fichiers modèles, celui servant a la connexion à la base de données, et celui renfermant toutes mes methodes concernant les opérations relatives à l'utilisateur. */
require_once '../models/dbConnect.php';
require_once '../models/userModel.php';

/** jeu de regex permettant de contrôler la qualité et la forme des inputs que l'utilisateur lambda va saisir */
$regexPseudo = '/^([a-zA-Z0-9]{2,20})$/';
$regexText = '/^[a-zA-Z]+$/';
$regexPassword = '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$#';

/** Si le bouton submit_register a été déclenché, création d'un tableau d'erreurs puis vérification que les champs renseignés correspondent avec la formatation imposée par les regex. */
if(isset($_POST['submit_register'])){
     $errors = [];
    if(empty($_POST['pseudoInput']) || !preg_match($regexPseudo, $_POST['pseudoInput'])){
      $errors['pseudo'] = 'Le pseudo renseigné est invalide';
    } if (empty($_POST['firstnameInput']) || !preg_match($regexText, $_POST['firstnameInput'])){
      $errors['firstname'] = 'Le prénom renseigné est invalide';
    } if (empty($_POST['lastnameInput']) || !preg_match($regexText, $_POST['lastnameInput'])){
      $errors['lastname'] = 'Le nom renseigné est invalide';
    } if(empty($_POST['mailInput']) || !filter_input(INPUT_POST, 'mailInput', FILTER_VALIDATE_EMAIL)){
      $errors['mail'] = 'Le mail renseigné est invalide';
    } if(empty($_POST['passwordInput']) || !preg_match($regexPassword, $_POST['passwordInput'])){
      $errors['password'] = 'Le mot de passe renseigné est invalide';
    }

    /** Si le compte des erreurs est égal à zéro, on va hydrater les attributs avec les valeurs des inputs */
     if(count($errors) == 0){
        $user = new user();
        $user->pseudo = $_POST['pseudoInput'];
        $user->firstname = $_POST['firstnameInput'];
        $user->lastname = $_POST['lastnameInput'];
        $user->mail = $_POST['mailInput'];
        /** On hash le mot de passe pour que qu'il ne soit pas stoquer en clair dans la base de données. */
        $user->password = password_hash($_POST['passwordInput'], PASSWORD_BCRYPT);
        /** Si l'objet user déclenche la méthode addUser, redirection vers la view principale. */
        if($user->addUser()){
            header('Location: /views/home.php');
        /** sinon, un message d'erreur s'affiche. */
        } else {
            echo 'Une erreur est survenu lors de l\'inscription';
        }
    }
}