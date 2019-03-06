<?php

/** modèle de la table Users. */
class user extends database {

    /** Déclaration des attributs représentant les champs correspondants dans la table. */
    public $id;
    public $pseudo;
    public $firstname;
    public $lastname;
    public $mail;
    public $password;
    public $id_userType;

    /** Déclaration de la méthode magique construct. */
    public function __construct() {
        parent::__construct();
    }

    /** Méthode addUser permettant à un nouvel utilisateur de s'inscrire, en preparant et executant une requête pour inserer les informations requises dans la base de données. */
    public function addUser() {
        $query = 'INSERT INTO `Users`(`pseudo`, `password`, `lastname`, `firstname`, `email`)
VALUES(:pseudo,:password,:lastname,:firstname,:email)';
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $addUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $addUser->bindValue(':email', $this->mail, PDO::PARAM_STR);

        if ($addUser->execute()) {
            return true;
        }
    }

    /** Méthode updateUser permettant à un utilisateur de modifier ses informations puis d'insérer les modifications dans la base de données via une requête préparée. */
    public function updateUser() {
        $query = 'UPDATE `Users` SET `pseudo` = :pseudo, `firstname` = :firstname, `lastname` = :lastname, `email` = :email WHERE `id_users` = :id';
        $updateUser = $this->db->prepare($query);
        $updateUser->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updateUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        $updateUser->bindValue(':id', $this->id_users, PDO::PARAM_INT);

        if ($updateUser->execute()) {
            return true;
        }
    }

    /** Méthode deleteUser permettant à un utilisateur de supprimer son compte avec une requête préparée qui va supprimer les données correspondant à l'id de l'utilisateur dans la table Users. */
    public function deleteUser() {
        $query = 'DELETE FROM `Users` WHERE `id_users` = :id';
        $delete = $this->db->prepare($query);
        $delete->bindValue(':id', $this->id_users, PDO::PARAM_INT);
        if ($delete->execute()) {
            return true;
        }
    }

    /** Méthode userInfos permettant à un utilisateur de consulter les informations qui sont enregistrées sur lui via une requête permettant d'afficher les informations correspondant à son id. */
    public function userInfos() {
        $query = 'SELECT * FROM `Users` WHERE `id_users` = :id';
        $list = $this->db->prepare($query);
        $list->bindValue(':id', $this->id_users, PDO::PARAM_STR);
        if ($list->execute()) {
            $resultList = $list->fetchAll(PDO::FETCH_OBJ);
            return $resultList;
        } else {
            echo 'erreur!';
        }
    }

    /** Méthode logInUser permettant à un utilisateur de se connecter à son session utilisateur, ceci avec une requête préparée qui va permettre de stocker ses informations qu'on reutilisera dans le controlleur correspondant. */
    public function logInUser() {
        $query = $this->db->prepare("SELECT * FROM `Users` WHERE `pseudo` = :pseudo");
        $query->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        if ($query->execute()) {
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            if (COUNT($result) > 0) {
                $this->id_users = $result[0]->id_users;
                $this->password = $result[0]->password;
                $this->id_userType = $result[0]->id_userType;
                $this->lastname = $result[0]->lastname;
                $this->firstname = $result[0]->firstname;
                $this->email = $result[0]->email;
                return true;
            } else {
                return false;
            }
        }
    }

    public function UserInfosAdmin() {
        $query = 'SELECT * FROM `Users`';
        $list = $this->db->prepare($query);
        if ($list->execute()) {
            $resultList = $list->fetchAll(PDO::FETCH_OBJ);
            return $resultList;
        } else {
            echo 'erreur!';
        }
    }

    public function updateUserAdmin() {
        $query = 'UPDATE `Users` SET `pseudo` = :pseudo, `firstname` = :firstname, `lastname` = :lastname, `email` = :email WHERE `id_users` = :id';
        $updateUser = $this->db->prepare($query);
        $updateUser->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updateUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        $updateUser->bindValue(':id', $this->id_users, PDO::PARAM_INT);

        if ($updateUser->execute()) {
            return true;
        }
    }

}
