<?php

    require_once __DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "utils" . DIRECTORY_SEPARATOR . "functions.php";

    $routes = [
        "/" => "index.php",
        "/home" => view("menu"),
        "/clients" => view("clients"),
        "/members" => view("members"),
        "/notification" => view("notification"),
        "/projets" => view("projets"),
        "/signup" => user("signup"),
    ];

    return $routes;
