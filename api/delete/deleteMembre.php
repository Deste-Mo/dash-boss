<?php
    require "../db.php";
    if(isset($_GET["cin"])){
        $conn->query("DELETE FROM personnel WHERE cin = '$_GET[cin]'");
        header("location: ../../views/members.php?membre=active");
    }