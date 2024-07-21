<?php
    function getUser($conn) {
        $sql = "SELECT * FROM personnel";
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        } else {
            $user = [];
            return $user;
        }
    }

    function getProjets($conn, $rech) {
        $sql = "SELECT projet.*, DATE(projet.dateDeb) as dateCom ,personnel.nom,personnel.prenom FROM projet LEFT JOIN personnel on  projet.id_chef = personnel.cin WHERE dateFin IS NULL AND nomP LIKE '%".$rech."%' ORDER BY N_pro DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);

        if ($stmt->rowCount() > 0) {
            $projet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $projet = [];
        }
        return $projet;
    } 

    function getTask($conn, $projectId, $rech) {
        $sql = "SELECT *
                FROM tache 
                INNER JOIN personnel ON tache.cin = personnel.cin 
                WHERE tache_nom LIKE '%".$rech."%' AND tache.id_projet = ? 
                ORDER BY tache.tache_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$projectId]);

        if ($stmt->errorCode() !== '00000') {
            die("Erreur SQL : " . print_r($stmt->errorInfo(), true));
        }

        if ($stmt->rowCount() > 0) {
            // $
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }