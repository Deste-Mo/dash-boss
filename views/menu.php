<?php
    require_once "../api/db.php";
    if(!isset($_SESSION["auth"]) || empty($_SESSION["auth"])){
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $query = $conn->query("SELECT COUNT(*) as nombre FROM personnel");
    $nbrMembres = $query->fetch();
    $query2 = $conn->query("SELECT COUNT(*) as nombre FROM tache");
    $nbrTaches = $query2->fetch();
    $query3 = $conn->query("SELECT COUNT(*) as nombre FROM tache WHERE cin != ''");
    $nbrTacheOccuper = $query3->fetch();
    $query4 = $conn->query("SELECT COUNT(*) as nombre FROM tache WHERE etat = 'L'");
    $nbrTacheLibre = $query4->fetch();
    $query5 = $conn->query("SELECT COUNT(*) as nombre FROM tache WHERE etat = 'E'");
    $nbrTacheEnCours = $query5->fetch();
    $query6 = $conn->query("SELECT COUNT(*) as nombre FROM tache WHERE etat = 'F'");
    $nbrTacheFin = $query6->fetch();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <?php require '../components/forall/head.php' ?>

<body style="height: 100vh; overflow-y:hidden;">
    <div class="d-flex" style="height: 100%">
        <?php require '../components/forall/header.php' ?>
        <div class="bg-light w-100">
            <div id="homepage" style="height: 90vh; overflow:auto; position:relative;">
                <?php require '../components/forall/pin.php'?>
                <?php require '../components/pages/home.php' ?>
            </div>
        </div>
    </div>
    <?php require '../components/forall/footer.php' ?>