<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img src="../uploads/<?= $eleve['photo'] ?>" 
                             class="rounded-circle img-thumbnail shadow-sm" 
                             style="width: 150px; height: 150px; object-fit: cover;" 
                             alt="Photo de l'élève">
                    </div>
                    
                    <h4 class="fw-bold"><?= htmlspecialchars($eleve['nom'] . ' ' . $eleve['prenom']) ?></h4>
                    <p class="text-muted small">ID Élève: #<?= $eleve['id'] ?></p>

                    <form action="profil.php?id=<?= $eleve['id'] ?>&action=upload" method="POST" enctype="multipart/form-data" class="mt-4">
                        <div class="input-group mb-3">
                            <input type="file" name="photo_profil" class="form-control" id="inputGroupFile02" accept="image/*" required>
                            <button type="submit" class="btn btn-primary">Changer la photo</button>
                        </div>
                        <div class="form-text">Formats acceptés : JPG, PNG. Taille max : 2Mo.</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>