<?php
// public/admin/backup.php
session_start();
require_once __DIR__ . '/../../config/db.php';

// Sécurité : Seul l'admin peut sauvegarder
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Accès refusé.");
}

// Nom du fichier de sortie
$filename = "backup_ecole_" . date('Y-m-d_H-i-s') . ".sql";

// Entêtes pour forcer le téléchargement
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $filename);

// Initialisation du contenu SQL
$output = "-- Sauvegarde Gestion Ecole\ -- Date: " . date('Y-m-d H:i:s') . "\n\n";

// Liste des tables à sauvegarder
$tables = ['utilisateurs', 'classes', 'enseignants', 'eleves', 'cours', 'notes', 'emplois_du_temps', 'paiements'];

foreach ($tables as $table) {
    // Structure de la table
    $stmt = $pdo->query("SHOW CREATE TABLE $table");
    $row = $stmt->fetch();
    $output .= "\n\n" . $row[1] . ";\n\n";

    // Données de la table
    $stmt = $pdo->query("SELECT * FROM $table");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $keys = array_keys($row);
        $values = array_map(function($val) use ($pdo) {
            return ($val === null) ? 'NULL' : $pdo->quote($val);
        }, array_values($row));
        
        $output .= "INSERT INTO $table (" . implode(', ', $keys) . ") VALUES (" . implode(', ', $values) . ");\n";
    }
}

// Affichage final (déclenche le téléchargement)
echo $output;
exit;