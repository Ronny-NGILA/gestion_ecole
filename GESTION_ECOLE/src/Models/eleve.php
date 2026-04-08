<?php
// src/Models/Eleve.php
class Eleve {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }

    public function getAllEleves() {
        $stmt = $this->pdo->query("SELECT * FROM eleves ORDER BY nom ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
// Dans src/Models/Eleve.php, ajoutez cette fonction :

public function modifierPhoto($id_eleve, $nom_fichier) {
    $sql = "UPDATE eleves SET photo = ? WHERE id = ?";
    return $this->pdo->prepare($sql)->execute([$nom_fichier, $id_eleve]);
}

    public function inscrireEleve($nom, $prenom, $classe_id) {
        $sql = "INSERT INTO eleves (nom, prenom, id_classe) VALUES (?, ?, ?)";
        return $this->pdo->prepare($sql)->execute([$nom, $prenom, $classe_id]);
    }
}
?>