<?php
include 'db.php';

session_start(); // Start the session to get the logged-in user's ID

// Assuming you store the user email in the session
$userEmail = $_SESSION['user_email'];

$query = $pdo->prepare("SELECT nom, prenom, photo FROM personnel WHERE email = ?");
$query->execute([$userEmail]);

$user = $query->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $userName = $user['prenom'] . ' ' . $user['nom'];
    $userImage = $user['photo'];
} else {
    $userName = 'Unknown User';
    $userImage = 'default-user-image.jpg'; // Fallback image
}
?>
