<?
setlocale(LC_ALL, 'fr_FR');
include './config.php';
include './components/Db.php';

include './components/Connexion.php';
$connexion = new Connexion();
if (isset($_GET['mail']) && isset($_GET['password'])) {
  $connexion->verify($_GET['mail'], $_GET['password']);
}

$place = !empty($_GET['q']) ? $_GET['q'] : 'Paris';

require './components/Weather.php';
$Weather = new Weather($place);
include './components/partials/header.php';


include './components/views/home.php';

include './components/partials/footer.php';