<?
class Session {
  function __construct() {
    if (isset($_POST['remove']) && isset($_SESSION['username'])) {
      $Db = new Db();
      $Db->removeFavoris($_SESSION['username'], $_POST['remove']);
    }
  }
  function verify($user, $password) {
    $db = new Db();
    $actual_pw = $db->getHashedPassword($user);
    if (password_verify($password, $actual_pw)) {
      $_SESSION['username'] = $user;
      header('Location: /favoris');
    }
    else {
      header('Location: /'.$_GET['q']);
    }
  }
}