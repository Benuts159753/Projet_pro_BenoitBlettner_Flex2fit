<?php

/** On crée une classe parent permettant de se connecter à la base de données.
 * Ses enfants hériteront de ses méthodes et attributs. */
class database {

    public $db;

    /** Déclaration de la méthode qui va permettre la connexion à la base de données.
     * On utilise la classe PDO de PHP.
     * Mise en place d'une gestion des exceptions avec try catch 
     * pour attraper une erreur si il y en a une. */
    public function __construct() {
        try {
            $this->db = new PDO('mysql:dbname=Flex2fit;host=localhost', 'benoit', 'ZX2B8al20', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $this;
            /** Si une erreur arrive, on l'attrape et une affiche un message d'erreur. */
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

}
