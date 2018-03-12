<?php

class Db {

	function __construct() {

		$this->pdo = null;

		define('DB_HOST','localhost');
		define('DB_NAME','radiovaldo');
		define('DB_USER','root');
		define('DB_PASS','root');

		try {
			$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}
		catch (Exception $e) {
			echo '<div style="position:absolute;width:100vw;color:white;padding:5px 50px;background:red">Site hors ligne</div>';
		}
	}

	function getPDO() {
		return $this->pdo;
	}

	function getAll($table) {
		$got = array();
		$get = $this->pdo->prepare("SELECT * FROM `$table`");
		$get->execute();
		while ($elements = $get->fetch()) {
			array_push($got, $elements);
		}
		return $got;
	}

	function update($table, $that, $to) {
		$to = str_replace("'", "''", $to); // quote fix
		$update = array();
		$update= $this->pdo->prepare("UPDATE `$table` SET $that = '$to'");
		$update->execute();
	}
}

$db = new Db();
$pdo = $db->getPDO();

?>
