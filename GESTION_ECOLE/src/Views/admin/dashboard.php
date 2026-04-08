<div class="container page-shell">
    <section class="page-hero">
        <div>
            <span class="eyebrow"><i class="bi bi-shield-fill-check"></i> Espace administrateur</span>
            <h1>Piloter le systeme scolaire avec une presentation nette, modulaire et professionnelle.</h1>
            <p>Ce tableau de bord recentre l administration autour des utilisateurs, de la logique metier PHP MVC, des modules fonctionnels et de l acces aux donnees, comme dans ton schema de reference.</p>

            <div class="hero-inline-meta">
                <span><i class="bi bi-sliders"></i> Supervision globale</span>
                <span><i class="bi bi-bar-chart-fill"></i> Reporting executif</span>
                <span><i class="bi bi-cloud-arrow-down-fill"></i> Sauvegarde & evolution</span>
            </div>
        </div>

        <div class="hero-stat-panel">
            <div class="stat-card">
                <span class="stat-card__label">Utilisateurs servis</span>
                <span class="stat-card__value">5</span>
                <span class="stat-card__hint">Administrateur, enseignant, agent, etudiant, parent</span>
            </div>
            <div class="stat-card">
                <span class="stat-card__label">Modules visibles</span>
                <span class="stat-card__value"><?= count($modules) ?></span>
                <span class="stat-card__hint">Architecture fonctionnelle unifiee</span>
            </div>
        </div>
    </section>

    <section class="stats-grid">
        <article class="stat-card">
            <span class="stat-card__label">Etudiants</span>
            <span class="stat-card__value"><?= $stats['eleves'] ?></span>
            <span class="stat-card__hint">Population scolaire suivie</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__label">Enseignants</span>
            <span class="stat-card__value"><?= $stats['enseignants'] ?></span>
            <span class="stat-card__hint">Corps enseignant reference</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__label">Classes</span>
            <span class="stat-card__value"><?= $stats['classes'] ?></span>
            <span class="stat-card__hint">Niveaux et promotions</span>
        </article>
        <article class="stat-card">
            <span class="stat-card__label">Notes</span>
            <span class="stat-card__value"><?= $stats['notes'] ?></span>
            <span class="stat-card__hint">Traces pedagogiques</span>
        </article>
    </section>

    <section class="panel-grid">
        <div class="surface-card">
            <div class="section-heading">
                <div>
                    <h2>Structure du systeme</h2>
                    <p>Le projet suit une lecture claire de haut en bas, comme ton schema fonctionnel.</p>
                </div>
            </div>

            <div class="layer-stack">
                <?php foreach ($systemLayers as $layer): ?>
                    <div class="layer-stack__item">
                        <strong><?= htmlspecialchars($layer['title']) ?></strong>
                        <span><?= htmlspecialchars($layer['subtitle']) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="surface-card">
            <div class="section-heading">
                <div>
                    <h2>Priorites administratives</h2>
                    <p>Actions qui doivent guider la remise au propre du projet.</p>
                </div>
            </div>

            <div class="quick-grid">
                <div class="info-card">
                    <div class="info-card__icon" style="background: linear-gradient(135deg, #0f6cab, #47a0ff);">
                        <i class="bi bi-brush-fill"></i>
                    </div>
                    <h3>Design unifie</h3>
                    <p>Suppression de l ancien habillage et adoption d une seule direction visuelle.</p>
                </div>
                <div class="info-card">
                    <div class="info-card__icon" style="background: linear-gradient(135deg, #1fa37d, #59d2aa);">
                        <i class="bi bi-columns-gap"></i>
                    </div>
                    <h3>Structure lisible</h3>
                    <p>Navigation claire entre dashboard, etudiants, classes, notes et administration.</p>
                </div>
                <div class="info-card">
                    <div class="info-card__icon" style="background: linear-gradient(135deg, #ff9c42, #ffbe6b);">
                        <i class="bi bi-diagram-2-fill"></i>
                    </div>
                    <h3>Modules alignes</h3>
                    <p>Les blocs fonctionnels suivent le schema des besoins metier.</p>
                </div>
                <div class="info-card">
                    <div class="info-card__icon" style="background: linear-gradient(135deg, #d94b4b, #f17d67);">
                        <i class="bi bi-database-fill-check"></i>
                    </div>
                    <h3>Base exploitable</h3>
                    <p>Les ecrans doivent rester connectes aux vraies donnees MySQL quand elles existent.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="surface-card">
        <div class="section-heading">
            <div>
                <h2>Cartographie des modules</h2>
                <p>Chaque module correspond a un bloc metier visible et assume dans l interface.</p>
            </div>
        </div>

        <div class="module-grid">
            <?php foreach ($modules as $module): ?>
                <article class="module-card">
                    <div class="module-card__icon" style="background: <?= $module['theme'] ?>;">
                        <i class="bi <?= $module['icon'] ?>"></i>
                    </div>
                    <h3><?= htmlspecialchars($module['title']) ?></h3>
                    <p><?= htmlspecialchars($module['description']) ?></p>
                    <div class="module-card__footer">
                        <span class="module-chip"><?= htmlspecialchars($module['status']) ?></span>
                        <span class="meta-chip">Admin</span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>
