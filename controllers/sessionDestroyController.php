<?php
// Si l'utilisateur appuie sur le bouton déconnection, on efface les variables de sessions.
if(isset($_GET['disconnect'])){
    session_unset();
    session_destroy();
    header ('location: ../views/home.php');
}