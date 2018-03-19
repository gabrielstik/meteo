<?
class Db {
	function __construct() {    
		try {
			$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}
		catch (Exception $e) {
			echo('DB offline');
		}
	}
}