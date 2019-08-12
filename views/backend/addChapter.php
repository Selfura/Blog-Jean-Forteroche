<?php
	
	//ouverture connexion BDD
	 try
        {
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		 }
        catch (Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }

        $title     = htmlspecialchars(($_POST['title']));  // Pseudo
		$content   = htmlspecialchars(($_POST['content'])); // Messsage
		$image   = htmlspecialchars(($_POST['picture_url'])); // Messsage
	//Préparation de la requête d'insertion (SQL)

	$req = $bdd->prepare('INSERT INTO posts (title, content, date_creation) VALUES (:title, :content, NOW())');

	// on lie chaque marqueur à une valeur

	// éxécution de la requête préparée

	$newChap = $req->execute(array(
		'title' => $title,
		'content' => $content
	));



	if($newChap) {
		//header('Refresh: 2; url=../../index.php?action=admin');
		echo "Le chapitre a été posté";
	}
	else {
		//header('Refresh: 2; url=../../index.php?action=admin');
		echo "Le chapitre n'a pas été posté";
	}

print_r($bdd->errorInfo());