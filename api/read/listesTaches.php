<?php
    function getTache($conn) {
        $sql = "SELECT tache.*, DATE(tache.dateDeb) as dateCom ,personnel.nom,personnel.prenom FROM tache LEFT JOIN personnel on  tache.cin = personnel.cin WHERE etat = 'N' OR etat = 'E'";
        $stmt = $conn->prepare($sql);
        // $stmt->execute([]);

        if ($stmt->rowCount() > 0) {
            $task = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $task;
        } else {
            $task=[];
            return $task;
        }
    }

    function getTacheByProj($conn, $id) {
        $sql = "SELECT tache.*, DATE(tache.dateDeb) as dateCom ,personnel.nom,personnel.prenom FROM tache LEFT JOIN personnel on  tache.cin = personnel.cin WHERE id_projet = ? ORDER BY tache.tache_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $task = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $task;
        } else {
            $task=[];
            return $task;
        }
    }

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
