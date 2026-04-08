<?php
// src/Models/Eleve.php
class Eleve {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function listerTout() {
        // Jointure pour afficher le nom de la classe au lieu de son ID
        $sql = "SELECT eleves.*, classes.nom_classe 
                FROM eleves 
                LEFT JOIN classes ON eleves.id_classe = classes.id 
                ORDER BY eleves.nom ASC";
        return $this->pdo->query($sql)->fetchAll();
    }

    

    public function inscrire($nom, $prenom, $date_naiss, $sexe, $id_classe) {
        $sql = "INSERT INTO eleves (nom, prenom, date_naissance, sexe, id_classe) VALUES (?, ?, ?, ?, ?)";
        return $this->pdo->prepare($sql)->execute([$nom, $prenom, $date_naiss, $sexe, $id_classe]);
    }
}
?>