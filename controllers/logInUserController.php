<?php
require_once '../models/dbConnect.php';
require_once '../models/userModel.php';

if (isset($_POST['submit_login'])){

    //J'instancie l'objet à ma classe user()
    $userLogIn = new user();
    // j'assainis l'entrée
    $pseudo = htmlentities($_POST['pseudoInput']);
    $password = $_POST['passwordInput']; 
    $userLogIn->pseudo = $pseudo;
    $userLogIn->password = $password;
    $result = $userLogIn->logInUser();
    
if ($result && password_verify($password, $userLogIn->password)) {
		// Je stocke les informations de connexion de l'utilisateur.
		session_start();
		$_SESSION['pseudo'] = $_POST['pseudoInput'];
		$_SESSION['firstname'] = $userLogIn->firstname;
                $_SESSION['lastname'] = $userLogIn->lastname;
                $_SESSION['email'] = $userLogIn->email;
                $_SESSION['password'] = $_POST['passwordInput'];
		$_SESSION['id'] = $userLogIn->id_users;
                $_SESSION['id_rights'] = $userLogIn->id_userType;
		
		// Je redirige l'utilisateur vers la page utilisateur
		header ('location: ../views/user.php');
	}
	else {
		header ('location: ../views/home.php');
	}
}