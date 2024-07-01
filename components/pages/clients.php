<div>
    <!-- Modal trigger button -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade " id="modalcli" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body">
                    <label>CIN</label><br>
                    <input type="text" class="form-control" require name="cin"><br>

                    <label>Nom</label><br>
                    <input type="text" required class="form-control" name="nom"><br>

                    <label>Prenom</label><br>
                    <input type="text" required class="form-control" name="prenom"><br>

                    <label>N° téléphone</label><br>
                    <input type="text" required class="form-control" name="telephone"><br>


                    <label>Mail</label><br>
                    <input type="mail" required class="form-control" name="email"><br>

                    <!-- <label for="">Photos</label> -->
                    <input type="file" name="photos">
                    <!-- <div class=img> -->
                    <br>
                    <img src="" name="pdp" id="pdp" alt="" style="width:100%">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
        </div>
    </div>
</div>


<div class="page-wrapper">
    <div class="bg-light text-dark d-flex align-items-center justify-content-between">
        <div>
            <h2 style="text-align:center;" class="p-3">Information sur les clients</h2>
        </div>
        <div class="text-right upgrade-btn m-3">
            <a type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalcli" class="btn btn-info text-white" data-toggle="modal" onclick="resetForm()"><i class="fa fa-user-plus p-2"></i>Nouveau clients</a>
        </div>
    </div>
    <div class="container-fluid d-flex flex-column justify-content-between">
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table id="listPersonnel" class="table v-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0"></th>
                                    <th class="border-top-0">CIN</th>
                                    <th class="border-top-0">Nom et prénom </th>
                                    <th class="border-top-0">N° téléphone</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Action</th>
                                    <th class="border-top-0">Actions</th>

                                </tr>
                            </thead>
                            <tbody id="rows">
                                <?php //foreach ($query as $data) : 
                                ?>
                                <tr>
                                    <td style="padding-top:10px; padding-bottom:10px">
                                    </td>
                                    <td style="padding-top:10px; padding-bottom:10px">
                                    </td>
                                    <td style="padding-top:10px; padding-bottom:10px">
                                    </td>
                                    <td style="padding-top:10px; padding-bottom:10px">
                                    </td>
                                    <td style="padding-top:10px; padding-bottom:10px">
                                    </td>
                                    <td style="padding-top:10px; padding-bottom:10px">
                                    </td>
                                    <td style="padding-top:10px; padding-bottom:10px">
                                    </td>
                                </tr>
                                <?php //endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var usersModal = document.getElementById('modalcli');

    usersModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>
</div>