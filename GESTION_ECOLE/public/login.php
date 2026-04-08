<?php
session_start();
require_once('../config/db.php');

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['mot_de_passe']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nom_utilisateur'];
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
            exit();
        }
        $erreur = "Identifiants incorrects.";
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion Ecole</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>
<body class="app-body">
<div class="app-backdrop"></div>

<section class="login-layout">
    <div class="login-layout__grid">
        <div class="login-card">
            <div class="auth-brand">
                <span class="brand-mark__icon"><i class="bi bi-mortarboard-fill"></i></span>
                <div>
                    <strong>Gestion Ecole</strong>
                    <small>Systeme scolaire structure et professionnel</small>
                </div>
            </div>

            <span class="eyebrow"><i class="bi bi-shield-lock-fill"></i> Acces securise</span>
            <h1>Connecte-toi a la plateforme scolaire.</h1>
            <p>L interface suit une architecture claire: utilisateurs, interface web, logique metier PHP MVC, modules fonctionnels et base MySQL.</p>

            <?php if ($erreur): ?>
                <div class="alert alert-danger border-0 rounded-4 py-3 mt-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?= $erreur ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="mt-4">
                <div class="mb-3">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="username" class="form-control" placeholder="admin" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
                </div>

                <button type="submit" class="btn btn-brand w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Se connecter
                </button>
            </form>
        </div>

        <aside class="visual-card">
            <span class="eyebrow"><i class="bi bi-diagram-3-fill"></i> Structure cible</span>
            <h2>Une presentation moderne calquee sur ton schema de systeme.</h2>
            <p>Chaque partie du projet doit montrer clairement les roles utilisateurs, les couches techniques et les modules metier sans garder l ancien design brouillon.</p>

            <div class="login-module-list">
                <span><i class="bi bi-people-fill"></i> Gestion des etudiants et enseignants</span>
                <span><i class="bi bi-journal-check"></i> Gestion des notes et bulletins</span>
                <span><i class="bi bi-cash-coin"></i> Paiements scolaires et supervision</span>
                <span><i class="bi bi-qr-code-scan"></i> Presence, QR code et evolutions futures</span>
            </div>
        </aside>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
