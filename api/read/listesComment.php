<?php 
function getComment($conn)
{
    $sql = "SELECT * FROM comment order by comment_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comment;
    } else {
        $comment = [];
        return $comment;
    }
}

function countComment($conn)
{
    $sql = "SELECT count(comment_id) as count FROM comment WHERE status='N'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([]);

    if ($stmt->rowCount() > 0) {
        $comment = $stmt->fetch(PDO::FETCH_ASSOC);
        return $comment;
    } else {
        $comment = [];
        return $comment;
    }
}
