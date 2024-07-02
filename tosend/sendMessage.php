<?php
require_once '../utils/bd.php';

if($conn){

    if (isset($_POST["sendName"]) && isset($_POST["sendMessage"]) && isset($_POST["sendEmailVisitor"])){
        $name = htmlspecialchars($_POST["sendName"]);
        $email = htmlspecialchars($_POST["sendEmailVisitor"]);
        $message = htmlspecialchars($_POST["sendMessage"]);
    
        $query = $conn->prepare("INSERT INTO comment(comment_mail,comment_name,comment_message) VALUES (:mail,:name,:mes)");
        $query->bindParam(':mail',$email);
        $query->bindParam(':name',$name);
        $query->bindParam(':mes',$message);
    
        $query->execute();
        
        if($query){
            $response = [
                'success' => "Message envoyer",
            ];
            echo json_encode($response);
            return;
        }else{
            $response = [
                'error' => "Message non envoyer, erreur du serveur",
            ];
            echo json_encode($response);
            return;
        }
    }
}
