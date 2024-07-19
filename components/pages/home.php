<!-- components/pages/home.php
<style>
    .cardss {
        background: #fff;
        margin: 1em;
        padding: 1em;
        border-radius: 5px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1em;
        box-shadow: 2px 2px 10px #000; 
    }
    .card.carte {
        background: #f9f9f9;
        padding: 1em;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 5px;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card.carte:hover {
        transform: translateY(-5px);
        box-shadow: 4px 4px 15px #000;
    }
    .text-content {
        display: flex;
        flex-direction: column;
    }
    .icon {
        font-size: 2em;
        color: #007BFF;
    }
    body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
        #taskChart {
            max-width: 600px;
            margin: 0 auto;
        }
</style>
<div class="cardss">
    <div class="card carte">
        <div class="text-content">
            <span>Membres</span>
            <span><?= $nbrMembres["nombre"] ?></span>
        </div>
        <i class="fa fa-users icon"></i>
    </div>
    <div class="card carte">
        <div class="text-content">
            <span>Tache Libre</span>
            <span><?= $nbrTacheLibre["nombre"] ?></span>
        </div>
        <i class="fa fa-hourglass-start icon"></i>
    </div>
    <div class="card carte">
        <div class="text-content">
            <span>Tache En cours</span>
            <span><?= $nbrTacheEnCours["nombre"] ?></span>
        </div>
        <i class="fa fa-spinner icon"></i>
    </div>
    <div class="card carte">
        <div class="text-content">
            <span>Tache Fin</span>
            <span><?= $nbrTacheFin["nombre"] ?></span>
        </div>
        <i class="fa fa-check icon"></i>
    </div>
</div>
    <div class="container">
        <h1>Task Statistics</h1>
        <canvas id="taskChart"></canvas>
        <script src="js/Chart.js"></script>
        <script>
            const ctx = document.getElementById('taskChart').getContext('2d');
            const taskChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        label: 'Statistique des Taches',
                        data: [
                            <?php echo $nbrTacheFin["nombre"]; ?>,
                            <?php echo $nbrTacheLibre["nombre"]; ?>,
                            <?php echo $nbrTacheEnCours["nombre"] ; ?>
                        ],
                        backgroundColor: ['#4caf50', '#ffeb3b', '#2196f3'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Statistique des Taches'
                        }
                    }
                }
            });
        </script>
    </div>
 -->



<div class="container-fluid">
    <!--======================================================  Content  ====================================================-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
    
    </ol>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-barcode" aria-hidden="true"></i>
                </div>
                <div class="mr-5"><h5>PRODUITS</h5></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="messages.html">
                <span class="float-left">Voire Plus</span>
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
                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                </div>
                <div class="mr-5">
                    <h5>Categories</h5>
                </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="reviews.html">
                <span class="float-left">Voire Plus</span>
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
                    <i class="fa fa-fw fa-calendar-check-o"></i>
                </div>
                <div class="mr-5"><h5>Gestion des caisses</h5></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="bookings.html">
                    <span class="float-left">Voire Plus</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-danger o-hidden h-100">
                <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                </div>
                <div class="mr-5"><h5>Stock et suivi</h5></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="bookmarks.html">
                    <span class="float-left">Voire Plus</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>
    <!--================================================= FIN DE L'AJOUT ===================================================-->
</div>
