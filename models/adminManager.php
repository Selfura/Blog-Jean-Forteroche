<?php

namespace JeanForteroche\models;
use PDO;

require_once("models/Manager.php");

class adminManager extends Manager {

	public function getLogin($login) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM jfadmin WHERE login= ?');

		$req->execute(array($login));

		$logAdmin = $req->fetch();

		return $logAdmin;

	}

}