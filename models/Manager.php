<?php

namespace JeanForteroche\models;

use PDO;

// Appel à la BDD via class.

class Manager {

	protected function dbConnect() {

		$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
		return $db;
	}

}