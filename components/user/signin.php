<?php
    require_once "api/db.php";
    global $conn;
	
    if(!empty($_SESSION["auth"])) {
        header("location: ../components/user/signup.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>
<body>
    <h1>
        Creation de compte
    </h1>
</body>
</html>