<?php
$pageTitle = $pageTitle ?? 'Gestion Ecole';
$currentSection = $currentSection ?? 'dashboard';
$userRole = $_SESSION['role'] ?? 'visiteur';

$navigation = [
    ['id' => 'dashboard', 'label' => 'Tableau de bord', 'href' => 'index.php', 'icon' => 'bi-grid-1x2-fill'],
    ['id' => 'inscription', 'label' => 'Etudiants', 'href' => 'inscription.php', 'icon' => 'bi-people-fill'],
    ['id' => 'classes', 'label' => 'Classes', 'href' => 'classes.php', 'icon' => 'bi-diagram-3-fill'],
    ['id' => 'notes', 'label' => 'Notes', 'href' => 'notes.php', 'icon' => 'bi-journal-check'],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> - Gestion Ecole</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body class="app-body">
<div class="app-backdrop"></div>

<header class="topbar">
    <div class="container">
        <div class="topbar-shell">
            <a class="brand-mark" href="index.php">
                <span class="brand-mark__icon"><i class="bi bi-mortarboard-fill"></i></span>
                <span>
                    <strong>Gestion Ecole</strong>
                    <small>Plateforme scolaire professionnelle</small>
                </span>
            </a>

            <nav class="main-nav">
                <?php foreach ($navigation as $item): ?>
                    <a class="main-nav__link <?= $currentSection === $item['id'] ? 'is-active' : '' ?>" href="<?= $item['href'] ?>">
                        <i class="bi <?= $item['icon'] ?>"></i>
                        <span><?= $item['label'] ?></span>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="topbar-meta">
                <div class="role-pill">
                    <i class="bi bi-shield-check"></i>
                    <span><?= strtoupper(htmlspecialchars($userRole)) ?></span>
                </div>
                <a class="logout-link" href="logout.php">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Deconnexion</span>
                </a>
            </div>
        </div>
    </div>
</header>

<main class="app-main">
