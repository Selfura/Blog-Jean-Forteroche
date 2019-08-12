<?php

namespace JeanForteroche\models;
use PDO;

require_once("models/Manager.php");

class commentManager extends Manager {
	
	public function addComment($post_id, $author, $title, $comment){ //modèle


	$db = $this->dbConnect();
	$comments = $db->prepare('INSERT INTO comments(post_id, author, title, comment, comment_date, avert) VALUES(:post_id, :author, :title, :comment, NOW(), 0)');


	$comments->bindValue(':post_id', $post_id);
	$comments->bindValue(':author', $author);
	$comments->bindValue(':title', $title);
	$comments->bindValue(':comment', $comment);


	$newComment = $comments->execute();

	return $newComment;

}

	public function getComments($post_id) { //modèle
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT title, author, DATE_FORMAT(comment_date, "Ajouté le %d/%m/%Y") AS date_comment, comment,avert FROM comments WHERE post_id = ? ORDER BY comment_date ');
		$comments->execute(array($post_id));

		return $comments;
		
	}

	public function getAllComments() {
		$db = $this->dbConnect();
		$allCom = $db->query('SELECT title, author, DATE_FORMAT(comment_date, "Ajouté le %d/%m/%Y") AS date_comment, comment,avert FROM comments ORDER BY comment_date ');

		return $allCom;

	}

	public function deleteComment() {
		$db = $this->dbConnect();
		
	}

	public function signalComment() {
		$db = $this->dbConnect();
		
	}

	public function approveComment() {
		$db = $this->dbConnect();
		
	}

    public function addMail() {

    	$db = $this->dbConnect();
    	$mail = $db->prepare('INSERT INTO jfmail(title, mail, date_mail, author, message, lu) VALUES (:title, :mail, NOW(), :name, :message, 0)');
		
		$mail->bindValue(':title', $_POST['title']);
		$mail->bindValue(':mail', $_POST['mail']);
		$mail->bindValue(':name', $_POST['name']);
		$mail->bindValue(':message', $_POST['message']);

		$mail->execute();

		return $mail;
    }

    public function delMail() {
    	$db = $this->dbConnect();
    	$req = $db->prepare('DELETE FROM jfmail WHERE id=:num LIMIT 1');

		// liaison du paramètre nommé

		$db->bindValue(':num', $_GET['supprmail'], PDO::PARAM_INT);

		return $req;

    }


}