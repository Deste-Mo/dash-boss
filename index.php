<?php
    require "api/db.php";

    $routes = require_once __DIR__ . DIRECTORY_SEPARATOR . "routes.php";

    $request = $_SERVER["REQUEST_URI"];
    $url_parts = explode('?', $request);
    $path = $url_parts[0];
    $query_params = isset($url_parts[1]) ? $url_parts[1] : '';

    switch ($path) {
        case "/home?home=active":
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
        case "/taches":
            require view("taches");
            break;  
        case "/signup":
            require user("signup");
            exit;
                
        default:
            if ($path === "/") {
                if (isset($_SESSION["auth"]) && !empty($_SESSION["auth"])) {
                    header("Location: /home?home=active");
                    break;
                } else {
                    include user("/signup");
                    // echo "reussi";
                    exit;
                }   
            }    
    }

    if (array_key_exists($path, $routes)) {
        require $routes[$path];
        exit();
    } else {
        header("HTTP/1.0 404 Not Found");
        require view("404");
        exit();
    }