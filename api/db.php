<?php
    session_start();
    define("HOST", "localhost");
    define("DB_NAME", "media_boss");
    define("USER", "root");
    define("PASSWORD", "mora");

    try {
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected";
    } catch (Exception $e) {
        echo $e;
    }
