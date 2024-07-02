<!DOCTYPE html>
<html lang="en">
<?php
require_once "../api/db.php";


if (!isset($_SESSION["auth"]) && empty($_SESSION["auth"])) {
    header("location: ../index.php");
}

require '../api/read/listesComment.php';

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
            <div id="homepage" style="height: 90vh; overflow:hidden; position:relative;">
                <?php require '../components/forall/pin.php'?>
                <?php require '../components/pages/notification.php' ?>
            </div>
        </div>
    </div>
    <?php require '../components/forall/footer.php' ?>
