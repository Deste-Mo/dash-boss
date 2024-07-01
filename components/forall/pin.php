<div class="bg-light w-100">
    <div class="card cards text-bg-dark">
        <div class="info">
            <img src="../assets/images/users/d2.jpg" alt="" width="30%">
            <div class="nom" style="display: flex; align-items: center; gap: 0.5em; margin-left: 1em;">
                <span><?= $_SESSION["auth"] ?></span>
                <a href="../api/app/http/_auth.php?deconnecter" class="btn btn-danger">Deconnecter</a>
            </div>
        </div>
    </div>
</div>