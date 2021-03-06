<?php

namespace JeanForteroche\models;

require_once("models/Manager.php");

class PostManager extends Manager {

	public function getPosts() {
		// On récupère tous les chapitres du plus récent au plus vieu.
		$db = $this->dbConnect();

		$req = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, "Publié le %d/%m/%Y") AS date_creation_fr, picture FROM jfPosts ORDER BY id DESC ');
		return $req;
		
	}

	public function getLastPost() {

		$db = $this->dbConnect();
		// On récupère le dernière chapitre.
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, "Publié le %d/%m/%Y") AS date_creation_fr, picture FROM jfPosts ORDER BY date_creation DESC LIMIT 1');
		return $req;
	}

	public function getPost($post_id) {
		$db = $this->dbConnect();
		//on récupère un chapitre via son id

		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, "Publié le %d/%m/%Y") AS date_creation_fr, picture FROM jfPosts WHERE id= ? ');
		$req->execute(array($post_id));
		$post = $req->fetch();

		return $post;
	}


	public function createPost($title, $content, $picture) {
		$db = $this->dbConnect();
		// on crée un nouveau post

		$post = $db->prepare('INSERT INTO jfPosts(title, content, date_creation, picture) VALUES (?, ?, NOW(), ?)');
		$createPost = $post->execute(array($title, $content, $picture));

		return $createPost;
	}


	public function updatePost($id, $picture) {
		$db = $this->dbConnect();
		// on édite un chapitre
		$post = $db->prepare('UPDATE jfPosts SET title= ?, content=?, picture=? WHERE id= ?');

		$updatePost = $post->execute(array($_POST['title'], $_POST['content'], $picture, $id));

		return $updatePost;
	}


	public function deletePost($id) {
		$db = $this->dbConnect();
		// on supprime un chapitre
		$post = $db->prepare('DELETE FROM jfPosts WHERE id= ?');
		$deletePost = $post->execute(array($id));

		return $deletePost;
	}

}