<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark" style="max-width: 30%; height: 100%; z-index: 500;">
    <a href="/" class="d-flex align-items-center justify-content-center text-white text-decoration-none">
        <img src="assets/images/logo/logo.png" alt="" style="width:200px;">
    </a>
    <ul class="nav nav-pills flex mb-auto" style="width: 100%;">
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/home?home=active"
                class="nav-link text-white <?php if (isset($_GET["home"])) echo 'active'; ?>" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-home p-3"></i>
                </svg>
                Home
            </a>
        </li>
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/members?membre=active"
                class="nav-link text-white <?php if (isset($_GET["membre"])) echo 'active'; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-users p-3"></i>
                </svg>
                Membres
            </a>
        </li>
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/projets?projet=active"
                class="nav-link text-white <?php if (isset($_GET["projet"])) echo 'active'; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-spinner p-3"></i>
                </svg>
                Projets
            </a>
        </li>
        <li class="nav-item mb-3"  style="width: 100%;">
            <a href="/notification?notification=active"
                class="nav-link text-white <?php if (isset($_GET["notification"])) echo 'active'; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-bell p-3"></i>
                </svg>
                Notification<span class="bg-danger p-2 text-light text-center rounded-5 m-2"><?= countComment($conn)['count'] ?></span>
            </a>
        </li>
    </ul>
</div>
