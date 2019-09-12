<?php

namespace JeanForteroche\models;
use PDO;

require_once("models/Manager.php");

class commentManager extends Manager {
	
	public function addComment($post_id, $author, $title, $comment){ //modèle


	$db = $this->dbConnect();
	$comments = $db->prepare('INSERT INTO comments(post_id, author, title, comment, comment_date, avert, valid) VALUES(:post_id, :author, :title, :comment, NOW(), 0, 0)');


	$comments->bindValue(':post_id', $post_id);
	$comments->bindValue(':author', $author);
	$comments->bindValue(':title', $title);
	$comments->bindValue(':comment', $comment);


	$newComment = $comments->execute();

	return $newComment;

}

	public function getComments($post_id) { //modèle
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, title, author, DATE_FORMAT(comment_date, "Ajouté le %d/%m/%Y") AS date_comment, comment, avert, valid FROM  comments WHERE post_id = ? ORDER BY comment_date ');
		$comments->execute(array($post_id));

		return $comments;
		
	}

	public function getAllComments() {
		$db = $this->dbConnect();
		$comments = $db->query('SELECT id, title, author, DATE_FORMAT(comment_date, "Ajouté le %d/%m/%Y") AS date_comment, comment, avert, valid FROM comments WHERE valid=0 AND avert=0 ORDER BY comment_date ');

		return $comments;

	}

	public function deleteComment($id) {
		$db = $this->dbConnect();

		$comment = $db->prepare('DELETE FROM comments WHERE id= ?');
		$deleteComment = $comment->execute(array($id));

		return $deleteComment;
		
	}

	public function getReportComments() {
		$db = $this->dbConnect();

		$reportComments = $db->query('SELECT id, title, author, DATE_FORMAT(comment_date, "Ajouté le %d/%m/%Y") AS date_comment, comment, avert, valid FROM comments WHERE avert=1 ORDER BY comment_date');

		return $reportComments;
	}


	public function reportComment($id) {
		$db = $this->dbConnect();
		
		$comment = $db->prepare('UPDATE comments SET avert=1, valid=0 WHERE id=?');
		$reportComment = $comment->execute(array($id));

		return $reportComment;
	}

	public function getApproveComment() {
		$db = $this->dbConnect();

		$approveComments = $db->query('SELECT id, title, author, DATE_FORMAT(comment_date, "Ajouté le %d/%m/%Y") AS date_comment, comment, avert, valid FROM comments WHERE valid=1 ORDER BY valid ');

		return $approveComments;
		
	}

	public function approveComment($id) {
		$db = $this->dbConnect();

		$comment = $db->prepare('UPDATE comments SET avert=0, valid=1 WHERE id=?');
		$approveComments = $comment->execute(array($id));

		return $approveComments;

	}

}