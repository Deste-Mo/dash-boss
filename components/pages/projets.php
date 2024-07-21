<div class="container-fluid">
    <!--======================================================  Content  ====================================================-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-right">
            <a href="#">Listes des projets</a>
            <?php if ($_SESSION['auth'] == "admin") : ?>
                <a href="#" class="text-right" style="margin-left:100px" for="action" data-bs-toggle="modal" data-bs-target="#modalProj">
                    <span>+</span> Nouveau projet
                </a>
            <?php endif; ?>
        </li>
    </ol>
    <div class="table-responsive">
        <table class="table table-hover ">
            <thead>
                <tr class="table-primary">
                    <th>Projets </th>
                    <th>Chef info</th>
                    <th>Durée</th>
                    <th>Fin</th>
                    <th>Progression</th>
                    <?php if ($_SESSION['auth'] == "admin") : ?>
                        <th>Action1</th>
                        <th>Action2</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($projets)): ?>
                <?php
                    foreach ($projets as $pr) :
                        $datep1 = date_create($pr['dateCom']);
                        $datep = new DateTime($pr['dateCom']);
                        $datep2 = date_create();
                        $dureep = intval(explode(" ", $pr['duree'])[0]);
                        $diffp = date_diff($datep1, $datep2)->format('%a');
                        $respp = $dureep - $diffp;
                        $finp = $datep->add(new DateInterval('P' . $dureep . 'D'));
                        $perc = getPercent($conn, $pr['N_pro']);
                    ?>
                <tr>
                    <td><?= $pr['nomP'] ?></td>
                    <td><?= $pr['nom'] . " " . $pr['prenom'] ?></td>
                    <td><?= $diffp . "/" . $pr['duree'] . " jours" ?></td>
                    <td><?= $finp->format("d/m/y") ?></td>
                    <td class="text-right"><?= $perc . "%" ?></td>
                    <?php if ($_SESSION['auth'] == "admin") : ?>
                    <td for="action" data-bs-toggle="modal" data-bs-target="#affection">
                        <?php if ($pr['id_chef'] == "" || $pr['id_chef'] == null) : ?>
                            <a href="#" onclick="affectChef(<?= $pr['N_pro'] ?>)">
                                <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>Affecter
                            </a>
                        <?php else : ?>
                            <a href="#" onclick="affectChef(<?= $pr['N_pro'] ?>)" >
                                <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>Edité
                            </a>
                        <?php endif; ?>
                    </td>
                    <td for="action" class="text-right">
                        <a href="#" onclick="deleteProjet(<?= $pr['N_pro'] ?>)">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Aucune projet trouvée</td>
                </tr>
                <?php endif ; ?>

            </tbody>
        </table>
    </div>

    <!-- Modal Nouveau Projet  -->
    <div class="modal fade" id="modalProj" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Nouveau Projet
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
                        <select name="uniteDeTempsP" id="uniteDeTempsP" class="form-select w-50 d-inline">
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

    <!-- Affection d'un personnel ----chef de projet---- -->
    <div class="modal fade" id="affection" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Chef de Projet
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <select class="form-select p-2" name="selectChef" id="selectChef">
                        <?php
                        $i = 1;
                        $users = getUser($conn);
                        foreach ($users as $p) :
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
</div>

<script>
    function annulerProjet(num, res) {
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

    function deleteProjet(num) {
        $.ajax({
            type: "POST",
            url: "../api/delete/deleteProjet.php",
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

    function affectChef(num) {
        $('#btSaveChef').on('click', function() {
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
                success: function(response) {
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
        unity = $('#uniteDeTempsP').val();
        console.log(unity);
        full = unity == 'mois' ? duree * 30 : duree;

        $('#closeModalProjet').click();
        $('#nom_projet').val("");
        $('#dureeProjet').val("");
        $('#uniteDeTempsP').val("");
        $.ajax({
            type: "POST",
            url: "../api/create/newProjet.php",
            data: {
                nom_projet: nom_projet,
                duree: full
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    alert(response.error);
                } else {
                    responses = jQuery.parseJSON(response);
                    alert(responses.success);
                    <?php header("Location: /projets?projet=active"); ?>
                    // $('#listProjet').load(location.href + ' #listProjet');
                }
            }
        })
    }
</script>