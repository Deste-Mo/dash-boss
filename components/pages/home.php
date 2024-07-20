<!-- components/pages/home.php -->
<div class="container-fluid">
    <!--======================================================  Content  ====================================================-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
    </ol>
    <div class="row">
        <!-- Cartes des statistiques -->
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-info o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>Membres</h5>
                        <span><?= $nbrMembres["nombre"] ?></span>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Voir Plus</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>Commentaires</h5>
                        <span><?= $total_comments ?></span>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Voir Plus</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>Projets</h5>
                        <span><?= $total_projects ?></span>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Voir Plus</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">
                        <h5>Personnel</h5>
                        <span><?= $nbrMembres["nombre"] ?></span>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Voir Plus</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <!-- Fin des cartes des statistiques -->
    </div>
    <!--================================================= FIN DE L'AJOUT ===================================================-->
</div>