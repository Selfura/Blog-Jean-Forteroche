<?php

function getPosts() {
	$bdd = dbConnect();
	$req = $bdd->query('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` ORDER BY `id` DESC ');

	return $req;
}

function getLastPost($id) {
	$bdd = dbConnect();
	$lastPost = $bdd->prepare('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` ORDER BY `id` DESC LIMIT 1');
	$lastPost->execute(array($id));
	return $lastPost;

}

function getPost($id) {
	$bdd = dbConnect();
	$req = $bdd->prepare('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` WHERE `id`= ? ');
	$req->execute(array($id));
	$post = $req->fectch();

	return $post;
}

function getComments($post_id) {
	$bdd = dbConnect();
	$comments = $bdd->prepare('SELECT `post_id` `title`, `author`, DATE_FORMAT(`comment_date`, "Ajouté le %d/%m/%Y") AS `date_comment`, `comment`,`avert` FROM `comments` WHERE `post_id` = ? ORDER BY `comment_date` ');
	$comments->execute(array($id));

	return $comments;
}

function postComment($post_id, $title, $author, $comment) {
	
}



function dbConnect() {
	try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	return $bdd;
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
}
?>

