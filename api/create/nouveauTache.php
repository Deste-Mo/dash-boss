<?php

require_once '../db.php';

$sql = "INSERT INTO tache (tache_nom, duree, id_projet) VALUES(?,?,?)";

if(isset($_POST['nom_tache']) && isset($_POST['duree']) && !empty($_POST['nom_tache']) && !empty($_POST['duree']) && isset($_POST['id']) && !empty($_POST['id'])){
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['nom_tache'], $_POST['duree'], $_POST['id']]);
    
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
