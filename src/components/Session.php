<?
class Session {
  function __construct() {
    if (isset($_POST['remove']) && isset($_SESSION['username'])) {
      $Db = new Db();
      $Db->removeFavoris($_SESSION['username'], $_POST['remove']);
    }
    if (isset($_POST['add']) && isset($_SESSION['username'])) {
      $Weather = new Weather($_POST['add']);
      if ($Weather->geocoder_data->status != 'ZERO_RESULTS') {
        $Db = new Db();
        $Db->pushFavoris($_SESSION['username'], $_POST['add']);
      }
    }
    if (isset($_POST['unit'])) $_SESSION['unit'] = $_POST['unit'];
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
  function check_unit($unit) {
    if ($unit == 'temperature') {
      if (isset($_SESSION['unit'])) {
        switch($_SESSION['unit']) {
          case 'metric':
          return '°C';
          break;
          case 'imperial':
          return '°F';
          break;
          default:
          return '°C';
          break;
        }
      }
      else return '°C';
    }
    else if ($unit == 'speed') {
      if (isset($_SESSION['unit'])) {
        switch($_SESSION['unit']) {
          case 'metric':
          return 'km/h';
          break;
          case 'imperial':
          return 'kn';
          break;
          default:
          return 'km/h';
          break;
        }
      }
      else return 'km/h';
    }
  }
}