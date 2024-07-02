<?php require_once '../api/read/listesComment.php'?>
<div id="headerDiv" class=" d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <img src="../assets/images/logo-light-icon.png" alt="" class="p-2">
        </svg>
        <span class="fs-4">MediaBoss Dash</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-3">
            <a href="menu.php?home=active" class="nav-link text-white <?php if (isset($_GET["home"])) echo $_GET["home"]; ?>" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-home p-3"></i>
                </svg>
                Home
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="members.php?membre=active" class="nav-link text-white <?php if (isset($_GET["membre"])) echo $_GET["membre"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-users p-3"></i>
                </svg>
                Membres
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="taches.php?tache=active" class="nav-link text-white <?php if (isset($_GET["client"])) echo $_GET["client"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-user p-3"></i>
                </svg>
                Clients
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="taches.php?tache=active" class="nav-link text-white <?php if (isset($_GET["tache"])) echo $_GET["tache"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-tasks p-3"></i>
                </svg>
                Taches
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="taches.php?tache=active" class="nav-link text-white <?php if (isset($_GET["projet"])) echo $_GET["projet"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-spinner p-3"></i>
                </svg>
                Projets
            </a>
        </li>
                <li class="nav-item mb-3">
            <a href="notification.php?notification=active" class="nav-link text-white <?php if (isset($_GET["notification"])) echo $_GET["notification"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-bell p-3"></i>
                </svg>
                Notification<span class="bg-danger p-2 text-light text-center rounded-5 m-2"><?=countComment($conn)['count']?></span>
            </a>
        </li>
    </ul>
</div>