<?php
    // routes.php

    require_once __DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "utils" . DIRECTORY_SEPARATOR . "functions.php";

    $routes = [
        "/" => view("menu"),
        "/clients" => view("clients"),
        "/members" => view("members"),
        "/notification" => view("notification"),
        "/projet" => view("projet"),
        "/signin" => user("signin"),
    ];

    return $routes;