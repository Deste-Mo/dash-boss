<style>
    .modal-content,
    .btnTab {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .form-control {
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn-primary {
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btnTab {
        transition: 0.3s ease-in-out
    }

    .btnTab:hover {
        transform: scale(1.05);
    }

    .btn-secondary {
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: scale(1.05);
    }

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
</style>
<div>
    <div class="modal fade " id="modalcli" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <form class="modal-content" method="post" id="formUsers" enctype="multipart/form-data">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="modalTitleId">
                        Personnel
                    </h5>
                    <button type="button" class="btn-close closeModal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <br>
                    <label>CIN</label>
                    <input type="text" class="form-control" require name="cin" id="cin">
                    <span class="erreur"></span>
                    <input type="hidden" class="" require name="cinHide" id="cinHide">
                    <br>
                    <label>Nom</label>
                    <input type="text" required class="form-control" name="nom" id="nom">
                    <span class="erreur"></span>
                    <br>
                    <label>Prenom</label>
                    <input type="text" required class="form-control" name="prenom" id="prenom">
                    <span class="erreur"></span>
                    <br>
                    <label>N° téléphone</label>
                    <input type="text" required class="form-control" name="telephone" id="telephone">
                    <span class="erreur"></span>
                    <br>
                    <label>Qualification</label>
                    <select required class="form-select" name="qualif" id="qualif">
                        <option value="Developpeur">Developpeur</option>
                        <option value="AdminSys et Reseau">AdminSys et Reseau</option>
                        <option value="Photographe">Photographe</option>
                    </select>
                    <span class="erreur"></span>
                    <br>
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <span class="erreur"></span>
                    <br>
                    <label>lien profile</label>
                    <input type="text" class="form-control" name="lienProfile" id="lienProfile">
                    <span class="erreur"></span>
                    <br>

                    <label>Mail</label>
                    <input type="mail" required class="form-control" name="email" id="email">
                    <span class="erreur"></span>
                    <br>
                    <label>Password</label>
                    <input type="password" required class="form-control" name="password" id="password">
                    <span class="erreur"></span>
                    <br>
                </div>
                <div class="d-flex p-3 justify-content-evenly align-items-center bg-dark text-light">
                    <div>
                        <input type="file" name="photos" id="photos" class="form-control">
                    </div>
                    <button type="button" id="closeModal" class="btn btn-secondary closeModal m-2"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary m-2" id="saveBt"
                        onclick="updateMembers()">Save</button>
                    <button type="submit" name="btnSave m-2" class="btn btn-primary" id="newBt"
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
            <?php if ($_SESSION['auth'] == "admin"): ?>
                <div class="text-right upgrade-btn m-3">
                    <a type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalcli"
                        class="btn btn-info text-white" data-toggle="modal" onclick="resetForm()"><i
                            class="fa fa-user-plus p-2"></i>Nouveau personnel</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="container-fluid d-flex flex-column justify-content-between">
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive" style="position: relative; max-height: 500px;">
                            <?php if (isset($_GET["message"])): ?>
                                <?= "<script> setTimeout(() => {document.querySelector('.alert').remove(); document.location.href = '../views/members.php?membre=active';}, 1500);</script>"; ?>
                                <div class="alert alert-danger">Le CIN ou le numero telephone ou l'email existe deja</div>
                            <?php endif ?>
                            <table id="listPersonnel" class="table v-middle">
                                <thead style="position:sticky; top:0;">
                                    <tr>
                                        <th class="bg-dark border-top-0 p-2 text-light">Photo</th>
                                        <th class="bg-dark border-top-0 p-2 text-light">CIN</th>
                                        <th class="bg-dark border-top-0 p-2 text-light">Nom et prénom </th>
                                        <th class="bg-dark border-top-0 p-2 text-light">N° téléphone</th>
                                        <th class="bg-dark border-top-0 p-2 text-light">Qualification</th>
                                        <th class="bg-dark border-top-0 p-2 text-light">Email</th>
                                        <th class="bg-dark border-top-0 p-2 text-light">Modification</th>
                                        <?php if ($_SESSION['auth'] == "admin"): ?>
                                            <th class="bg-dark border-top-0 p-2 text-light">Suppression</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody id="rows">
                                    <?php foreach ($query as $data): ?>
                                        <tr>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <img src="../assets/uploads/<?= $data["photo"] ?>" alt="" width="40px"
                                                    height="40px">
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $data["cin"] ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $data["nom"] . " " . $data["prenom"] ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $data["telephone"] ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $data["qualif"] ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <?= $data["email"] ?>
                                            </td>
                                            <td style="padding-top:10px; padding-bottom:10px">
                                                <a class="btn btn-success btnTab" data-bs-toggle="modal"
                                                    data-bs-target="#modalcli" onclick="updateForm(<?= $data['cin'] ?>)"><i
                                                        class="fa fa-edit"></i></a>
                                            </td>
                                            <?php if ($_SESSION['auth'] == "admin"): ?>
                                                <td style="padding-top:10px; padding-bottom:10px">
                                                    <a href="../api/delete/deleteMembre.php?cin=<?= $data["cin"] ?>"
                                                        class="btn btn-danger btnTab"><i class="fa fa-trash"></i></a>
                                                </td>
                                            <?php endif; ?>
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
            $('#qualif').val('');
            $('#password').val('');
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
                    $('#qualif').val(member.qualif);
                    $('#description').val(member.description);
                    $('#lienProfile').val(member.lienProfile);
                    $('#password').val(member.password);
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
            qualif = $('#qualif').val();
            description = $('#description').val();
            lienProfile = $('#lienProfile').val();
            password = $('#password').val();
            photo = $('#photos')[0].files[0];

            formData = new FormData();
            formData.append('cin', cin);
            formData.append('cinHide', cinHide);
            formData.append('nom', nom);
            formData.append('prenom', prenom);
            formData.append('email', email);
            formData.append('telephone', telephone);
            formData.append('qualif', qualif);
            formData.append('description', description);
            formData.append('password', password);
            formData.append('lienProfile', lienProfile);

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
                qualif = $('#qualif').val();
                description = $('#description').val();
                lienProfile = $('#lienProfile').val();
                password = $('#password').val();

                formData = new FormData();
                formData.append('cin', cin);
                formData.append('nom', nom);
                formData.append('prenom', prenom);
                formData.append('email', email);
                formData.append('telephone', telephone);
                formData.append('qualif', qualif);
                formData.append('description', description);
                formData.append('lienProfile', lienProfile);
                formData.append('password', password);

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