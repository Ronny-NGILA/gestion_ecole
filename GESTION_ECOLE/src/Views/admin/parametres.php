<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="mb-4 fw-bold text-dark"><i class="bi bi-gear-fill text-primary me-2"></i>Configuration de l'École</h2>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active fw-bold" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">Informations Générales</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo" type="button">Logo & Cachet</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold" id="session-tab" data-bs-toggle="tab" data-bs-target="#session" type="button">Année & Périodes</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold text-danger" id="maintenance-tab" data-bs-toggle="tab" data-bs-target="#maintenance" type="button">Système & Maintenance</button>
                        </li>
                    </ul>
                </div>
                
                <div class="card-body p-4">
                    <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <form action="traitement_config.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Nom de l'établissement</label>
                                        <input type="text" name="nom_ecole" class="form-control" value="Collège Moderne de l'Espoir">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Slogan / Devise</label>
                                        <input type="text" name="devise" class="form-control" value="Discipline - Travail - Succès">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Adresse Complète</label>
                                        <textarea name="adresse" class="form-control" rows="2">123 Rue de l'Éducation, Quartier Administratif</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Téléphone</label>
                                        <input type="text" name="tel" class="form-control" value="+242 06 000 00 00">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Email de contact</label>
                                        <input type="email" name="email" class="form-control" value="contact@ecole.com">
                                    </div>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4 shadow-sm">Enregistrer les modifications</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="logo" role="tabpanel">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <p class="text-muted small mb-2">Logo actuel</p>
                                    <img src="../public/images/logo_ecole.png" class="img-thumbnail shadow-sm mb-3" style="max-height: 150px;">
                                </div>
                                <div class="col-md-8">
                                    <form action="upload_logo.php" method="POST" enctype="multipart/form-data">
                                        <label class="form-label fw-bold">Remplacer le logo (PNG recommandé)</label>
                                        <input type="file" name="logo" class="form-control mb-3">
                                        <button type="submit" class="btn btn-dark">Mettre à jour l'image</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="session" role="tabpanel">
                            <div class="alert alert-info border-0 shadow-sm mb-4">
                                <i class="bi bi-info-circle-fill me-2"></i> Ces paramètres définissent l'année scolaire active pour tout le système.
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Année Scolaire Active</label>
                                    <select class="form-select">
                                        <option value="2024-2025">2024-2025</option>
                                        <option value="2025-2026" selected>2025-2026</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Période en cours</label>
                                    <select class="form-select">
                                        <option value="1">1er Trimestre</option>
                                        <option value="2">2ème Trimestre</option>
                                        <option value="3">3ème Trimestre</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="maintenance" role="tabpanel">
                            <div class="p-4 border rounded bg-light">
                                <h5 class="text-danger fw-bold mb-3"><i class="bi bi-shield-lock-fill me-2"></i>Sauvegarde de la Base de Données</h5>
                                <p class="text-muted">En cliquant sur le bouton ci-dessous, vous téléchargerez un fichier <strong>.sql</strong> contenant l'intégralité de vos données (élèves, notes, professeurs, paiements).</p>
                                
                                <div class="d-flex align-items-center gap-3 mt-4">
                                    <a href="backup.php" class="btn btn-danger btn-lg shadow-sm">
                                        <i class="bi bi-cloud-download me-2"></i> Télécharger la Sauvegarde
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <small class="text-secondary italic">
                                        <i class="bi bi-clock-history me-1"></i> Date du serveur : <?= date('d/m/Y H:i') ?>
                                    </small>
                                </div>
                            </div>

                            <div class="mt-4 p-3 border-start border-4 border-warning bg-white">
                                <p class="mb-0 small text-muted">
                                    <strong>Conseil :</strong> Effectuez une sauvegarde avant chaque changement majeur (fin de trimestre, passage à une nouvelle année scolaire).
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>