<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once('../config/db.php');
require_once('../src/Models/Eleves.php');
require_once('../src/Models/classe.php');

$eleveModel = new Eleve($pdo);
$classeModel = new Classe($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'inscrire' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $eleveModel->inscrire(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['date_naiss'],
        $_POST['sexe'],
        $_POST['id_classe']
    );
    header('Location: inscription.php?success=1');
    exit();
}

$classes = $classeModel->listerTout();
$eleves = $eleveModel->listerTout();
$pageTitle = 'Gestion des etudiants';
$currentSection = 'inscription';

include('../includes/header.php');
include('../src/Views/inscription_eleve.php');
include('../includes/footer.php');
