
<div class="container-fluid">
    <!--======================================================  Content  ====================================================-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Listes des employés</a>
            <?php if ($_SESSION['auth'] == "admin") : ?>
                <a href="#" class="text-right" style="margin-left:100px" data-toggle="modal" onclick="resetForm()" data-bs-toggle="modal" data-bs-target="#modalcli">
                    <span class="fa fa-user-plus"></span> Nouveau personnel
                </a>
            <?php endif; ?>
        </li>
    </ol>

    <?php if (isset($_GET["message"])): ?>
        <?= "<script> setTimeout(() => {document.querySelector('.alert').remove(); document.location.href = '../views/members.php?membre=active';}, 1500);</script>"; ?>
        <div class="alert alert-danger">Le CIN ou le numero telephone ou l'email existe deja</div>
    <?php endif ?>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>Photo</th>
                    <th>CIN</th>
                    <th>Nom </th>
                    <th>Contact</th>
                    <th>Qualification</th>
                    <th>Email</th>
                    <th></th>
                    <?php if ($_SESSION['auth'] == "admin"): ?>
                        <th></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $data): ?>
                    <tr>
                        <td>
                            <div>
                                <img src="../assets/uploads/<?= $data["photo"] ?>" class="img-fluid" alt="PDP" width="40px" height="40px">
                            </div>
                        </td>
                        <td><?= $data["cin"] ?></td>
                        <td><?= $data["prenom"] ?></td>
                        <td><?= $data["telephone"] ?></td>
                        <td><?= $data["qualif"] ?></td>
                        <td><?= $data["email"] ?></td>

                        <?php if ($_SESSION["name"] == $data["nom"]." ".$data["prenom"] || $_SESSION["name"] == "admin") : ?>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalcli" onclick="updateForm(<?= $data['cin'] ?>)">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <?php else : ?>
                        <td></td>
                        <?php endif; ?>
                        <?php if ($_SESSION['auth'] == "admin"): ?>
                        <td>
                            <a href="api/delete/deleteMembre.php?cin=<?= $data["cin"] ?>" class="text-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Formulaire inscription et modification personnel  -->
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
                    <span class="erreur"></span>

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
                    <select required class="form-control" name="qualif" id="qualif">
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