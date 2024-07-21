<?php
    require "../db.php";

    if(!isset($_GET["cin"])){
        header("Location : /members?membre=active");
        exit();
    }

    $conn->query("DELETE FROM personnel WHERE cin = '$_GET[cin]'");
    // header("location: ../../views/members.php?membre=active");
    header("Location: /members?membre=active");
    exit();