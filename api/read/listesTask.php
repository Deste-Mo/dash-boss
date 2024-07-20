<?php
function getTachesByProjectId($conn, $projectId) {
    $sql = "SELECT tache.*, DATE(tache.dateDeb) as dateCom, personnel.nom, personnel.prenom 
            FROM tache 
            LEFT JOIN personnel ON tache.cin = personnel.cin 
            WHERE tache.id_projet = ? 
            ORDER BY tache.tache_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$projectId]);

    if ($stmt->errorCode() !== '00000') {
        die("Erreur SQL : " . print_r($stmt->errorInfo(), true));
    }

    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}
?>
