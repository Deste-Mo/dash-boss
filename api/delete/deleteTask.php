<?php
    require "../db.php";
    if(isset($_POST["idToDelete"]) && !empty($_POST["idToDelete"])){
        $state = $conn->prepare("DELETE FROM tache WHERE tache_id = ?");
        $state->execute([$_POST['idToDelete']]);

        if($state){
            $answer = [
                'success' => "Taches supprimer"
            ];
            echo json_encode($answer);
            return;
        }else{
            $answer = [
                'error' => "Erreur lors de la suppression"
            ];
            echo json_encode($answer);
            return;
        }
    }