<!DOCTYPE html>
<html lang="en">
<?php
require_once "../api/db.php";
session_start();

if (!isset($_SESSION["auth"]) || empty($_SESSION["auth"])) {
    header("location: ../index.php");
}

$query = $conn->query("SELECT * FROM personnel");

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <?php require '../components/forall/head.php' ?>

<body style="height: 100vh">
    <div class="d-flex" style="height: 100%">
        <?php require '../components/forall/header.php' ?>
        <div class="bg-light w-100">
            <div id="homepage">
                <?php require '../components/forall/pin.php' ?>
                <?php require '../components/pages/members.php' ?>
            </div>
        </div>
    </div>
    <?php require '../components/forall/footer.php' ?>