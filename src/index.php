<?
setlocale(LC_ALL, 'fr_FR');
include './config.php';
include './components/Weather.php';
$Weather = new Weather();
include './components/partials/header.php';

include './components/views/home.php';

include './components/partials/footer.php';