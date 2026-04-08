<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once('../config/db.php');
require_once('../src/Models/note.php');
require_once('../src/Models/Eleves.php');

$noteModel = new Note($pdo);
$eleveModel = new Eleve($pdo);

$stmtCours = $pdo->query("SELECT * FROM cours ORDER BY libelle");
$cours = $stmtCours->fetchAll(PDO::FETCH_ASSOC);
$eleves = $eleveModel->listerTout();

if (isset($_GET['action']) && $_GET['action'] === 'enregistrer' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteModel->sauvegarder($_POST['id_eleve'], $_POST['id_cours'], $_POST['valeur'], $_POST['trimestre']);
    header('Location: notes.php?success=1');
    exit();
}

$stmtNotes = $pdo->query(
    "SELECT n.note, n.trimestre, e.nom, e.prenom, c.libelle
     FROM notes n
     INNER JOIN eleves e ON e.id = n.id_eleve
     INNER JOIN cours c ON c.id = n.id_cours
     ORDER BY n.date_saisie DESC
     LIMIT 8"
);
$notesRecentes = $stmtNotes->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Gestion des notes';
$currentSection = 'notes';

include('../includes/header.php');
include('../src/Views/saisie_note.php');
include('../includes/footer.php');
