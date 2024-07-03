<?php
function getProjets($conn, $rech)
{
    $sql = "SELECT projet.*, DATE(projet.dateDeb) as dateCom ,personnel.nom,personnel.prenom FROM projet LEFT JOIN personnel on  projet.id_chef = personnel.cin WHERE dateFin IS NULL AND nomP LIKE '%".$rech."%' ORDER BY N_pro DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $task = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $task;
    } else {
        $task = [];
        return $task;
    }
}


function getPercent($conn, $idProj)
{
    $sql = "SELECT COUNT(tache_id) AS 'tout' FROM tache WHERE id_projet = ?";
    $sq2 = "SELECT COUNT(tache_id) AS 'fin' FROM tache WHERE id_projet = ? AND etat = 'F'";
    $stmt1 = $conn->prepare($sql);
    $stmt2 = $conn->prepare($sq2);
    $stmt1->execute([$idProj]);
    $stmt2->execute([$idProj]);

    $all = $stmt1->fetch(PDO::FETCH_ASSOC)['tout'];

    if ($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0 && $all != 0) {
        $fin = $stmt2->fetch(PDO::FETCH_ASSOC)['fin'];
        $percent = $fin * 100 / $all;
    }
    else{
        $percent = "0";
    }


    return $percent;

}