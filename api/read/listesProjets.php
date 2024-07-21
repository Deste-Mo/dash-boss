<?php
    function getPercent($conn, $idProj) {
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
            $percent = intval($percent);
        } else{
            $percent = "0";
        }
        
        return $percent;
    }
    