<?php
    if (!isset($_SESSION["auth"]) && empty($_SESSION["auth"])) {
        header("location: /signup");
    }
    include 'api/read/listesTaches.php';
    include 'api/read/listesProjets.php';

    require 'api/read/listesComment.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets en cours</title>
    <?php require 'components/forall/head.php' ;?>

<!-- <body style="height: 100vh; overflow-y:hidden;"> -->
<body>

    <!-- <div class="d-flex" style="height: 100%"> -->
    <div class="d-flex hero-dash">
        <?php require 'components/forall/header.php' ;?>
        <div class="bg-light w-100">
            <div id="homepage" style="height: 90vh; overflow:hidden; position:relative;">
                <?php require 'components/forall/pin.php'; ?>
                <?php require './components/pages/projets.php' ?>
            </div>
        </div>
    </div>
    <?php require './components/forall/footer.php' ?>