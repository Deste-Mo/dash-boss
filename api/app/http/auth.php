<?php
    session_start();
    include "../../db.php";

    // if (!isset($_SESSION["auth"]) && empty($_SESSION["auth"])) {
    //         // Connexion
    //     $user = $_POST["user"];
    //     $pass = $_POST["password"];
    //     if (!empty($user) && !empty($pass)) {
    //         // $query = $conn->prepare("SELECT * FROM login WHERE mot_de_passe = ? AND numTel = ? OR mail = ?");
    //         // $query = $conn->execute("SELECT * FROM login");


    //         // $query->execute([$pass, $user, $user]);
    //         $query = $conn->query("SELECT * FROM login");
    //         foreach($query as $data) :
    //             if($data["mail"] == $user && $data["mot_de_passe"] == $pass) {
    //                 $_SESSION["auth"] = $data["user"];
    //                 // header("location: ../../../index.php");
    //                 // header("location: ../../../views/menu.php");
    //                 echo "reussi";
    //                 header("location: ../../../views/menu.php?home=active");
    //             }
    //             if($data["numTel"] == $user && $data["mot_de_passe"] == $pass0){
    //                 $_SESSION["auth"] == $data["user"];
    //                 header("location: ../../../../../views/menu.php");
    //             }
    //         endforeach;
    //     } else {
    //         echo "Veillez remplir le formulaire";
    //     }
    // } else {
    //     header("location: ../../../index.php");
    //     exit();
    // }
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

            header("location: ../../../views/menu.php?home=active");

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
            header("location: ../../../views/menu.php?home=active");

        }
    }

    header("location: ../../../components/user/signup.php?message");