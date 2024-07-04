<?php require_once '../api/read/listesComment.php' ?>
<div class=" d-flex flex-column flex-shrink-0 p-3 bg-dark" style="width: 280px; height: 100%;z-index:500;">
    <a href="/" class="d-flex align-items-center justify-content-center text-white text-decoration-none">
        <img src="../assets/images/media-boss-logo.png" alt="" style="width:140px; height:140px;">
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-3">
            <a href="menu.php?home=active"
                class="nav-link text-white <?php if (isset($_GET["home"]))
                    echo $_GET["home"]; ?>" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-home p-3"></i>
                </svg>
                Home
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="members.php?membre=active"
                class="nav-link text-white <?php if (isset($_GET["membre"]))
                    echo $_GET["membre"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-users p-3"></i>
                </svg>
                Membres
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="projets.php?projet=active"
                class="nav-link text-white <?php if (isset($_GET["projet"]))
                    echo $_GET["projet"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-spinner p-3"></i>
                </svg>
                Projets
            </a>
        </li>
        <li class="nav-item mb-3" id="headerDiv">
            <a href="notification.php?notification=active"
                class="nav-link text-white <?php if (isset($_GET["notification"]))
                    echo $_GET["notification"]; ?>">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <i class="fa fa-bell p-3"></i>
                </svg>
                Notification<span
                    class="bg-danger p-2 text-light text-center rounded-5 m-2"><?= countComment($conn)['count'] ?></span>
            </a>
        </li>
    </ul>
</div>