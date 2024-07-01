<?php

require_once '../db.php';


$condition = isset($_POST['cin']) && isset($_POST['cinHide']) && isset($_POST['nom']) && isset($_POST['telephone']) && isset($_POST['email']);

$upload = null;

if(isset($_FILES['photo'])){
    $photo = $_FILES['photo'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($photo)) {
    $target_dir = "../../assets/uploads/";
    $target_name = uniqid() . basename($photo["name"]);
    $target_file = $target_dir . $target_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $reponse = [
            'error' => 'File already exists',
        ];
        echo json_encode($reponse);
        return;
    }

    // Check file size
    if ($photo["size"] > 10000000) {
        $reponse = [
            'error' => 'Photo trop lourd',
        ];
        echo json_encode($reponse);
        return;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $reponse = [
            'error' => 'Extension non autoriser',
        ];
        echo json_encode($reponse);
        return;
    }

    // Check if $uploadOk is set to 0 by an error
    if (!dir("../../assets/uploads")) {
        mkdir("../../assets/uploads");
    }

    $upload = move_uploaded_file($photo["tmp_name"], $target_file);
}


if ($condition) {
    if (isset($_POST['prenom']) && !is_null($upload) && $upload) {
        $sql = "UPDATE personnel SET cin = ?, nom = ?, prenom = ?, telephone = ?, photo = ?, email = ? WHERE cin = ?";
        $param = [
            $_POST['cin'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['telephone'],
            $target_name,
            $_POST['email'],
            $_POST['cinHide']
        ];

    } else if (isset($_POST['prenom'])) {
        $sql = "UPDATE personnel SET cin = ?, nom = ?, prenom = ?, telephone = ?, email = ? WHERE cin = ?";
        $param = [
            $_POST['cin'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['telephone'],
            $_POST['email'],
            $_POST['cinHide']
        ];
    } else if (!is_null($upload) && $upload) {
        $sql = "UPDATE personnel SET cin = ?, nom = ? telephone = ?, photo = ?, email = ? WHERE cin = ?";
        $param = [
            $_POST['cin'],
            $_POST['nom'],
            $_POST['telephone'],
            $target_name,
            $_POST['email'],
            $_POST['cinHide']
        ];
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute($param);

    if ($stmt) {
        if(!is_null($upload) && !$upload){
            $answer = [
                'success' => "Membres modifier",
                'uploadsErr' => "photo non modifier reessayer plus tard"
            ];
            echo json_encode($answer);
            return;
        }else if($upload){
            $answer = [
                'success' => "Membres modifier",
                'uploads' => "photo modifier"
            ];
            echo json_encode($answer);
            return;
        }else{
            $answer = [
                'success' => "Membres modifier"
            ];
            echo json_encode($answer);
            return;
        }

    } else {
        $answer = [
            'error' => "Une erreur est survenu "
        ];
        echo json_encode($answer);
        return;
    }
} else {
    $answer = [
        'error' => "Une erreur est survenu sur les conditions"
    ];
    echo json_encode($answer);
    return;
}
