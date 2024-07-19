<?php

require_once '../db.php';

$sql = "UPDATE tache SET etat = 'N', cin = Null, dateDeb = Null, duree = ? WHERE tache_id = ?";

if(isset($_POST['idToClear']) && !empty($_POST['idToClear']) && isset($_POST['res']) && !empty($_POST['res'])){
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['res'],$_POST['idToClear']]);
    
    if($stmt){
        $answer = [
            'success' => "Tache annuler"
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