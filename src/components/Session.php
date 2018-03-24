<?
class Session {
  function __construct() {
    if (isset($_POST['remove'])) $this->remove($_POST['remove']);
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
  function remove($place) {
    $Db = new Db();
    $user = $_SESSION['username'];
    $favoris = $Db->getFavoris($user);
    // $Db->pushFavoris($user, $newFavoris);
  }
}