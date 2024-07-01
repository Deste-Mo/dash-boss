<?php

require_once '../db.php';

$sql = "INSERT INTO tache (tache_nom, etat) VALUES(?, ?)";

if(isset($_POST['nom_tache'])){
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['nom_tache'], 'L']);
    
    if($stmt){
        $answer = [
            'success' => "Tache Enregistrer"
        ];
        echo json_encode($answer);
        return;
    }else{
        $answer = [
            'error' => "Erreur lors de l'ajout"
        ];
        echo json_encode($answer);
        return;
    }
}
