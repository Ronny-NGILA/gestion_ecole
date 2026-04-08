<div class="container page-shell">
    <section class="page-hero">
        <div>
            <span class="eyebrow"><i class="bi bi-journal-check"></i> Gestion des notes</span>
            <h1>Saisir, suivre et valoriser les evaluations dans un module plus professionnel.</h1>
            <p>Le bloc notes est directement relie au schema metier du systeme: enseignants, etudiants, classes, bulletins et rapports doivent s articuler autour de lui.</p>
        </div>

        <div class="hero-stat-panel">
            <div class="stat-card">
                <span class="stat-card__label">Cours disponibles</span>
                <span class="stat-card__value"><?= count($cours) ?></span>
                <span class="stat-card__hint">Matieres parametrees pour la saisie</span>
            </div>
            <div class="stat-card">
                <span class="stat-card__label">Dernieres notes</span>
                <span class="stat-card__value"><?= count($notesRecentes) ?></span>
                <span class="stat-card__hint">Historique recent visible</span>
            </div>
        </div>
    </section>

    <section class="panel-grid">
        <div class="form-panel">
            <div class="section-heading">
                <div>
                    <h2>Saisie par trimestre</h2>
                    <p>Renseigne la matiere, l etudiant, la periode et la note sur 20.</p>
                </div>
            </div>

            <form action="notes.php?action=enregistrer" method="POST">
                <div class="mb-3">
                    <label class="form-label">Matiere</label>
                    <select name="id_cours" class="form-select" required>
                        <?php foreach ($cours as $m): ?>
                            <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['libelle']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trimestre</label>
                    <select name="trimestre" class="form-select" required>
                        <option value="1">1er trimestre</option>
                        <option value="2">2eme trimestre</option>
                        <option value="3">3eme trimestre</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Etudiant</label>
                    <select name="id_eleve" class="form-select" required>
                        <?php foreach ($eleves as $e): ?>
                            <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nom'] . ' ' . $e['prenom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Note / 20</label>
                    <input type="number" name="valeur" class="form-control" step="0.25" min="0" max="20" placeholder="Ex: 14.50" required>
                </div>

                <button type="submit" class="btn btn-brand w-100">Enregistrer la note</button>
            </form>
        </div>

        <div class="table-panel">
            <div class="section-heading">
                <div>
                    <h2>Historique recent</h2>
                    <p>Dernieres evaluations enregistrees dans le systeme.</p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Etudiant</th>
                            <th>Matiere</th>
                            <th>Trimestre</th>
                            <th>Note</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($notesRecentes)): ?>
                            <tr>
                                <td colspan="5" class="empty-state">Aucune note n a encore ete enregistree.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($notesRecentes as $note): ?>
                                <tr>
                                    <td class="fw-bold"><?= htmlspecialchars($note['nom'] . ' ' . $note['prenom']) ?></td>
                                    <td><?= htmlspecialchars($note['libelle']) ?></td>
                                    <td><?= (int) $note['trimestre'] ?></td>
                                    <td><?= number_format((float) $note['note'], 2) ?>/20</td>
                                    <td><span class="module-chip">Validee</span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
