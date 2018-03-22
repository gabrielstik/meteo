<?
class Session {
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