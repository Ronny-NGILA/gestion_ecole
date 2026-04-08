<?php
// src/Models/Note.php
class Note {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }

    // Enregistrer ou mettre à jour une note
    public function sauvegarder($id_eleve, $id_cours, $valeur, $trimestre) {
        $sql = "INSERT INTO notes (id_eleve, id_cours, note, trimestre) 
                VALUES (?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE note = VALUES(note)";
        return $this->pdo->prepare($sql)->execute([$id_eleve, $id_cours, $valeur, $trimestre]);
    }

    // Récupérer les notes d'un élève avec le nom des matières
    public function getNotesParEleve($id_eleve) {
        $sql = "SELECT n.*, c.libelle, c.coefficient 
                FROM notes n 
                JOIN cours c ON n.id_cours = c.id 
                WHERE n.id_eleve = ? 
                ORDER BY n.trimestre ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_eleve]);
        return $stmt->fetchAll();
    }
}
?>