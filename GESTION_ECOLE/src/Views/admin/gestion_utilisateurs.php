<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Utilisateurs du Système</h5>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-person-plus"></i> Ajouter
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Rôle</th>
                        <th>Dernière connexion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($utilisateurs as $user): ?>
                    <tr>
                        <td class="fw-bold"><?= $user['nom_utilisateur'] ?></td>
                        <td><span class="badge bg-secondary"><?= strtoupper($user['role']) ?></span></td>
                        <td><?= $user['created_at'] ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>