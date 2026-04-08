<?php
// src/Models/Classe.php
class Classe {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function listerTout() {
        $stmt = $this->pdo->query("SELECT * FROM classes ORDER BY niveau, nom_classe");
        return $stmt->fetchAll();
    }

    public function ajouter($nom, $niveau, $annee) {
        $sql = "INSERT INTO classes (nom_classe, niveau, annee_scolaire) VALUES (?, ?, ?)";
        return $this->pdo->prepare($sql)->execute([$nom, $niveau, $annee]);
    }
}
?>