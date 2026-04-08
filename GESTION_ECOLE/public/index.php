<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once('../config/db.php');

$stats = [
    'eleves' => 0,
    'enseignants' => 0,
    'classes' => 0,
    'notes' => 0,
    'paiements' => 0,
];

try {
    $stats['eleves'] = (int) $pdo->query("SELECT COUNT(*) FROM eleves")->fetchColumn();
    $stats['enseignants'] = (int) $pdo->query("SELECT COUNT(*) FROM enseignants")->fetchColumn();
    $stats['classes'] = (int) $pdo->query("SELECT COUNT(*) FROM classes")->fetchColumn();
    $stats['notes'] = (int) $pdo->query("SELECT COUNT(*) FROM notes")->fetchColumn();
    $stats['paiements'] = (int) $pdo->query("SELECT COUNT(*) FROM paiements")->fetchColumn();
} catch (Throwable $exception) {
    // On conserve des compteurs a zero si certaines tables sont encore vides.
}

$roles = [
    ['icon' => 'bi-person-gear', 'label' => 'Administrateur', 'description' => 'Pilote le systeme, les utilisateurs et les rapports globaux.'],
    ['icon' => 'bi-person-video3', 'label' => 'Enseignant', 'description' => 'Saisit les notes, suit les cours et les emplois du temps.'],
    ['icon' => 'bi-briefcase-fill', 'label' => 'Agent academique', 'description' => 'Organise les inscriptions, classes et dossiers scolaires.'],
    ['icon' => 'bi-backpack4-fill', 'label' => 'Etudiant', 'description' => 'Consulte ses informations, notes et presence.'],
    ['icon' => 'bi-people-fill', 'label' => 'Parent', 'description' => 'Suit les paiements, resultats et informations de l enfant.'],
];

$modules = [
    ['icon' => 'bi-people-fill', 'title' => 'Gestion des etudiants', 'description' => 'Inscriptions, profils, classes et suivi scolaire centralise.', 'status' => 'Actif', 'theme' => 'linear-gradient(135deg, #ff9c42, #ffbe6b)'],
    ['icon' => 'bi-person-workspace', 'title' => 'Gestion des enseignants', 'description' => 'Organisation des affectations, specialites et cours attribues.', 'status' => 'Structure en place', 'theme' => 'linear-gradient(135deg, #58b368, #92d36e)'],
    ['icon' => 'bi-qr-code-scan', 'title' => 'Presence & QR code', 'description' => 'Zone prevue pour le controle moderne des presences et acces.', 'status' => 'A integrer', 'theme' => 'linear-gradient(135deg, #1f7ae0, #47a0ff)'],
    ['icon' => 'bi-gear-wide-connected', 'title' => 'Administration & rapports', 'description' => 'Parametrage, sauvegardes, supervision et tableaux de bord executifs.', 'status' => 'Actif', 'theme' => 'linear-gradient(135deg, #1896b0, #2dd0d6)'],
    ['icon' => 'bi-cash-coin', 'title' => 'Paiements scolaires', 'description' => 'Encaissements, suivi financier et vision comptable de l etablissement.', 'status' => 'Base prete', 'theme' => 'linear-gradient(135deg, #d94b4b, #f17d67)'],
    ['icon' => 'bi-journal-richtext', 'title' => 'Gestion des notes', 'description' => 'Saisie par trimestre, recapitulatif et edition du bulletin officiel.', 'status' => 'Actif', 'theme' => 'linear-gradient(135deg, #7f54d9, #a579ff)'],
];

$systemLayers = [
    ['title' => 'Utilisateurs', 'subtitle' => 'Administrateur, enseignant, agent academique, etudiant et parent interagissent via la meme plateforme.'],
    ['title' => 'Interface web', 'subtitle' => 'Presentation moderne en HTML, CSS et JS, pensee pour un usage quotidien.'],
    ['title' => 'Logique metier', 'subtitle' => 'Organisation backend en PHP avec structure MVC et separation progressive des responsabilites.'],
    ['title' => 'Modules fonctionnels', 'subtitle' => 'Gestion des etudiants, notes, paiements, enseignants, administration et futurs modules.'],
    ['title' => 'Acces aux donnees', 'subtitle' => 'Requetes SQL centralisees via PDO avec MySQL comme socle de persistance.'],
];

$adminPages = [
    'dashboard' => '../src/Views/admin/dashboard.php',
];

$userPages = [
    'dashboard' => '../src/Views/dashboard.php',
];

$page = $_GET['page'] ?? 'dashboard';
$pages = ($_SESSION['role'] ?? '') === 'admin' ? $adminPages : $userPages;

if (!isset($pages[$page])) {
    $page = 'dashboard';
}

$pageTitles = [
    'dashboard' => 'Tableau de bord',
];

$pageTitle = $pageTitles[$page] ?? 'Gestion Ecole';
$currentSection = 'dashboard';

include('../includes/header.php');
include($pages[$page]);
include('../includes/footer.php');
