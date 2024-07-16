<?php

require_once '../db.php';

$sql = "INSERT INTO projet (nomP, duree) VALUES(?,?)";

if(isset($_POST['nom_projet']) && isset($_POST['duree']) && !empty($_POST['nom_projet']) && !empty($_POST['duree'])){
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['nom_projet'], $_POST['duree']]);
    
    if($stmt){
        $answer = [
            'success' => "Projet Enregistrer"
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
