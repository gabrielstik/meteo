<?
class Session {
  function __construct() {
    if (isset($_POST['remove'])) $this->removeFavoris($_POST['remove']);
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
  function removeFavoris($place) {
    $Db = new Db();
    $user = $_SESSION['username'];
    $favoris = $Db->getFavoris($user)->places;
    echo '<pre>';
    print_r($favoris);
    echo '</pre>';
    for ($i = 0; $i < count($favoris); $i++) {
      if ($favoris[$i] == $place) unset($favoris[$i]);
    }
    $Db->pushFavoris($user, $favoris);
  }
}