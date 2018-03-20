<?
setlocale(LC_ALL, 'fr_FR');
include './config.php';

$place = !empty($_GET['q']) ? $_GET['q'] : 'Paris';

include './components/Weather.php';
$Weather = new Weather($place);
include './components/partials/header.php';


include './components/views/home.php';

include './components/partials/footer.php';