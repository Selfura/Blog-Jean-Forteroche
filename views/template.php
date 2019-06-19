<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="public/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" href="public/css/bootstrap.css"/>
		<link rel="stylesheet" href="public/css/style.css" />

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<title> <?= $title ?></title>

		<meta name="description" content="Blog de l'Écrivain Jean Forteroche où il délivre les chapitres de son noueavu livre.">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Open Graph data -->
		<meta property="og:title" content="Billet pour l'Alaska par Jean Forteroche"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content="http://yoank.fr/alaska"/>
		<meta property="og:image" content="images/....jpg"/>
		<meta property="og:description" content="Billet simple pour l'Alaska par Jean Forteroche"/>
		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@jeanForteroch">
		<meta name="twitter:title" content="Jean Forteroche : Billet pour l'Alaska">
		<meta name="twitter:description" content="Billet simple pour l'Alaska par Jean Forteroche">
		<!-- Twitter Summary card images must be at least 200x200px -->
		<meta name="twitter:image" content="images/....jpg">

		<!-- Favicons -->
		<link rel="shortcut icon" href="images/....jpg">

	</head>
	<body>
		<?php
		require ("views/header.php");
		?>


		<?= $content ?>


		<?php
		require ("views/footer.php");
		?>

		<script src="public/bootstrap/bootstrap.min.js"></script>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
		<script src="public/js/grayscale.min.js"></script>
	
	</body>
</html>