<?php
function getTache($conn)
{
    $sql = "SELECT * FROM tache WHERE etat = 'L' OR etat = 'E' OR etat is NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    } else {
        $user = [];
        return $user;
    }
}

function getUser($conn)
{
    $sql = "SELECT * FROM personnel";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    } else {
        $user = [];
        return $user;
    }
}
