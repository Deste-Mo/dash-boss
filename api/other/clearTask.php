<?php

require_once '../db.php';

$sql = "UPDATE tache SET etat = 'F', dateFin= CURRENT_TIMESTAMP WHERE tache_id = ?";

if(isset($_POST['idToClear'])){
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['idToClear']]);
    
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
}

