<?php 

//ouverture connexion BDD

	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

	//Préparation de la requête d'insertion (SQL)

	$req = $bdd->prepare('DELETE FROM jfmail WHERE id=:num LIMIT 1');

	// liaison du paramètre nommé

	$bdd->bindValue(':num', $_GET['supprmail'], PDO::PARAM_INT);


	// exécution de la requête


	$executeOk = $bdd->execute();

	if($executeOk) {
		$message = 'Le mail a été supprimé';
	}
	else {
		$message = 'Echec de la suppression du mail';
	}

	?>

	<p><?php echo $message;

header('Refresh: 2; url=../index.php?action=admail'); ?></p