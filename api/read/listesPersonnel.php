<?php

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


if(isset($_POST['idToUpdate'])){
    require_once '../db.php';

    $sql = 'select * from personnel where cin = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['idToUpdate']]);

    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    $data = [
        'member' => $member,
    ];

    echo json_encode($data);
    return;
}
