<?php

namespace JeanForteroche\models;
use PDO;

require_once("models/Manager.php");

class mailManager extends Manager {

	// Ajout de Mail dans BDD
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

    // Liste des Mails
    public function getAllMails() {
	$db = $this->dbConnect();
	$mails = $db->query('SELECT id, title, author, DATE_FORMAT(date_mail, "Ajouté le %d/%m/%Y") AS mail_date, message, mail, lu FROM jfmail WHERE lu= 0 ORDER BY date_mail DESC');

	return $mails;

	}


    public function deleteMail($id) {
    	$db = $this->dbConnect();

    	$mail = $db->prepare('DELETE FROM jfmail WHERE id=?');
		$deleteMail = $mail->execute(array($id));

		return $deleteMail;

    }

    public function readMail($id) {
    	$db = $this->dbConnect();

    	$mail = $db->prepare('UPDATE jfmail SET lu=1 WHERE id=?');
    	$readMail = $mail->execute(array($id));

    	return $readMail;
    }

    public function getReadMail() {
    	$db = $this->dbConnect();

    	$mails = $db->query('SELECT id, title, author, DATE_FORMAT(date_mail, "Ajouté le %d/%m/%Y") AS mail_date, message, mail, lu FROM jfmail WHERE lu= 1 ORDER BY date_mail DESC');

    	return $mails;
    }
}