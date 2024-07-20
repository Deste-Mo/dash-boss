<div class="left" style="margin-top: 4%">
    <ul class="nav nav-pills flex mb-auto" style="width: 100%;">
        <li class="menu-heading">MediaBOSS</li>

        <li id="menu-item4">
            <a href="/home?home=active" 
                class="nav-link text-white <?php if (isset($_GET["home"])) echo 'active'; ?>" aria-current="page">
                <i class="fa fa-home fa-lg"></i> 
                Tableau de bord
            </a>
        </li>
        <?php if ($_SESSION['auth'] == "admin") : ?>
        <li id="menu-item3">
            <a href="/clients?client=active"
                class="nav-link text-white <?php if (isset($_GET["client"])) echo 'active'; ?>">
                <i class="fa fa-users"></i>
                Clients
            </a>
        </li>
        <?php endif; ?>
    
        <li id="menu-item1">
            <a href="#" class="toggle-custom nav-link text-white <?php if (isset($_GET["projet"])) echo 'active'; ?>" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false">
                <span class="glyphicon glyphicon-plus" aria-hidden="true">
                    <i class="fa fa-spinner fa-lg"></i> Projets
                </span>
            </a>
            <ul class="nav collapse <?php if (isset($_GET["projet"])) echo 'show'; ?>" id="submenu1" role="menu" aria-labelledby="btn-1">
                <li>
                    <?php 
                        if (isset($_GET["projet"])): 
                            try {
                                $stmt = $conn->query('SELECT * FROM projet');
                                $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            } catch (PDOException $e) {
                                echo 'Query failed: ' . $e->getMessage();
                            }
                        ?>           

                    <a href="#" class="toggle-custom nav-link text-white <?php if (isset($_GET["membre"])) echo 'active'; ?>" id="btn-1" data-toggle="collapse" data-target="#submenu_projet" aria-expanded="false">
                        <span class="glyphicon glyphicon-plus">
                            <i class="fa fa-list fa-lg" id="icon-toggle"></i> Liste des projets
                        </span>
                    </a>


                    <!-- HTML Code -->
                    <ul class="nav collapse <?php if (isset($_GET["projet"])) echo 'show'; ?>" id="submenu_projet" role="menu" aria-labelledby="btn-1">
                        <?php foreach ($projects as $project) : ?>
                            <li>
                                <a href="#">
                                    <i class="fa fa-list fa-lg" id="icon-toggle"></i> <?php echo htmlspecialchars($project['nomP']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
</ul>
                    <?php else: ?>
                    <a href="/projets?projet=active" class="<?php if (isset($_GET["projet"])) echo 'active'; ?>">
                        <i class="fa fa-list" aria-hidden="true"></i> Liste des projets
                    </a>
                    <?php endif; ?>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-plus" aria-hidden="true"></i> Ajouter produit
                    </a>
                </li>
            </ul>
        </li>

        <li id="menu-item3">
            <a href="/notification?notification=active"
                class="nav-link text-white <?php if (isset($_GET["notification"])) echo 'active'; ?>">
                <i class="fa fa-bell"></i> Notification
            </a>
        </li>

        <li class="menu-heading">Paramètres</li>

        <li id="menu-item5">
            <a data-toggle="tab" href="#projects">
                <i class="fa fa-table fa-lg"></i> Stock
            </a>
        </li>

        <li id="menu-item6">
            <a href="#" class="toggle-custom nav-link text-white <?php if (isset($_GET["membre"])) echo 'active'; ?>" id="btn-1" data-toggle="collapse" data-target="#submenu3" aria-expanded="false">
                <span class="glyphicon glyphicon-plus">
                    <i class="fa fa-users fa-lg"></i> Employés
                </span>
            </a>
            <ul class="nav collapse <?php if (isset($_GET["membre"])) echo 'show'; ?>" id="submenu3" role="menu" aria-labelledby="btn-1">
                <li>
                    <a href="/members?membre=active" class="<?php if (isset($_GET["membre"])) echo 'active'; ?>">
                        <i class="fa fa-list" aria-hidden="true"></i> Liste des Employés
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter Employé</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user-tie" aria-hidden="true"></i> Profil ADMIN</a>
                </li>
            </ul>
        </li>
        
        <li id="menu-item3">
            <a data-toggle="tab" href="#analytics">
                <i class="fa fa-line-chart fa-lg"></i> Statistiques
            </a>
        </li>
        <li id="menu-item8">
            <a href="#invoices">
                <i class="fa fa-files-o fa-lg"></i> Caisses
            </a>
        </li>
    </ul>
</div>
