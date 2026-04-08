<div class="container page-shell">
    <section class="page-hero">
        <div>
            <span class="eyebrow"><i class="bi bi-diagram-3-fill"></i> Architecture du systeme</span>
            <h1>Un systeme scolaire organise selon les roles, les couches techniques et les modules metier.</h1>
            <p>Le nouveau tableau de bord reprend la logique de ton schema: les utilisateurs arrivent par l interface web, la logique metier PHP MVC orchestre les modules, puis les donnees sont stockees dans MySQL.</p>

            <div class="hero-inline-meta">
                <span><i class="bi bi-window"></i> Frontend HTML / CSS / JS</span>
                <span><i class="bi bi-hdd-stack"></i> Backend PHP MVC</span>
                <span><i class="bi bi-database-fill"></i> Base de donnees MySQL</span>
            </div>
        </div>

        <div class="hero-stat-panel">
            <div class="stat-card">
                <span class="stat-card__label">Etudiants</span>
                <span class="stat-card__value"><?= $stats['eleves'] ?></span>
                <span class="stat-card__hint">Dossiers scolaires suivis</span>
            </div>
            <div class="stat-card">
                <span class="stat-card__label">Classes</span>
                <span class="stat-card__value"><?= $stats['classes'] ?></span>
                <span class="stat-card__hint">Structures pedagogiques actives</span>
            </div>
        </div>
    </section>

    <section class="surface-card">
        <div class="section-heading">
            <div>
                <h2>Utilisateurs cibles</h2>
                <p>La plateforme reste lisible pour chaque acteur de l etablissement.</p>
            </div>
        </div>

        <div class="roles-grid">
            <?php foreach ($roles as $role): ?>
                <article class="role-card">
                    <div class="role-card__icon">
                        <i class="bi <?= $role['icon'] ?>"></i>
                    </div>
                    <h3><?= htmlspecialchars($role['label']) ?></h3>
                    <p><?= htmlspecialchars($role['description']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="panel-grid" id="architecture">
        <div class="surface-card">
            <div class="section-heading">
                <div>
                    <h2>Couches techniques</h2>
                    <p>Lecture simple du fonctionnement global du systeme.</p>
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
                    <h2>Vue de pilotage</h2>
                    <p>Les chiffres cles permettent de mesurer rapidement le niveau de couverture du systeme.</p>
                </div>
            </div>

            <div class="quick-grid">
                <div class="stat-card">
                    <span class="stat-card__label">Enseignants</span>
                    <span class="stat-card__value"><?= $stats['enseignants'] ?></span>
                    <span class="stat-card__hint">Intervenants references</span>
                </div>
                <div class="stat-card">
                    <span class="stat-card__label">Notes</span>
                    <span class="stat-card__value"><?= $stats['notes'] ?></span>
                    <span class="stat-card__hint">Evaluations deja saisies</span>
                </div>
                <div class="stat-card">
                    <span class="stat-card__label">Paiements</span>
                    <span class="stat-card__value"><?= $stats['paiements'] ?></span>
                    <span class="stat-card__hint">Transactions enregistrees</span>
                </div>
                <div class="stat-card">
                    <span class="stat-card__label">Qualite cible</span>
                    <span class="stat-card__value">Pro</span>
                    <span class="stat-card__hint">Design propre et structure lisible</span>
                </div>
            </div>
        </div>
    </section>

    <section class="surface-card">
        <div class="section-heading">
            <div>
                <h2>Modules fonctionnels</h2>
                <p>La plateforme reprend les blocs metier de ton schema avec une presentation plus professionnelle.</p>
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
                        <span class="meta-chip">Module</span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</div>
