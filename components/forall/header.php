<div class="left" style="margin-top: 4%">
    <ul class="nav nav-pills flex mb-auto" style="width: 100%;">
        <li class="menu-heading">MediaBOSS</li>

        <li id="menu-item4">
            <a data-toggle="tab" href="/home?home=active" 
                class="nav-link text-white <?php if (isset($_GET["home"])) echo 'active'; ?>" aria-current="page">
                <i class="fa fa-home fa-lg"></i> 
                Tableau de bord
            </a>
        </li>
        <li id="menu-item3">
            <a data-toggle="tab" href="/clients?client=active"
                class="nav-link text-white <?php if (isset($_GET["client"])) echo 'active'; ?>">
                <i class="fa fa-users"></i>
                Clients
            </a>
        </li>
    
        <li id="menu-item1" >
            <a href="#" class="toggle-custom" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"><i class="fa fa-home fa-lg"></i>Produits<i id="fa1" class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
            <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1">
                <li>
                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Liste des produits</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></i>Ajouter produit</a>
                </li>
            </ul>
        </li>

        <li id="menu-item2" >
        <a href="#" class="toggle-custom" id="btn-1" data-toggle="collapse" data-target="#submenu2" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"><i class="fa fa-tachometer fa-lg"></i> Categories<i id="fa2" class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
        <ul class="nav collapse" id="submenu2" role="menu" aria-labelledby="btn-1">
            <li>
            <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Liste des categories</a>
            </li>
            <li>
            <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Ajouter categorie</a>
            </li>
        </ul>
        </li>

        <li class="menu-heading">Paramètres</li>

        <li id="menu-item5"><a data-toggle="tab" href="#projects"><i class="fa fa-table fa-lg"></i>Stock</a></li>

        <li id="menu-item6" >
            <a href="#" class="toggle-custom" id="btn-1" data-toggle="collapse" data-target="#submenu3" aria-expanded="false">
                <span class="glyphicon glyphicon-plus" >
                    <i class="fa fa-street-view fa-lg"></i> 
                    Employer<i id="fa3" class="fa fa-arrow-right" aria-hidden="true">

                    </i>
                </span>
            </a>
            <ul class="nav collapse" id="submenu3" role="menu" aria-labelledby="btn-1">
                <li>
                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Liste des Employer</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Ajouter Employer</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Profil ADMIN</a>
                </li>
            
            </ul>
        
        </li>
        
        <li id="menu-item3"><a data-toggle="tab" href="#analytics"><i class="fa fa-line-chart fa-lg"></i> Statistiques</a></li>
        <li id="menu-item8"><a  href="#invoices"><i class="fa fa-files-o fa-lg"></i>Caisses</a></li>
    
    </ul>
</div>