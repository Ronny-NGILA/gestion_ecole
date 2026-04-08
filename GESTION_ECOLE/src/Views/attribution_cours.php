<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Attribuer une Matière à un Enseignant</h5>
        </div>
        <div class="card-body">
            <form action="traitement_cours.php" method="POST" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Enseignant</label>
                    <select name="id_prof" class="form-select shadow-sm">
                        <?php foreach($profs as $p): ?>
                            <option value="<?= $p['id'] ?>"><?= $p['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Matière / Cours</label>
                    <input type="text" name="libelle" class="form-control" placeholder="Ex: Mathématiques">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Coef.</label>
                    <input type="number" name="coef" class="form-control" value="1">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-success w-100 shadow">Attribuer</button>
                </div>
            </form>
        </div>
    </div>
</div>