<?php
// src/Models/Bulletin.php
class Bulletin {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function getRecapitulatif($id_eleve, $trimestre) {
        $sql = "SELECT n.note, c.libelle, c.coefficient, (n.note * c.coefficient) as total_matiere
                FROM notes n
                JOIN cours c ON n.id_cours = c.id
                WHERE n.id_eleve = ? AND n.trimestre = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_eleve, $trimestre]);
        return $stmt->fetchAll();
    }
}
?>