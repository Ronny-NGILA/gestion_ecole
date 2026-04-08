<div class="container py-5">
    <div class="card shadow-lg border-0 bg-white p-5" id="bulletin">
        
        <div class="row mb-4 border-bottom pb-3">
            <div class="col-6">
                <h2 class="text-primary fw-bold mb-0">ÉCOLE NATIONALE</h2>
                <p class="text-muted small">République du Congo<br>Direction des Études</p>
            </div>
            <div class="col-6 text-end">
                <h4 class="fw-bold">BULLETIN DE NOTES</h4>
                <span class="badge bg-dark text-uppercase"><?= $trimestre ?>er Trimestre</span>
                <p class="mt-2">Année Scolaire : 2025-2026</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-8">
                <h5 class="fw-bold text-uppercase"><?= $eleve['nom'] ?> <?= $eleve['prenom'] ?></h5>
                <p class="mb-0">Classe : <span class="fw-bold text-secondary"><?= $eleve['nom_classe'] ?></span></p>
            </div>
            <div class="col-4 text-end">
                <img src="../uploads/<?= $eleve['photo'] ?>" class="img-thumbnail" style="width: 80px;">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Matières</th>
                        <th class="text-center">Coefficient</th>
                        <th class="text-center">Note / 20</th>
                        <th class="text-center">Total Coeff.</th>
                        <th>Appréciation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_points = 0; $total_coeffs = 0;
                    foreach($recap as $r): 
                        $total_points += $r['total_matiere'];
                        $total_coeffs += $r['coefficient'];
                    ?>
                    <tr>
                        <td class="fw-bold"><?= $r['libelle'] ?></td>
                        <td class="text-center"><?= $r['coefficient'] ?></td>
                        <td class="text-center"><?= number_format($r['note'], 2) ?></td>
                        <td class="text-center fw-bold"><?= number_format($r['total_matiere'], 2) ?></td>
                        <td class="small">
                            <?php 
                                if($r['note'] >= 16) echo "Excellent";
                                elseif($r['note'] >= 12) echo "Bien";
                                elseif($r['note'] >= 10) echo "Passable";
                                else echo "Insuffisant";
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="table-secondary fw-bold">
                    <tr>
                        <td colspan="3" class="text-end">Moyenne Générale :</td>
                        <td class="text-center text-danger fs-5">
                            <?= ($total_coeffs > 0) ? number_format($total_points / $total_coeffs, 2) : '0' ?> / 20
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row mt-5">
            <div class="col-6 text-center">
                <p class="text-decoration-underline">Le Titulaire</p>
            </div>
            <div class="col-6 text-center">
                <p class="text-decoration-underline">Le Directeur</p>
                <div class="mt-4" style="height: 60px;"></div> </div>
        </div>
    </div>

    <div class="text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-dark px-5 shadow">
            <i class="bi bi-printer me-2"></i> Imprimer le Bulletin
        </button>
    </div>
</div>