<div class="container-fluid">
    <!--======================================================  Content  ====================================================-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-right">
            <a href="#">Liste des tâches pour le projet <?= htmlspecialchars($tache_name["nomP"]) ?></a>
            <?php if ($_SESSION['auth'] == "admin") : ?>
                <a href="#" class="text-right" style="margin-left:100px" for="action" data-bs-toggle="modal" data-bs-target="#modalTache">
                    <span>+</span> Nouvelle tâche
                </a>
            <?php endif; ?>
        </li>
    </ol>

    <!-- Modal Nouvelle tache  -->
    <div class="modal fade" id="modalTache" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <form method="POST" class="modal-content" action="../api/create/nouveauTache.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Nouveau tache
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-between">
                    <div class="mx-3">
                        <label class="m-2">Nom du Tache</label>
                        <input type="text" required class="form-control" id="nom_tache" name="nom_tache">
                    </div>
                    <div>
                        <label class="m-2 d-block">Duree du Tache</label>
                        <input type="text" name="dureeTask" id="dureeTask" class="form-control w-25 d-inline">
                        <select name="uniteDeTemps" id="uniteDeTemps" class="form-select w-50 d-inline">
                            <option value="jours">Jours</option>
                            <option value="mois">Mois</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" id="btAddTask" class="btn btn-primary" onclick="addTask(<?= htmlspecialchars($id) ?>)">Ajouter</button>
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-hover ">
            <thead>
                <tr class="table-primary">
                    <th>Tâches</th>
                    <th>Responsable</th>
                    <th>Duree</th>
                    <th>Fin</th>
                    <th>status</th>
                    <?php if ($_SESSION['auth'] == "membre") : ?>
                        <th>Affecter</th>
                    <?php endif; ?>
                    <?php if ($_SESSION['auth'] == "membre") : ?>
                        <th>Terminer</th>
                    <?php endif; ?>
                    <?php if ($_SESSION['auth'] == "admin") : ?>
                        <th>Annuler
                        </th>
                        <th>
                            Supprimer</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($taches)): ?>

                <?php
                    $i = 1;
                    // $k = $pr['N_pro'];
                    foreach ($taches as $u) :
                        $date1 = date_create($u['dateCom']);
                        $date = new DateTime($u['dateCom']);
                        $date2 = date_create();
                        $duree = intval(explode(" ", $u['duree'])[0]);
                        $diff = date_diff($date1, $date2)->format('%a');
                        $res = $duree - $diff;
                        $fin = $date->add(new DateInterval('P' . $duree . 'D'));
                ?>
                <tr>
                    <td>
                        <?= $u['tache_nom'] ?>
                    </td>
                    <td>
                        <?= $u['nom'] . " " . $u['prenom'] ?>
                    </td>
                    <td>
                        <?= $diff . "/" . $u['duree'] . " jours" ?>
                    </td>
                    <td>
                        <?= $fin->format('d/m/y') ?>
                    </td>
                    <td>
                        <?php if ($u['etat'] === 'E') { ?>
                            <div class="spinner-border text-secondary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        <?php } else if ($u['etat'] === 'F') { ?>
                            Fini
                        <?php } else { ?>
                            Libre
                        <?php } ?>
                    </td>
                    <?php if ($_SESSION['auth'] == "membre") : ?>
                        <td>
                            <?php if ($u['etat'] !== 'E' && $u['etat'] !== 'F') : ?>
                                <button class="btn btn-primary" type="button" onclick='affectPersonnal(<?= $u["tache_id"] ?>, <?= $_SESSION["cin"] ?>)'><i class="fa fa-plus" aria-hidden="true"></i></button>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <?php if ($_SESSION['name'] == $u['nom'] . " " . $u['prenom'] && $_SESSION['auth'] == "membre") : ?>
                        <td>
                            <?php if ($u['etat'] === 'E') : ?>
                                <button class="btn btn-success" onclick="clearTask(<?= $u['tache_id'] ?>, <?= $pr['N_pro'] ?>)"><i class="fa fa-check" aria-hidden="true"></i></button>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>

                    <?php if ($_SESSION['auth'] == "admin") : ?>
                        <td>
                            <?php if ($u['etat'] === 'E') : ?>
                                <button class="btn btn-secondary" onclick="annulerTask(<?= $u['tache_id'] ?>,<?= $res ?>, <?= $pr['N_pro'] ?>)"><i class="fa fa-times" aria-hidden="true"></i></button>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($u['etat'] !== 'E' && $u['etat'] !== 'F') : ?>
                                <button class="btn btn-danger" onclick="deleteTask(<?= $u['tache_id'] ?>, <?= $pr['N_pro'] ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Tâche introuvable</td>
                </tr>
                <?php endif ; ?>

            </tbody>
        </table>
    </div>

</div>
<script>
    function clearTask(num, id_proj) {
        $.ajax({
            type: "POST",
            url: "../api/other/clearTask.php",
            data: {
                idToClear: num
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    alert(response.error);
                } else {
                    responses = jQuery.parseJSON(response);
                    alert(responses.success);
                    $('#listProjet').load(location.href + ' #listProjet');
                }
            }
        });
    }

    function annulerTask(num, res, id_proj) {
        $.ajax({
            type: "POST",
            url: "../api/other/annulerTask.php",
            data: {
                idToClear: num,
                res: res
            },
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    responses = jQuery.parseJSON(response);
                    alert(responses.success);
                    $('#listProjet').load(location.href + ' #listProjet');
                }
            }
        });
    }

    function deleteTask(num, id_proj) {
        $.ajax({
            type: "POST",
            url: "../api/delete/deleteTask.php",
            data: {
                idToDelete: num,
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    alert(response.error);
                } else {
                    responses = jQuery.parseJSON(response);
                    alert(responses.success);
                    $('#listProjet').load(location.href + ' #listProjet');
                }
            }
        });
    }

    function seeTask(idList) {
        $('#' + idList).toggleClass('d-none');
    }

    function affectPersonnal(num, cin) {
        console.log(cin)
        $.ajax({
            type: "POST",
            url: "api/update/taskPersonnal.php",
            data: {
                idToClear: num,
                cin: cin
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    alert(response.error);
                    return;
                } else {
                    responses = jQuery.parseJSON(response);
                    $('#listProjet').load(location.href + ' #listProjet');
                    $('#selectPersonnel').val("");
                    return;
                }
            }
        });
    }

    function addTask(id_proj) {
        console.log(id_proj);

        $('#btAddTask').on('click', function() {
            nom_tache = $('#nom_tache').val();
            duree = $('#dureeTask').val();
            unity = $('#uniteDeTemps').val();
            console.log(unity)
            full = unity == "mois" ? duree * 30 : duree;

            $('#closeModal').click();
            $('#nom_tache').val("");
            $.ajax({
                type: "POST",
                url: "../api/create/nouveauTache.php",
                data: {
                    nom_tache: nom_tache,
                    duree: full,
                    id: id_proj
                },
                success: function(response) {
                    console.log(response);
                    id_proj = null;
                    if (response.error) {
                        alert(response.error);
                    } else {
                        responses = jQuery.parseJSON(response);
                        alert(responses.success);
                        duree = $('#dureeTask').val("");
                        unity = $('#uniteDeTemps').val("");
                        $('#listProjet').load(location.href + ' #listProjet');
                        $('#selectPersonnel').val("");
                    }
                }
            })
        })
    }
</script>