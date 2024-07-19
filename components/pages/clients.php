<style>
    .modal-content {
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

    .btn-secondary {
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: scale(1.05);
    }

    /* primary: {
        // 100: "#1877f2",
        100: "#8ec7da",
        80: "#8ec7dacc", // 80% opacity
        60: "#8ec7da99", // 60% opacity
        40: "#8ec7da66", // 40% opacity
        20: "#8ec7da33", // 20% opacity
        10: "#8ec7da1a", // 10% opacity
      }, */

    .bg-dark{
        background-color: "#1877f2";
    }
</style>

<div>
    <!-- Modal trigger button -->

    <!-- Modal Body -->
    <div class="modal fade" id="modalcli" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
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
                    <input type="text" class="form-control" required name="cin"><br>

                    <label>Nom</label><br>
                    <input type="text" required class="form-control" name="nom"><br>

                    <label>Prenom</label><br>
                    <input type="text" required class="form-control" name="prenom"><br>

                    <label>N° téléphone</label><br>
                    <input type="text" required class="form-control" name="telephone"><br>

                    <label>Mail</label><br>
                    <input type="mail" required class="form-control" name="email"><br>

                    <input type="file" name="photos">
                    <br>
                    <img src="" name="pdp" id="pdp" alt="" style="width:100%">
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
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


<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Listes des clients</a>
        </li>
    </ol>

    <div class="row">
        <table class="table">
            <!-- A voir -->
        </table>
    </div>
</div>