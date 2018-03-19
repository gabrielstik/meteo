<?
define('DB_HOST','localhost');
define('DB_NAME','myweather');
define('DB_USER','root');
define('DB_PASS','root');

include './components/Db.php';

$Db = new Db();
$pdo = $Db->pdo;