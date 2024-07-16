<div class="bg-dark" style="width:100%; position:sticky; top:0; z-index: 1000;">
    <div class="card cards bg-dark">
        <div class="info">
            <img src="../assets/images/users/d2.jpg" alt="" width="15%">
            <div class="nom" style="display: flex; align-items: center; gap: 0.5em; margin-left: 1em;">
                <span class="text-light"><?= $_SESSION["name"] ?></span>
                <a href="../api/app/http/_auth.php?deconnecter" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</div>