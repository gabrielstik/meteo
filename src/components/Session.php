<?
class Session {
  function __construct() {
    if (isset($_POST['remove']) && isset($_SESSION['username'])) {
      $Db = new Db();
      $Db->removeFavoris($_SESSION['username'], $_POST['remove']);
    }
    if (isset($_POST['add']) && isset($_SESSION['username'])) {
      $Db = new Db();
      $Db->pushFavoris($_SESSION['username'], $_POST['add']);
    }
  }
  function verify($user, $password) {
    $db = new Db();
    $actual_pw = $db->getHashedPassword($user);
    if (!empty($actual_pw)) {
      if (password_verify($password, $actual_pw)) {
        $_SESSION['username'] = $user;
        header('Location: /favoris');
      }
      else {
        header('Location: /'.$_GET['q'].'?error=password');
      }
    }
    else {
      header('Location: /'.$_GET['q'].'?error=notuser');
    }
  }
}