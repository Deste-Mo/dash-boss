<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">
        <img src="assets/images/logo/logo.png" data-retina="true" alt="Logo" height="36">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

            <!-- Search Form -->
            <li class="nav-item">
                <form method="POST" class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Rechercher ..." name="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </li>

            <!-- Alerts Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="alertsDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Alerts
                        <span class="badge badge-pill badge-warning">6 News</span>
                    </span>
                    <span class="indicator text-warning d-none d-lg-block">
                        <i class="fa fa-fw fa-circle"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Alerts:</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-success">
                            <strong>
                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">9:00 AM</span>
                        <div class="dropdown-message small">Il s'agit d'un message de réponse de serveur automatisé. Tous les systèmes sont en ligne.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-danger">
                            <strong>
                                <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">9:45 AM</span>
                        <div class="dropdown-message small">Il s'agit d'un message de réponse de serveur automatisé. Tous les systèmes sont en ligne.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <span class="text-success">
                            <strong>
                                <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                        </span>
                        <span class="small float-right text-muted">15:21 AM</span>
                        <div class="dropdown-message small">Il s'agit d'un message de réponse de serveur automatisé. Tous les systèmes sont en ligne.</div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">Voir toutes les alertes</a>
                </div>
            </li>

            <!-- Logout -->
            <!-- User Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- Display user image and name -->
                    <img src="assets/images/users/d2.jpg" alt="" width="20px" class="mb-2">
                    <span class="text-light"><?= $_SESSION["name"] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i><strong style="margin-left: 20px;">Mon Compte</strong>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-sliders" aria-hidden="true"></i><strong style="margin-left: 20px;">Paramètres</strong>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-line-chart fa-lg" aria-hidden="true"></i><strong style="margin-left: 20px;">Statistiques</strong>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="api/app/http/_auth.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i><strong style="margin-left: 20px;">Déconnexion</strong>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
