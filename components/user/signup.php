<?php
    require_once "../../api/db.php";
    // global $conn;

    if(isset($_SESSION["auth"]) && !empty($_SESSION["auth"])) {
        header("location: ../../views/menu.php?home=active");
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel='stylesheet' href='../../css/all.min.css'>
	<link rel="stylesheet" href="../../css/sign.css">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="screen">
			<div class="screen__content">
				<form class="login" method="POST" action="../../api/app/http/auth.php">
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" placeholder="Phone / Email" name="user">
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password" name="password">
					</div>
					<button class="button login__submit">
						<span class="button__text" name="bot_conn">se connecter</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button><br>
					<?php if(isset($_GET["message"])): ?>
					<div class="alert alert-danger">Votre email ou telephone ou mot de passe est incorrect</div>
				<?php endif ?>			
				</form>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>		
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>		
		</div>
	</div>
</body>
</html>
