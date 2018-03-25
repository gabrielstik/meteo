<?
session_start();
setlocale(LC_ALL, 'fr_FR');
require './config.php';
include './components/Db.php';

require './components/Weather.php';

include './components/Session.php';
$session = new Session();
if (isset($_POST['mail']) && isset($_POST['password'])) {
  if (isset($_POST['create'])) {
    $session->createAccount($_POST['mail'], $_POST['password']);
  }
  $session->verify($_POST['mail'], $_POST['password']);
}

if (!empty($_GET['q']) && $_GET['q'] == 'disconnect') {
  session_destroy();
  header('Location: /');
}
else {
  $place = !empty($_GET['q']) ? $_GET['q'] : 'Paris';
}

include './components/partials/header.php';


if (!empty($_GET['q']) && $_GET['q'] == 'favoris') {
  include './components/views/favoris.php';
}
else if (!empty($_GET['q']) && $_GET['q'] == '404') {
  include './components/views/404.php';
}
else {
  include './components/views/home.php';
}

include './components/partials/footer.php';