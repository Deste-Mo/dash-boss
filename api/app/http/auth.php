<?php
    include "../../db.php";

    $user = $_POST["user"];
    $pass = $_POST["password"];
    $pass = md5($pass);
    $query = $conn->query("SELECT * FROM personnel");
    $query2 = $conn->query("SELECT * FROM login");

    $memb = $query->fetchAll(PDO::FETCH_ASSOC);
    $admin = $query2->fetchAll(PDO::FETCH_ASSOC);

    foreach($memb as $m){
        if(
            ($m["email"] == $user && $m["password"] == $pass) 
            || 
            ($m["telephone"] == $user && $m["password"] == $pass)
        ){

            $_SESSION["auth"] = "membre";
            $_SESSION["name"] = $m["nom"]." ".$m["prenom"];
            $_SESSION["cin"] = $m["cin"];
        }
    }

    foreach($admin as $a){
        if(
            ($a["mail"] == $user && $a["mot_de_passe"] == $pass) 
            ||
            ($a["telephone"] == $user && $a["mot_de_passe"] == $pass)
        ){

            $_SESSION["auth"] = "admin";
            $_SESSION["name"] = $a["user"];
        }
    }

    // header("location: /");
    if(isset($_SESSION)) {
        echo "reussi";
    } else {
        echo "echec";
    }