<?php

require_once '../db.php';

$sql = "UPDATE comment SET status = 'V' WHERE comment_id = ?";

if(isset($_POST['idTo']) && !empty($_POST['idTo'])){
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['idTo']]);
    
    if($stmt){
        $answer = [
            'success' => "Vue effectuer"
        ];
        echo json_encode($answer);
        return;
    }else{
        $answer = [
            'error' => "Une erreur est survenu"
        ];
        echo json_encode($answer);
        return;
    }
}else{
    return;
}
