<div class="container py-4">
    <h3 class="mb-4 text-primary">Emploi du temps : <span class="text-dark">6ème A</span></h3>
    
    <div class="table-responsive shadow-lg rounded">
        <table class="table table-bordered bg-white align-middle text-center mb-0">
            <thead class="table-primary">
                <tr>
                    <th style="width: 15%;">Heure</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $heures = ["08h - 10h", "10h - 12h", "12h - 13h (Pause)", "13h - 15h", "15h - 17h"];
                foreach($heures as $h): 
                ?>
                <tr>
                    <td class="fw-bold bg-light"><?= $h ?></td>
                    <?php for($i=0; $i<5; $i++): ?>
                        <td class="p-3">
                            <?php if($h == "12h - 13h (Pause)"): ?>
                                <small class="text-muted italic">---</small>
                            <?php else: ?>
                                <div class="p-2 rounded border bg-light small shadow-sm hover-shadow">
                                    <div class="fw-bold text-primary">Matière</div>
                                    <div class="text-muted">M. NomProf</div>
                                </div>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>