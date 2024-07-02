<?php
function getTache($conn)
{
    $sql = "SELECT * FROM tache WHERE etat = 'N' OR etat = 'E'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $task = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $task;
    } else {
        $task = [];
        return $task;
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
