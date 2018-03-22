<?
class Connexion {
	function __construct() {}
  function verify($user, $password) {
    $db = new Db();
    $actual_pw = $db->getHashedPassword('bruno.simon@hetic.net');
    password_verify($password, $actual_pw) ? header('Location: /Evry') : header('Location: /Sevran');
  }
}