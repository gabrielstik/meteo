<?
session_start();
setlocale(LC_ALL, 'fr_FR');
include './config.php';
include './components/Db.php';

include './components/Session.php';
$session = new Session();
if (isset($_GET['mail']) && isset($_GET['password'])) {
  $session->verify($_GET['mail'], $_GET['password']);
}

if (!empty($_GET['q']) && $_GET['q'] == 'disconnect') {
  session_destroy();
  header('Location: /');
}
else {
  $place = !empty($_GET['q']) ? $_GET['q'] : 'Paris';
}

require './components/Weather.php';
$Weather = new Weather($place);
include './components/partials/header.php';


include './components/views/home.php';

include './components/partials/footer.php';