<div class="container page-shell">
    <section class="page-hero">
        <div>
            <span class="eyebrow"><i class="bi bi-person-plus-fill"></i> Gestion des etudiants</span>
            <h1>Inscrire les apprenants dans une interface nette, moderne et orientee suivi scolaire.</h1>
            <p>Ce module relie les etudiants, les classes et les futurs traitements comme les notes, paiements, presences et bulletins. Il respecte la logique modulaire de ton schema.</p>
        </div>

        <div class="hero-stat-panel">
            <div class="stat-card">
                <span class="stat-card__label">Etudiants references</span>
                <span class="stat-card__value"><?= count($eleves) ?></span>
                <span class="stat-card__hint">Profils actuellement en base</span>
            </div>
        </div>
    </section>

    <section class="panel-grid">
        <div class="form-panel">
            <div class="section-heading">
                <div>
                    <h2>Nouvelle inscription</h2>
                    <p>Renseigne l identite de l etudiant et sa classe d affectation.</p>
                </div>
            </div>

            <form action="inscription.php?action=inscrire" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Ex: MBIANDA" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Ex: Jean" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Date de naissance</label>
                        <input type="date" name="date_naiss" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Sexe</label>
                        <select name="sexe" class="form-select" required>
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Classe d affectation</label>
                        <select name="id_classe" class="form-select" required>
                            <option value="">Choisir une classe</option>
                            <?php foreach ($classes as $c): ?>
                                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nom_classe']) ?> (<?= htmlspecialchars($c['niveau']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="reset" class="btn btn-outline-brand flex-fill">Reinitialiser</button>
                    <button type="submit" class="btn btn-brand flex-fill">Confirmer l inscription</button>
                </div>
            </form>
        </div>

        <div class="table-panel">
            <div class="section-heading">
                <div>
                    <h2>Derniers etudiants</h2>
                    <p>Vision rapide des profils deja integres dans le systeme.</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Nom complet</th>
                            <th>Classe</th>
                            <th>Sexe</th>
                            <th>Suivi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($eleves)): ?>
                            <tr>
                                <td colspan="4" class="empty-state">Aucun etudiant n est encore inscrit.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($eleves as $e): ?>
                                <tr>
                                    <td class="fw-bold"><?= htmlspecialchars($e['nom'] . ' ' . $e['prenom']) ?></td>
                                    <td><?= htmlspecialchars($e['nom_classe'] ?? 'Non affecte') ?></td>
                                    <td><?= htmlspecialchars($e['sexe'] ?? '-') ?></td>
                                    <td><span class="module-chip">Dossier actif</span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
