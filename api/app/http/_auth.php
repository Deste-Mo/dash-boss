<?php
    // session_start();
    // require 
    session_destroy();
    if (!isset($_SESSION["auth"]) || empty($_SESSION["auth"])) {
        header("Location: /home");
    }
    if(isset($_GET["deconnecter"])){
        header("Location: /home");
    }