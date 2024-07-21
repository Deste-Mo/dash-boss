<?php
    if (!isset($_SESSION["auth"]) && empty($_SESSION["auth"])) {
        header("location: /signup");
    }
    include 'api/read/listesTask.php';
    include 'api/read/listesTaches.php';
	$id = isset($_GET['projet']) ? $_GET['projet'] : "";
   
	if ($id <= 0) {
		// die("ID du projet invalide");
		require view("404");
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Listes des Tâches</title>
	<?php 
        require 'components/forall/head.php';
      ?>
<body>

    <div class="main" id="main">
		<?php 
			require 'components/forall/header.php';
		?>
		<div class="right"> 
			<div class="tab-content">
				<!--Navigation-->
				<?php 
					require 'components/forall/pin.php';
				?>

				<!-- Overview -->
				<div id="overview" class="tab-pane active"  >
					<div class="content" >
						<div class="content-wrapper">
						<?php 
							require 'components/pages/taches.php';
						?>
						</div>  
					<!-- /content-wrapper-->
					</div>
				</div>
			</div>
			<!--Right panel-->
		</div><!--Main-->
    </div>
</body>
</html>