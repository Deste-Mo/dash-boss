<?php
    require "../db.php";
    if(isset($_POST["idToDelete"]) && !empty($_POST["idToDelete"])){
        $state = $conn->prepare("DELETE FROM projet WHERE N_pro = ?");
        $state->execute([$_POST['idToDelete']]);

        if($state){
            $answer = [
                'success' => "projets supprimer"
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