<?php
    session_start();

    include "api/db.php";

    $routes = require_once __DIR__ . DIRECTORY_SEPARATOR . "routes.php";

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (isset($_SESSION["auth"]) && !empty($_SESSION["auth"])) {
        if ($path === "/") {
            require_once view("menu"); // Utilisation de require_once pour inclure la vue
            exit();
        }
    } else {
        if ($path === "/") {
            require_once user("signin"); // Utilisation de require_once pour inclure le fichier utilisateur
            exit();
        }
    }

    if (array_key_exists($path, $routes)) {
        require_once $routes[$path]; 
    } else {
        header("HTTP/1.0 404 Not Found");
        include "views/404.php"; 
    }