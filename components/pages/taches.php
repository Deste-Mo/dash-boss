
<div>
    <!-- Modal trigger button -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
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
                <div class="modal-body">
                    <label>Nom de la tache</label><br>
                    <input type="text" required class="form-control" id="nom_tache" name="nom_tache"><br>
                </div>
                <div class="modal-footer">
                    <button id="closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" onclick="addTask()">Ajouter</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
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

    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId")
        );
    </script>



    <div class="page-wrapper">
        <div class="bg-light text-dark d-flex align-items-center justify-content-between">
            <div>
                <h2 style="text-align:center;" class="p-3">Information sur les Taches</h2>
            </div>
            <div class="text-right upgrade-btn m-3">
                <a type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modaltache"
                    class="btn btn-info text-white" data-toggle="modal" onclick="resetForm()"><i
                        class="fa fa-tasks p-2"></i>Nouvelle Tache</a>
            </div>
        </div>
        <div class="container-fluid d-flex flex-column justify-content-between">
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive" style="max-height: 500px; position: relative">
                            <table id="listTask" class="table v-middle">
                                <thead style="position:sticky; top:0;">
                                    <tr class="bg-light">
                                        <th class="border-top-0 p-3"></th>
                                        <th class="border-top-0 p-3">Nom de la tache</th>
                                        <th class="border-top-0 p-3">status</th>
                                        <th class="border-top-0 p-3">Affecter</th>
                                        <th class="border-top-0 p-3">Terminer</th>
                                        <th class="border-top-0 p-3">Annuler</th>
                                        <th class="border-top-0 p-3">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody id="rows">
                                    <?php
                                    $i = 1;
                                    $taches = getTache($conn);
                                    foreach ($taches as $u):
                                        ?>
                                        <tr id="tr<?= $u['tache_id'] ?>">
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $i ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $u['tache_nom'] ?>

                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $u['etat'] === 'E' ?
                                                    '<div class="spinner-border text-secondary" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>' 
                                                    : 'libre' ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?php if ($u['etat'] !== 'E'): ?>
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modalId"
                                                        onclick="affectPersonnal(<?= $u['tache_id'] ?>)"><i class="fa fa-plus"
                                                            aria-hidden="true"></i></button>
                                                <?php endif; ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?php if ($u['etat'] === 'E'): ?>
                                                    <button class="btn btn-success"
                                                        onclick="clearTask(<?= $u['tache_id'] ?>)"><i class="fa fa-check"
                                                            aria-hidden="true"></i></button>
                                                <?php endif; ?>
                                            </td>

                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?php if ($u['etat'] === 'E'): ?>
                                                    <button class="btn btn-secondary"
                                                        onclick="annulerTask(<?= $u['tache_id'] ?>)"><i class="fa fa-times"
                                                            aria-hidden="true"></i></button>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?php if ($u['etat'] !== 'E'): ?>
                                                    <button class="btn btn-danger"
                                                        onclick="deleteTask(<?= $u['tache_id'] ?>)"><i class="fa fa-trash"
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
        <footer class="footer text-center">
        </footer>
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

        function clearTask(num) {
            $.ajax({
                type: "POST",
                url: "../api/other/clearTask.php",
                data: {
                    idToClear: num,
                },
                success: function (response) {
                    console.log(response);
                    if (response.error) {
                        alert(response.error);
                    } else {
                        responses = jQuery.parseJSON(response);
                        alert(responses.success);
                        $('#listTask').load(location.href + ' #listTask');
                    }
                }
            });
        }

        function annulerTask(num) {
            $.ajax({
                type: "POST",
                url: "../api/other/annulerTask.php",
                data: {
                    idToClear: num,
                },
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        responses = jQuery.parseJSON(response);
                        alert(responses.success);
                        $('#listTask').load(location.href + ' #listTask');
                    }
                }
            });
        }

        function deleteTask(num) {
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
                        $('#listTask').load(location.href + ' #listTask');
                    }
                }
            });
        }

        function affectPersonnal(num) {
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
                            $('#listTask').load(location.href + ' #listTask');
                            $('#selectPersonnel').val("");
                            return;
                        }
                    }
                });
            })
        }

        function addTask() {
            nom_tache = $('#nom_tache').val();

            $('#closeModal').click();
            $('#nom_tache').val("");
            $.ajax({
                type: "POST",
                url: "../api/create/nouveauTache.php",
                data: {
                    nom_tache: nom_tache
                },
                success: function (response) {
                    console.log(response);
                    if (response.error) {
                        alert(response.error);
                    } else {
                        responses = jQuery.parseJSON(response);
                        alert(responses.success);
                        $('#listTask').load(location.href + ' #listTask');
                        $('#selectPersonnel').val("");
                    }
                }
            })
        }
    </script>
</div>