<style>
    .form-control.error {
        border-color: red;
        color: red;
    }

    .erreur {
        color: red;
    }

    #listPersonnel {
        width: 100%;
        text-align: center;
    }

    thead {
        background: #cecece;
        position: sticky;
        top: 0;
    }

    tr:nth-child(even) {
        background: #e7e7e7;
    }

    tr,
    th,
    td {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0.5em 0;
    }
</style>
<div>
    <!-- Modal trigger button -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade " id="modalcli" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <form class="modal-content" method="post" id="formUsers" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>CIN</label><br>
                    <input type="text" class="form-control" require name="cin" id="cin"><br>
                    <span class="erreur"></span><br>
                    <input type="hidden" class="form-control" require name="cinHide" id="cinHide"><br>

                    <label>Nom</label><br>
                    <input type="text" required class="form-control" name="nom" id="nom"><br>
                    <span class="erreur"></span><br>

                    <label>Prenom</label><br>
                    <input type="text" required class="form-control" name="prenom" id="prenom"><br>
                    <span class="erreur"></span><br>

                    <label>N° téléphone</label><br>
                    <input type="text" required class="form-control" name="telephone" id="telephone"><br>
                    <span class="erreur"></span><br>


                    <label>Mail</label><br>
                    <input type="mail" required class="form-control" name="email" id="email"><br>
                    <span class="erreur"></span><br>

                    <input type="file" name="photos" id="photos">
                    <img src="" name="pdp" id="pdp" alt="" style="width:100%">
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" id="saveBt" onclick="updateMembers()">Save</button>
                    <button type="submit" name="btnSave" class="btn btn-primary" id="newBt"
                        onclick="addMembers()">Ajouter</button>
                </div>
            </form>
        </div>
    </div>


    <div class="page-wrapper">
        <div class="bg-light text-dark d-flex align-items-center justify-content-between">
            <div>
                <h2 style="text-align:center;" class="p-3">Information sur les personnels</h2>
            </div>
            <div class="text-right upgrade-btn m-3">
                <a type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalcli"
                    class="btn btn-info text-white" data-toggle="modal" onclick="resetForm()"><i
                        class="fa fa-user-plus p-2"></i>Nouveau persnnel</a>
            </div>
        </div>
        <div class="container-fluid d-flex flex-column justify-content-between">
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive" style="position: relative; max-height: 650px;">
                            <?php if (isset($_GET["message"])): ?>
                                <?= "<script> setTimeout(() => {document.querySelector('.alert').remove(); document.location.href = '../views/members.php?membre=active';}, 1500);</script>"; ?>
                                <div class="alert alert-danger">Le CIN ou le numero telephone ou l'email existe deja</div>
                            <?php endif ?>
                            <table id="listPersonnel" class="table v-middle">
                                <thead style="position:sticky; top:0;">
                                    <tr class="bg-light">
                                        <th class="border-top-0 p-3">Photo</th>
                                        <th class="border-top-0 p-3">CIN</th>
                                        <th class="border-top-0 p-3">Nom et prénom </th>
                                        <th class="border-top-0 p-3">N° téléphone</th>
                                        <th class="border-top-0 p-3">Email</th>
                                        <th class="border-top-0 p-3">Modification</th>
                                        <th class="border-top-0 p-3">Suppression</th>

                                    </tr>
                                </thead>
                                <tbody id="rows">
                                    <?php foreach ($query as $data): ?>
                                        <tr>
                                            <td>
                                                <img src="../assets/uploads/<?= $data["photo"] ?>" alt="" width="40px"
                                                    height="40px">
                                            </td>
                                            <td>
                                                <?= $data["cin"] ?>
                                            </td>
                                            <td>
                                                <?= $data["nom"] . " " . $data["prenom"] ?>
                                            </td>
                                            <td>
                                                <?= $data["telephone"] ?>
                                            </td>
                                            <td>
                                                <?= $data["email"] ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalcli"
                                                    onclick="updateForm(<?= $data['cin'] ?>)">Modiffier</a>
                                            </td>
                                            <td>
                                                <a href="../api/delete/deleteMembre.php?cin=<?= $data["cin"] ?>"
                                                    class="btn btn-danger">Supprimer</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/controls.js"></script>
    <script>
        imageFile = null;

        function resetForm() {
            $('#saveBt').hide();
            $('#newBt').show();
            clear();
        }

        function clear() {
            $('#cin').val('');
            $('#nom').val('');
            $('#prenom').val('');
            $('#email').val('');
            $('#photos').val(null);
            $('#telephone').val('');
        }

        function updateForm(cin) {
            $('#saveBt').show();
            $('#newBt').hide();

            $('#photos').on('change', function () {
                imageFile = this.files[0];
                console.log(imageFile);
            })

            idToUpdate = cin;
            $.post("../api/read/listesPersonnel.php", { idToUpdate: idToUpdate },
                function (data, status) {
                    var member = JSON.parse(data).member;

                    console.log(member);

                    $('#cin').val(member.cin);
                    $('#cinHide').val(member.cin);
                    $('#nom').val(member.nom);
                    $('#prenom').val(member.prenom);
                    $('#email').val(member.email);
                    $('#telephone').val(member.telephone);
                }
            );

        }

        function updateMembers() {
            cin = $('#cin').val();
            cinHide = $('#cinHide').val();
            nom = $('#nom').val();
            prenom = $('#prenom').val();
            email = $('#email').val();
            telephone = $('#telephone').val();
            photo = $('#photos')[0].files[0];

            formData = new FormData();
            formData.append('cin', cin);
            formData.append('cinHide', cinHide);
            formData.append('nom', nom);
            formData.append('prenom', prenom);
            formData.append('email', email);
            formData.append('telephone', telephone);

            if (photo) {
                formData.append('photo', photo);
            }


            $.ajax({
                type: "POST",
                url: "../api/update/updateMember.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    responses = jQuery.parseJSON(response);
                    console.log(responses);
                    if (responses.error) {
                        alert(responses.error);
                    }
                    if (responses.success) {
                        alert(responses.success);
                        $('#listPersonnel').load(location.href + ' #listPersonnel');
                        $('#closeModal').click();
                        clear();

                    }
                    if (responses.uploadsErr) {
                        alert(responses.uploadsErr);
                        $('#listPersonnel').load(location.href + ' #listPersonnel');
                        $('#closeModal').click();
                        clear();
                    }
                }
            })
        }
        function addMembers() {
            $('#formUsers').submit(function (event) {
                event.preventDefault();

                cin = $('#cin').val();
                nom = $('#nom').val();
                prenom = $('#prenom').val();
                email = $('#email').val();
                telephone = $('#telephone').val();
                photo = $('#photos')[0].files[0];

                formData = new FormData();
                formData.append('cin', cin);
                formData.append('nom', nom);
                formData.append('prenom', prenom);
                formData.append('email', email);
                formData.append('telephone', telephone);

                if (photo) {
                    formData.append('photo', photo);
                }


                $.ajax({
                    type: "POST",
                    url: "../api/create/createMembre.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        responses = jQuery.parseJSON(response);
                        console.log(responses);
                        if (responses.error) {
                            alert(responses.error);
                        }
                        if (responses.success) {
                            alert(responses.success);
                            $('#listPersonnel').load(location.href + ' #listPersonnel');
                            $('#closeModal').click();
                            clear();

                        }
                        if (responses.uploadsErr) {
                            alert(responses.uploadsErr);
                            $('#listPersonnel').load(location.href + ' #listPersonnel');
                            $('#closeModal').click();
                            clear();
                        }
                    }
                })
            });
        }

        // var usersModal = document.getElementById('usersModal');

        // usersModal.addEventListener('show.bs.modal', function(event) {
        //     // Button that triggered the modal
        //     let button = event.relatedTarget;
        //     // Extract info from data-bs-* attributes
        //     let recipient = button.getAttribute('data-bs-whatever');

        //     // Use above variables to manipulate the DOM
        // });
    </script>
</div>