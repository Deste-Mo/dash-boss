<?php

require_once '../db.php';

$sql = "UPDATE projet SET id_chef = ? WHERE N_pro = ?";

if(isset($_POST['id']) && isset($_POST['cin']) && !empty($_POST['cin']) && !empty($_POST['id'])){
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['cin'],$_POST['id']]);
    
    if($stmt){
        $answer = [
            'success' => "Tache effectuer"
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
