<?php

require_once '../models/dbConnect.php';
require_once '../models/userModel.php';

/** quand le bouton submit_info est déclenché, on récupère l'id de l'utilisateur enregistré dans la variable de session correspondante, puis on crée une nouvelle variable list qui va récupérer les informations de l'utilisateur qui vont être envoyé par la méthode correspondante dans le modèle user.  */
if (isset($_POST['submit_info'])) {
    $user = new user();
    if (isset($_SESSION['id'])) {
        $user->id_users = $_SESSION['id'];
        $list = $user->userInfos();
    }
}