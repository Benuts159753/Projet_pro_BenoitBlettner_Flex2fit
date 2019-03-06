<?php
/** Démarage de la session sur cette page pour obtenir les informations de l'utilisateur s'il est connecté. */
session_start();
/** Appel des controllers dont on va avoir besoin */
require '../controllers/userProfileController.php';
require '../controllers/updateUserController.php';
require '../controllers/sessionDestroyController.php';
require '../controllers/deleteUserController.php';
require '../controllers/deleteUserAdminController.php';
require '../controllers/userProfileAdminController.php';
require '../controllers/updateUserAdminController.php';
require '../controllers/userProfileAdminController.php';
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" crossorigin="anonymous">  
    <title>Projet V 0.65</title>
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
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item item">
                        <!-- lien qui permet d'activer mon controller sessionDestroy qui me permet de déconnecter l'utilisateur. -->
                        <a class="nav-link" href="profile.php?disconnect" >Déconnection utilisateur</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    /** Mise en place de conditions permettant d'avoir un affichage dynamique de la page profile
     * Si la variable de session est définie et qu'elle est égal à un rang 1 (utilisateur régulier), alors affichage de l'interface profil utilisateur */
    if (isset($_SESSION['id_rights']) && ($_SESSION['id_rights'] == 1)) {
        ?>
        <div class="container margin_top">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h1 class="h1">Gestion des informations utilisateur</h1>
                </div>
                <div class="col-lg-4">
                    <form method="post" action="profile.php">
                        <button class="profile_buttons btn-primary" type="submit" name="submit_info">Afficher mes informations</button> 
                    </form>
                </div>
                <div class="col-lg-4">
                    <button class="profile_buttons btn-primary" name="updateUser" data-toggle="modal" data-target="#modalUpdate">Mettre à jour mes informations</button>
                </div>
                <div class="col-lg-4">
                    <button class="profile_buttons btn-primary" name="deleteUser" data-toggle="modal" data-target="#modalDelete">Supprimer mon compte</button>
                </div>
                <ul>
                    <?php
                    //* Quand on appuie sur le bouton submit_info, le controller va être déclencher et aller chercher les informations utilisateur dans le modele user */
                    if (isset($_POST['submit_info'])) {
                        /** boucle foreach qui permet d'afficher les informations reccueillis via le controller et le modele */
                        foreach ($list as $info) {
                            ?>
                            <li>Pseudo : <?= $info->pseudo; ?></li>
                            <li>Prénom : <?= $info->firstname; ?></li>
                            <li>Nom : <?= $info->lastname; ?></li>
                            <li>Email : <?= $info->email; ?></li>
                        </ul>
                        <?php
                    }
                }
                ?>
                <!-- modale déclenchée par le bouton updateUser contenant un formulaire qui permet de reccueillir les modification que l'utilisateur souhaite enregistrer -->
                <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdate" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUpdate">Mise à jour informations utilisateur.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>       
                            <div class="modal-body">
                                <form  method="POST" id="updateUserForm" name="updateUserForm">
                                    <div class="form-group">
                                        <label for="pseudoInput">Pseudo :</label>
                                        <input type="text" class="form-control"  id="pseudoInput" name="pseudoInput" value="<?= $_SESSION['pseudo'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstnameInput">Prénom :</label>
                                        <input type="text" class="form-control" id="firstnameInput" name="firstnameInput" value="<?= $_SESSION['firstname'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastnameInput">Nom :</label>
                                        <input type="text" class="form-control" id="lastnameInput" name="lastnameInput" value="<?= $_SESSION['lastname'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="mailInput">Email :</label>
                                        <input type="email" class="form-control" id="mailInput" name="mailInput" value="<?= $_SESSION['email'] ?>">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                                <button type="submit" name="submit_update" form="updateUserForm" class="btn btn-primary">Valider modifications</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modale demandant confirmation de suppression du compte utilisateur-->
                <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDelete">Suppression utilisateur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>       
                            <div class="modal-body">
                                <form name="deleteUserForm" method="POST">
                                    <p>Confirmez vous vouloir supprimer votre compte ?</p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                                <button type="submit" name="submit_delete" form="deleteUserForm" class="btn btn-primary">Valider suppression ?!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        /** condition permettant de reconnaitre si un administrateur est connecté, et se faisant d'afficher les informations de tout les membres ainsi que les outils specifiques à l'administration. */
    } else {
        if (isset($_SESSION['id_rights']) && ($_SESSION['id_rights'] == 2)) {
            ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Utilisateur</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                /** boucle foreach permettant d'afficher les informations de tous les utilisateurs dans un tableau, ainsi que deux boutons permettant respectivement de modifier les informations d'un utilisateur ou de supprimer son compte.' */
                                foreach ($list as $users) {
                                    ?>
                                    <tr>
                                        <td><?= $users->id_users; ?></td>
                                        <td><?= $users->pseudo; ?></td>
                                        <td><?= $users->firstname; ?></td>
                                        <td><?= $users->lastname; ?></td>
                                        <td><?= $users->email; ?></td>
                                        <td><button class="btn btn-warning" name="updateUserAdmin" data-toggle="modal" data-target="#modalUpdateAdmin">Modifier</button></td>
                                        <td><button class="btn btn-danger" name="deleteUserAdmin" data-toggle="modal" data-target="#modalDeleteAdmin">Supprimer</button></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="modalUpdateAdmin" tabindex="-1" role="dialog" aria-labelledby="modalUpdateAdmin" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalUpdateAdmin">Mise à jour informations utilisateur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>       
                                    <div class="modal-body">
                                        <form method="POST" id="updateUserAdminForm" name="updateUserForm">
                                            <label for="ID">ID utilisateur :</label>

                                            <div class="form-group">
                                                <label for="pseudoInput">Pseudo :</label>
                                                <input type="text" class="form-control"  id="pseudoInput" name="pseudoInput">
                                            </div>
                                            <div class="form-group">
                                                <label for="firstnameInput">Prénom :</label>
                                                <input type="text" class="form-control" id="firstnameInput" name="firstnameInput">
                                            </div>
                                            <div class="form-group">
                                                <label for="lastnameInput">Nom :</label>
                                                <input type="text" class="form-control" id="lastnameInput" name="lastnameInput">
                                            </div>
                                            <div class="form-group">
                                                <label for="mailInput">Email :</label>
                                                <input type="email" class="form-control" id="mailInput" name="mailInput">">
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                                        <button type="submit" name="submit_update_admin" form="updateUserAdminForm" class="btn btn-primary">Valider modifications</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalDeleteAdmin" tabindex="-1" role="dialog" aria-labelledby="modalDeleteAdmin" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDeleteAdmin">Suppression utilisateur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>       
                                    <div class="modal-body">
                                        <form name="deleteUserFormAdmin" method="POST">
                                            <p>Confirmez vous vouloir supprimer l'utilisateur ?</p>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                                        <button type="submit" name="submit_delete_admin" form="deleteUserAdminForm" class="btn btn-primary">Valider suppression ?!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo 'Veuillez vous connecter !';
        }
    }
    ?>
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin = "anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>