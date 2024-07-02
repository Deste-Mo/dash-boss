<?php
    session_start();
    session_destroy();
    if (!isset($_SESSION["auth"]) || empty($_SESSION["auth"])) {
        header("location: ../../../index.php");
    }
    if(isset($_GET["deconnecter"])){
        header("location: ../../../index.php");
    }