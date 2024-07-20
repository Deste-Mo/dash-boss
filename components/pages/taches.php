<div class="container-fluid">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-right">
            <a href="#">Liste des tâches pour le projet ID <?= htmlspecialchars($projectId) ?></a>
        </li>
    </ol>

    <!-- Assign Task Modal -->
    <div class="modal fade" id="assignTaskModal" tabindex="-1" aria-labelledby="assignTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignTaskModalLabel">Affecter une tâche</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal content for assigning task -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Affecter</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Task Table -->
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Nom de la tâche</th>
                    <th>Durée</th>
                    <th>État</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Responsable</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($taches)): ?>
                <tr>
                    <td colspan="8" class="text-center">Aucune tâche trouvée</td>
                </tr>
            <?php else: ?>
            <?php foreach ($taches as $tache): ?>
                <tr>
                    <td><?= htmlspecialchars($tache['tache_id']) ?></td>
                    <td><?= htmlspecialchars($tache['tache_nom']) ?></td>
                    <td><?= htmlspecialchars($tache['duree']) ?></td>
                    <td><?= htmlspecialchars($tache['etat']) ?></td>
                    <td><?= htmlspecialchars($tache['dateCom']) ?></td>
                    <td><?= htmlspecialchars($tache['dateFin']) ?></td>
                    <td><?= htmlspecialchars($tache['nom']) ?> <?= htmlspecialchars($tache['prenom']) ?></td>
                    <td>
                        <!-- Actions for tasks -->
                        <button class="btn btn-primary" onclick="affectPersonnal(<?= htmlspecialchars($tache['tache_id']) ?>, <?= htmlspecialchars($_SESSION['user_id']) ?>)">Affecter</button>
                        <button class="btn btn-success" onclick="clearTask(<?= htmlspecialchars($tache['tache_id']) ?>, <?= htmlspecialchars($projectId) ?>)">Marquer comme complété</button>
                        <button class="btn btn-warning" onclick="annulerTask(<?= htmlspecialchars($tache['tache_id']) ?>, <?= htmlspecialchars($tache['duree']) ?>, <?= htmlspecialchars($projectId) ?>)">Annuler</button>
                        <button class="btn btn-danger" onclick="deleteTask(<?= htmlspecialchars($tache['tache_id']) ?>, <?= htmlspecialchars($projectId) ?>)">Supprimer</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>

        </table>
    </div>
</div>

