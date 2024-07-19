<?php
    if (!isset($_SESSION["auth"]) && empty($_SESSION["auth"])) {
        header("location: /signup");
    }

    $query = $conn->query("SELECT COUNT(*) as nombre FROM personnel");
    $nbrMembres = $query->fetch();
    $query4 = $conn->query("SELECT COUNT(*) as nombre FROM tache WHERE etat = 'N'");
    $nbrTacheLibre = $query4->fetch();
    $query5 = $conn->query("SELECT COUNT(*) as nombre FROM tache WHERE etat = 'E'");
    $nbrTacheEnCours = $query5->fetch();
    $query6 = $conn->query("SELECT COUNT(*) as nombre FROM tache WHERE etat = 'F'");
    $nbrTacheFin = $query6->fetch();

    require 'api/read/listesComment.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php require 'components/forall/head.php' ;?>

<!-- <body style="height: 100vh; overflow-y:hidden;"> -->
<body>

    <!-- <div class="d-flex" style="height: 100%"> -->
    <div class="d-flex hero-dash">
        <?php require 'components/forall/header.php' ;?>
        <div class="bg-light w-100">
            <div id="homepage" style="height: 90vh; overflow:hidden; position:relative;">
                <?php require 'components/forall/pin.php'; ?>
                <?php include 'components/pages/home.php'; ?>
            </div>
        </div>
    </div>
    <?php include 'components/forall/footer.php' ?>