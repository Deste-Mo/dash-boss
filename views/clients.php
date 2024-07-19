<?php
    require "api/db.php";
    if (!isset($_SESSION["auth"]) && empty($_SESSION["auth"])) {
        header("location: /signup");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des clients</title>
    <?php require '../components/forall/head.php' ?>

<body style="height: 100vh; overflow-y:hidden;">
    <div class="d-flex hero-dash">
        <?php require '../components/forall/header.php' ?>
        <div class="bg-light w-100">
            <div id="homepage" style="height: 90vh; overflow:auto; position:relative;">
                <?php require '../components/forall/pin.php'?>
                <?php require '../components/pages/clients.php' ?>
            </div>
        </div>
    </div>
    <?php require '../components/forall/footer.php' ?>