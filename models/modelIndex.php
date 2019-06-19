<?php
function getPost($postId) {

	try {
		$db = new PDO('mysql:host=localhost;dbname=jfPost;charset=utf8', 'root', 'root');
	}
	catch(Exception $e) {
		die("Erreur : " .$e->getMessage());
	}

	$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5, picture_url');

	return $req;
}