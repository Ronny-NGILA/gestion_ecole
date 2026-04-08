-- 1. Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_ecole CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_ecole;

-- 2. Table des UTILISATEURS (Pour la connexion au projet)
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin', 'secretaire', 'comptable') DEFAULT 'secretaire',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 3. Table des CLASSES
CREATE TABLE IF NOT EXISTS classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_classe VARCHAR(50) NOT NULL,
    niveau VARCHAR(50) NOT NULL, -- Ex: Primaire, Lycée
    annee_scolaire VARCHAR(20) NOT NULL -- Ex: 2025-2026
) ENGINE=InnoDB;

-- 4. Table des ENSEIGNANTS
CREATE TABLE IF NOT EXISTS enseignants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    specialite VARCHAR(100), -- Ex: Mathématiques
    telephone VARCHAR(20),
    email VARCHAR(100)
) ENGINE=InnoDB;

-- 5. Table des ÉLÈVES
CREATE TABLE IF NOT EXISTS eleves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_naissance DATE,
    sexe ENUM('M', 'F'),
    adresse TEXT,
    photo VARCHAR(255) DEFAULT 'default.png',
    id_classe INT,
    FOREIGN KEY (id_classe) REFERENCES classes(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 6. Table des COURS (Matières)
CREATE TABLE IF NOT EXISTS cours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL,
    coefficient INT DEFAULT 1,
    id_enseignant INT,
    FOREIGN KEY (id_enseignant) REFERENCES enseignants(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 7. Table des NOTES
CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_eleve INT NOT NULL,
    id_cours INT NOT NULL,
    note DECIMAL(4,2) NOT NULL,
    trimestre INT NOT NULL, -- 1, 2 ou 3
    date_saisie TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_eleve) REFERENCES eleves(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cours) REFERENCES cours(id) ON DELETE CASCADE,
    UNIQUE KEY unique_note (id_eleve, id_cours, trimestre) -- Évite les doublons de notes
) ENGINE=InnoDB;

-- 8. Table des HORAIRES (Emploi du temps)
CREATE TABLE IF NOT EXISTS emplois_du_temps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_classe INT NOT NULL,
    id_cours INT NOT NULL,
    jour_semaine ENUM('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi') NOT NULL,
    heure_debut TIME NOT NULL,
    heure_fin TIME NOT NULL,
    FOREIGN KEY (id_classe) REFERENCES classes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cours) REFERENCES cours(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 9. Table des PAIEMENTS (Frais de scolarité)
CREATE TABLE IF NOT EXISTS paiements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_eleve INT NOT NULL,
    montant_paye DECIMAL(10,2) NOT NULL,
    date_paiement DATE NOT NULL,
    motif VARCHAR(255) DEFAULT 'Scolarité',
    FOREIGN KEY (id_eleve) REFERENCES eleves(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 10. INSERTION D'UN COMPTE ADMIN PAR DÉFAUT
-- Le mot de passe est 'admin123' (En production, hachez-le avec password_hash)
INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, role) 
VALUES ('admin', 'admin123', 'admin');