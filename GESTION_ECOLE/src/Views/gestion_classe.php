<div class="container page-shell">
    <section class="page-hero">
        <div>
            <span class="eyebrow"><i class="bi bi-diagram-3-fill"></i> Gestion des classes</span>
            <h1>Structurer les promotions et les niveaux dans un espace propre et professionnel.</h1>
            <p>La gestion des classes constitue un bloc central du systeme: elle connecte les etudiants, les horaires, les notes et l organisation de l annee scolaire.</p>
        </div>

        <div class="hero-stat-panel">
            <div class="stat-card">
                <span class="stat-card__label">Classes enregistrees</span>
                <span class="stat-card__value"><?= count($classes) ?></span>
                <span class="stat-card__hint">Structures pedagogiques actives</span>
            </div>
        </div>
    </section>

    <section class="panel-grid">
        <div class="form-panel">
            <div class="section-heading">
                <div>
                    <h2>Nouvelle classe</h2>
                    <p>Ajoute une nouvelle structure scolaire avec niveau et annee academique.</p>
                </div>
            </div>

            <form action="classes.php?action=ajouter" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nom de la classe</label>
                    <input type="text" name="nom_classe" class="form-control" placeholder="Ex: 6eme A" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Niveau</label>
                    <select name="niveau" class="form-select" required>
                        <option value="Primaire">Primaire</option>
                        <option value="Secondaire">Secondaire</option>
                        <option value="Lycee">Lycee</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Annee scolaire</label>
                    <input type="text" name="annee_scolaire" class="form-control" value="2025-2026" required>
                </div>

                <button type="submit" class="btn btn-brand w-100">
                    <i class="bi bi-plus-circle-fill"></i> Enregistrer la classe
                </button>
            </form>
        </div>

        <div class="table-panel">
            <div class="section-heading">
                <div>
                    <h2>Organisation actuelle</h2>
                    <p>Vue des classes deja enregistrees dans le systeme.</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Classe</th>
                            <th>Niveau</th>
                            <th>Annee</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($classes)): ?>
                            <tr>
                                <td colspan="4" class="empty-state">Aucune classe n est encore enregistree.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($classes as $c): ?>
                                <tr>
                                    <td class="fw-bold"><?= htmlspecialchars($c['nom_classe']) ?></td>
                                    <td><?= htmlspecialchars($c['niveau']) ?></td>
                                    <td><?= htmlspecialchars($c['annee_scolaire']) ?></td>
                                    <td><span class="module-chip">Active</span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
