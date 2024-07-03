<div class="page-wrapper px-3 bg-dark">
    <div class="bg-light text-dark d-flex align-items-center justify-content-between">
        <div>
            <h2 style="text-align:center;" class="p-3">Les Projets</h2>
        </div>
    </div>


    <!-- Modal pour affecter les personnel a des taches-->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select class="form-control" name="selectPersonnel" id="selectPersonnel">
                        <?php
                        $i = 1;
                        $users = getUser($conn);
                        foreach ($users as $p):
                            ?>
                            <option value="<?= $p['cin'] ?>">
                                <?= $p['nom'] . " " . $p['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBt" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" id="affect" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId")
        );
    </script> -->

    <!-- Modal pour ajouter des taches a des projets-->
    <div class="modal fade " id="modaltache" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <form method="POST" class="modal-content" action="../api/create/nouveauTache.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-between">
                    <div class="mx-3">
                        <label class="m-2">Nom du Projet</label>
                        <input type="text" required class="form-control" id="nom_tache" name="nom_tache">
                    </div>
                    <div>
                        <label class="m-2 d-block">Duree du Projet</label>
                        <input type="text" name="dureeTask" id="dureeTask" class="form-control w-25 d-inline">
                        <select name="uniteDeTemps" id="uniteDeTemps" class="form-control w-50 d-inline">
                            <option value="jours">Jours</option>
                            <option value="mois">Mois</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" id="btAddTask" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal trigger button -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalProj" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-between">
                    <div class="mx-4">
                        <label class="m-2">Nom du Projet</label>
                        <input type="text" required class="form-control" id="nom_projet" name="nom_projet">
                    </div>
                    <div>
                        <label class="m-2 d-block">Duree du Projet</label>
                        <input type="text" name="dureeProjet" id="dureeProjet" class="form-control w-25 d-inline">
                        <select name="uniteDeTemps" id="uniteDeTemps" class="form-control w-50 d-inline">
                            <option value="jours">Jours</option>
                            <option value="mois">Mois</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeModalProjet" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onclick="ajouterProjet()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal trigger button -->
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalChef" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <select class="form-control p-2" name="selectChef" id="selectChef">
                        <?php
                        $i = 1;
                        $users = getUser($conn);
                        foreach ($users as $p):
                            ?>
                            <option value="<?= $p['cin'] ?>">
                                <?= $p['nom'] . " " . $p['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button id="btCloseChef" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button id="btSaveChef" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Place to the bottom of scripts -->
    <!-- <script>
        const myModalChef = new bootstrap.Modal(
            document.getElementById("modalChef"),
            options,
        );
    </script> -->


    <!-- Optional: Place to the bottom of scripts -->
    <!-- <script>
        const myModalProj = new bootstrap.Modal(
            document.getElementById("modalProj"),
            options,
        );
    </script> -->

    <div id="listProjet" class="container-fluid d-flex flex-column justify-content-between">
        <div class="bg-dark d-flex justify-content-between p-3 position-sticky"
            style="text-wrap:nowrap; top:100px;z-index:200;">
            <label for="nom" style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Nom
                Projet</label>
            <label for="nom" style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Chef
                Infos</label>
            <label for="action"
                style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Duree</label>
            <label for="action"
                style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Prevue</label>
            <label for="action"
                style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Progression</label>
            <label for="action"
                style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Chef</label>
            <label for="action"
                style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Annuler</label>
            <label for="action"
                style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">Supprimer</label>
            <label for="action" class="btn btn-secondary"
                style="font-weight: 800;color:white; text-align:center;padding:5px;cursor:pointer"
                data-bs-toggle="modal" data-bs-target="#modalProj">+Projet</label>
        </div>
        <?php $projets = getProjets($conn);
        foreach ($projets as $pr):
            $datep1 = date_create($pr['dateCom']);
            $datep = new DateTime($pr['dateCom']);
            $datep2 = date_create();
            $dureep = intval(explode(" ", $pr['duree'])[0]);
            $diffp = date_diff($datep1, $datep2)->format('%a');
            $respp = $dureep - $diffp;
            $finp = $datep->add(new DateInterval('P' . $dureep . 'D'));
            $perc = getPercent($conn, $pr['N_pro']);
            ?>
            <div class="bg-light d-flex flex-column justify-content-between m-3" style="text-wrap:nowrap;">
                <div class="bg-light d-flex justify-content-between align-items-center m-3" style="text-wrap:nowrap;">
                    <label for="nom"
                        style="font-weight: 800;color:black; text-align:left;padding:5px; width:100px;"><?= $pr['nomP'] ?></label>
                    <label for="nom"
                        style="font-weight: 800;color:black; text-align:left;padding:5px; width:100px;"><?= $pr['nom'] . " " . $pr['prenom'] ?></label>
                    <label for="action"
                        style="font-weight: 800;color:black; text-align:center;padding:5px; width:100px;"><?= $pr['duree'] ?></label>
                    <label for="action"
                        style="font-weight: 800;color:black; text-align:center;padding:5px; width:100px;"><?= $finp->format("d/m/y") ?></label>
                    <label for="action"
                        style="font-weight: 800;color:black; text-align:center;padding:5px; width:100px;"><?= $perc . "%" ?></label>
                    <label for="action" class="d-flex justify-content-end align-items-center"
                        style="font-weight: 800;color:white;padding:5px; width:100px;"
                        data-bs-toggle="modal" data-bs-target="#modalChef">
                        <?php if ($pr['id_chef'] == "" || $pr['id_chef'] == null): ?>
                            <button class="btn btn-primary" onclick="affectChef(<?= $pr['N_pro'] ?>)">
                                <i class="fa fa-user" aria-hidden="true" style="font-size: 12px;"></i>Affecter
                            </button>
                        <?php else: ?>
                            <button class="btn btn-primary" onclick="affectChef(<?= $pr['N_pro'] ?>)">
                                <i class="fa fa-user" aria-hidden="true" style="font-size: 12px;"></i>changer
                            </button>
                        <?php endif; ?>
                    </label>

                    <label for="action" class="d-flex justify-content-end align-items-center"
                        style="font-weight: 800;color:white; text-align:left;padding:5px; width:100px;">
                        <button class="btn btn-secondary" onclick="annulerProjet(<?= $pr['N_pro'] ?>, $resp)">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </label>
                    <label for="action" class="d-flex justify-content-end align-items-center"
                        style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">
                        <button class="btn btn-danger" onclick="deleteProjet(<?= $pr['N_pro'] ?>)">
                            <i class="fa fa-trash" aria-hidden="true" style="font-size: 12px;">
                            </i>
                        </button>
                    </label>
                    <label for="action" class="d-flex justify-content-end align-items-center"
                        style="font-weight: 800;color:white; text-align:center;padding:5px; width:100px;">
                        <button class="btn btn-primary"
                            onclick="seeMessage(this, '<?= $c['comment_id'] ?>', '<?= $c['status'] ?>')"
                            style="background-color:white; color:black;border:none;"><i class="fa fa-chevron-down"></i>
                        </button>
                    </label>
                </div>
                <div id="listTask<?= $pr['N_pro'] ?>"
                    style="max-height: 600px;height:200px; overflow:auto; margin-bottom:40px; z-index:0;">
                    <div class="TaskContainer d-flex justify-content-between">
                        <div class="container-fluid">
                            <div class="page-wrapper">
                                <div class="container-fluid d-flex flex-column justify-content-between">
                                    <div class="row">
                                        <!-- column -->
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="table-responsive" style="max-height: 200px; position: relative">
                                                    <table class="table v-middle">
                                                        <thead style="position:sticky; top:0;">
                                                            <tr>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small"></th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">Nom de
                                                                    la tache</th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">
                                                                    Responsable</th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">Duree
                                                                </th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">Prevue
                                                                </th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">status
                                                                </th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">Affecter
                                                                </th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">Terminer
                                                                </th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">Annuler
                                                                </th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small">
                                                                    Supprimer</th>
                                                                <th class="bg-dark border-top-0 p-1 text-light"
                                                                    style="font-size:small"> <a type="button"
                                                                        class="btn btn-primary btn-lg"
                                                                        data-bs-toggle="modal" data-bs-target="#modaltache"
                                                                        class="btn btn-info text-white" data-toggle="modal"
                                                                        onclick="addTask(<?= $pr['N_pro'] ?>)">+<i
                                                                            class="fa fa-tasks p-1"
                                                                            style="font-size:small"></i></a></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 1;
                                                            $k = $pr['N_pro'];
                                                            $taches = getTacheByProj($conn, $k);
                                                            foreach ($taches as $u):
                                                                $date1 = date_create($u['dateCom']);
                                                                $date = new DateTime($u['dateCom']);
                                                                $date2 = date_create();
                                                                $duree = intval(explode(" ", $u['duree'])[0]);
                                                                $diff = date_diff($date1, $date2)->format('%a');
                                                                $res = $duree - $diff;
                                                                $fin = $date->add(new DateInterval('P' . $duree . 'D'));
                                                                ?>
                                                                <tr>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px;font-size:small">
                                                                        <?= $i ?>
                                                                    </td>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; text-align:left;font-size:small;">
                                                                        <?= $u['tache_nom'] ?>
                                                                    </td>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; text-align:left;font-size:small;">
                                                                        <?= $u['nom'] . " " . $u['prenom'] ?>
                                                                    </td>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; font-weight:800; text-align:left;font-size:small;">
                                                                        <?= $diff . "/" . $u['duree'] ?>
                                                                    </td>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; font-weight:800; text-align:left;font-size:small;">
                                                                        <?= $fin->format('d/m/y') ?>
                                                                    </td>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; text-align:left;font-size:small;">
                                                                        <?php if ($u['etat'] === 'E') { ?>
                                                                            <div class="spinner-border text-secondary"
                                                                                role="status">
                                                                                <span class="sr-only">Loading...</span>
                                                                            </div>
                                                                        <?php } else if ($u['etat'] === 'F') { ?>
                                                                                Fini
                                                                        <?php } else { ?>
                                                                                Libre
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; text-align:left;font-size:small;">
                                                                        <?php if ($u['etat'] !== 'E' && $u['etat'] !== 'F'): ?>
                                                                            <button class="btn btn-primary" type="button"
                                                                                data-bs-toggle="modal" data-bs-target="#modalId"
                                                                                onclick="affectPersonnal(<?= $u['tache_id'] ?>, <?= $pr['N_pro'] ?>)"><i
                                                                                    class="fa fa-plus"
                                                                                    aria-hidden="true"></i></button>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; text-align:left;font-size:small;">
                                                                        <?php if ($u['etat'] === 'E'): ?>
                                                                            <button class="btn btn-success"
                                                                                onclick="clearTask(<?= $u['tache_id'] ?>, <?= $pr['N_pro'] ?>)"><i
                                                                                    class="fa fa-check"
                                                                                    aria-hidden="true"></i></button>
                                                                        <?php endif; ?>
                                                                    </td>

                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; text-align:left;font-size:small;">
                                                                        <?php if ($u['etat'] === 'E'): ?>
                                                                            <button class="btn btn-secondary"
                                                                                onclick="annulerTask(<?= $u['tache_id'] ?>,<?= $res ?>, <?= $pr['N_pro'] ?>)"><i
                                                                                    class="fa fa-times"
                                                                                    aria-hidden="true"></i></button>
                                                                        <?php endif; ?>
                                                                    </td>

                                                                    <td
                                                                        style="padding-top:10px; padding-bottom:10px; text-align:left;font-size:small;">
                                                                        <?php if ($u['etat'] !== 'E' && $u['etat'] !== 'F'): ?>
                                                                            <button class="btn btn-danger"
                                                                                onclick="deleteTask(<?= $u['tache_id'] ?>, <?= $pr['N_pro'] ?>)"><i
                                                                                    class="fa fa-trash"
                                                                                    aria-hidden="true"></i></button>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php $i++;
                                                            endforeach;
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        var usersModal = document.getElementById('modaltache');

        usersModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });
        /*
        
        */
        var usersModal = document.getElementById('modaltache');

        usersModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });

        function clearTask(num, id_proj) {
            $.ajax({
                type: "POST",
                url: "../api/other/clearTask.php",
                data: {
                    idToClear: num
                },
                success: function (response) {
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
                success: function (response) {
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
                success: function (response) {
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

        function affectPersonnal(num, id_proj) {
            $('#affect').on('click', function () {
                $("#closeBt").click();
                cinTo = $('#selectPersonnel').val();
                $.ajax({
                    type: "POST",
                    url: "../api/update/taskPersonnal.php",
                    data: {
                        idToClear: num,
                        cin: cinTo
                    },
                    success: function (response) {
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
            })
        }

        function addTask(id_proj) {
            console.log(id_proj);

            $('#btAddTask').on('click', function () {
                nom_tache = $('#nom_tache').val();
                duree = $('#dureeTask').val();
                unity = $('#uniteDeTemps').val();
                full = unity == "Mois" ? duree * 30 : duree;

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
                    success: function (response) {
                        console.log(response);
                        id_proj = null;
                        if (response.error) {
                            alert(response.error);
                        } else {
                            responses = jQuery.parseJSON(response);
                            alert(responses.success);
                            $('#listProjet').load(location.href + ' #listProjet');
                            $('#selectPersonnel').val("");
                        }
                    }
                })
            })
        }/*
*/

        function annulerProjet(num, res) {
            $.ajax({
                type: "POST",
                url: "../api/other/annulerTask.php",
                data: {
                    idToClear: num,
                    res: res
                },
                success: function (response) {
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

        function deleteProjet(num) {
            $.ajax({
                type: "POST",
                url: "../api/delete/deleteProjet.php",
                data: {
                    idToDelete: num,
                },
                success: function (response) {
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

        function affectChef(num) {
            $('#btSaveChef').on('click', function () {
                $("#btCloseChef").click();
                cinTo = $('#selectChef').val();
                if (cinTo == "") {
                    alert("Veuillez choisir un chef!")
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "../api/update/setChefProjet.php",
                    data: {
                        id: num,
                        cin: cinTo
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.error) {
                            alert(response.error);
                            return;
                        } else {
                            responses = jQuery.parseJSON(response);
                            $('#listProjet').load(location.href + ' #listProjet');
                            $('#selectChef').val("");
                            return;
                        }
                    }
                });
            })
        }

        function ajouterProjet() {
            nom_projet = $('#nom_projet').val();
            duree = $('#dureeProjet').val();
            unity = $('#uniteDeTemps').val();
            full = unity == 'mois' ? duree * 30 : duree;

            $('#closeModalProjet').click();
            $('#nom_projet').val("");
            $('#dureeProjet').val("");
            $('#uniteDeTemps').val("");
            $.ajax({
                type: "POST",
                url: "../api/create/newProjet.php",
                data: {
                    nom_projet: nom_projet,
                    duree: full
                },
                success: function (response) {
                    console.log(response);
                    if (response.error) {
                        alert(response.error);
                    } else {
                        responses = jQuery.parseJSON(response);
                        alert(responses.success);
                        // $('#listProjet').load(location.href + ' #listProjet');
                    }
                }
            })
        }
    </script>
</div>