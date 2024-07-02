<?php
    include "api/db.php";
    global $conn;

    if(isset($_SESSION["auth"]) && !empty($_SESSION["auth"])) header("location: views/menu.php?home=active");

    header("location: components/user/signup.php");

