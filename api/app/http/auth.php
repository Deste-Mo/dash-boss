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
    $query = $conn->query("SELECT * FROM login");
    while($row = $query->fetch()){
        if(($row["mail"] == $user && $row["mot_de_passe"] == $pass) || ($row["numTel"] == $user && $row["mot_de_passe"] == $pass)){
            $_SESSION["auth"] = $row["user"];
            header("location: ../../../views/menu.php?home=active");
        }else{
            header("location: ../../../components/user/signup.php?message");
        }
    }
