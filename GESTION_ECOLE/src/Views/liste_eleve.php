<div class="container mt-4">
    <h2>Liste des Élèves</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Classe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eleves as $eleve): ?>
            <tr>
                <td><?= htmlspecialchars($eleve['nom']) ?></td>
                <td><?= htmlspecialchars($eleve['prenom']) ?></td>
                <td><?= $eleve['id_classe'] ?></td>
                <td>
                    <a href="modifier.php?id=<?= $eleve['id'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>