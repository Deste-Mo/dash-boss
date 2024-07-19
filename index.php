<?php
    require "api/db.php";

    $routes = require_once __DIR__ . DIRECTORY_SEPARATOR . "routes.php";

    $request = $_SERVER["REQUEST_URI"];
    $url_parts = explode('?', $request);
    $path = $url_parts[0];
    $query_params = isset($url_parts[1]) ? $url_parts[1] : '';

    switch ($path) {
        case "/home":
            require view("menu");
            break;
        case "/clients":
            require view("clients");
            break;
        case "/members":
            require view("members");
            break;  
        case "/notification":
            require view("notification");
            break;
        case "/projets":
            require view("projets");
            break;  
        case "/signup":
            require user("signup");
            break;  
                
        default:
            if (isset($_SESSION["auth"]) && !empty($_SESSION["auth"])) {
                if ($path === "/") {
                    header("Location: /home?home=active");
                    exit();
                }
            } else {
                if ($path === "/") {
                    header("Location: /signup");
                    exit();
                }
            }
            break;
    }

    if (array_key_exists($path, $routes)) {
        include $routes[$path];
    } else {
        header("HTTP/1.0 404 Not Found");
        include view("404");
    }