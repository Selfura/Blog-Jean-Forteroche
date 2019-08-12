<?php

namespace JeanForteroche\models;

require_once("models/manager.php");

class PostManager extends Manager {

	public function getPosts() {
		// On récupère tous les chapitres du plus récent au plus vieu.
		$db = $this->dbConnect();

		$req = $db->query('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` ORDER BY `id` DESC ');
		return $req;
		
	}

	public function getLastPost() {

		$db = $this->dbConnect();
		// On récupère le dernière chapitre.
		$req = $db->query('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` ORDER BY `date_creation` DESC LIMIT 1');
		return $req;
	}

	public function getPost($post_id) {
		$db = $this->dbConnect();
		//on récupère un chapitre via son id

		$req = $db->prepare('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` WHERE `id`= ? ');
		$req->execute(array($post_id));
		$post = $req->fetch();

		return $post;
	}


	public function createPost() {
		$db = $this->dbConnect();
		// on crée un nouveau post
	}


	public function updatePost() {
		$db = $this->dbConnect();
		// on édite un chapitre
	}


	public function deletePost() {
		$db = $this->dbConnect();
		// on supprime un chapitre
	}

}