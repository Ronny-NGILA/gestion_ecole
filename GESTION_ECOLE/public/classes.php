<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once('../config/db.php');
require_once('../src/Models/classe.php');

$classeModel = new Classe($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'ajouter' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $classeModel->ajouter($_POST['nom_classe'], $_POST['niveau'], $_POST['annee_scolaire']);
    header('Location: classes.php');
    exit();
}

$classes = $classeModel->listerTout();
$pageTitle = 'Gestion des classes';
$currentSection = 'classes';

include('../includes/header.php');
include('../src/Views/gestion_classe.php');
include('../includes/footer.php');
