<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-secondary"><i class="bi bi-person-workspace"></i> Corps Enseignant</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProf">
            <i class="bi bi-plus-lg"></i> Ajouter un Enseignant
        </button>
    </div>

    <div class="row">
        <?php foreach($profs as $p): ?>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                        <i class="bi bi-person-fill fs-2 text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold"><?= htmlspecialchars($p['nom'] . ' ' . $p['prenom']) ?></h5>
                    <p class="badge bg-info text-dark mb-2"><?= $p['specialite'] ?></p>
                    <div class="small text-muted mb-3">
                        <i class="bi bi-telephone"></i> <?= $p['telephone'] ?>
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary">Profil</a>
                        <a href="#" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>