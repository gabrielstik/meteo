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
  function getHashedPassword($user) {
    $query = $this->pdo->query("SELECT * FROM users WHERE username = 'bruno.simon@hetic.net'");
    $user = $query->fetch();
    return $user->password;
  }
  function getFavoris($user) {
    $query = $this->pdo->query("SELECT * FROM users WHERE username = 'bruno.simon@hetic.net'");
    $user = $query->fetch();
    return json_decode($user->favoris);
  }
  function pushFavoris($user, $favoris) {
    echo '<pre>';
    print_r($favoris);
    echo '</pre>';
    $exec = $this->pdo->exec("UPDATE users SET favoris = '".json_encode($favoris)."' WHERE username = 'bruno.simon@hetic.net'");
    $exec->execute();
  }
}