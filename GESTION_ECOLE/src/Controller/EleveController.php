<?php
// src/Controllers/EleveController.php
require_once('../src/Models/Eleves.php');

class EleveController {
    private $eleveModel;

    public function __construct($pdo) {
        $this->eleveModel = new Eleve($pdo);
    }

    // Affiche la liste des élèves
    public function liste() {
        $eleves = $this->eleveModel->listerTout();
        include('../src/Views/liste_eleve.php');
    }

    // Logique pour ajouter un élève
    public function ajouter($nom, $prenom, $classe_id) {
        if (!empty($nom) && !empty($prenom)) {
            $this->eleveModel->inscrire($nom, $prenom, null, null, $classe_id);
            header('Location: ../public/inscription.php?status=success');
        }
    }
}
?>
