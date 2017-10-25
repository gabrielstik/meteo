<script src="assets/js/position.js"></script>
<?php
  $location = false;
  // Meteo API data//
  $apikey = '08da33fe0bd44b99b35ef3eabc42fddd';
  $queryurl = 'http://api.openweathermap.org/data/2.5/';

  // ON CITY UPDATE //
if ($_POST['city']) {
  $city = strtolower($_POST['city']);
}
else {
  $city = 'Paris';
}
// WEATHER QUERY //
$data = 'weather?';
$query = 'q='.$city.'&lang='.$lang;
$q_current = $queryurl.$data.$query.'&APPID='.$apikey;
$json_current = json_decode(file_get_contents($q_current));

$location = false;
$place = $json_current->name;
$temp = floatval($json_current->main->temp)-273.15;
$temp_round = 0;
$how = $json_current->weather[0]->description;
switch ($how) {
  case 'ciel dégagé':
    $howsentence = 'La nuit est <span class="how">claire</span> à';
    break;
  case 'brouillard':
    $howsentence = 'Du <span class="how">brouillard</span> couvre le ciel de';
  case 'brume':
    $howsentence = 'Des filets de <span class="how">brume</span> se profilent à';
  break;
  case 'peu nuageux':
    $howsentence = 'Le ciel est parsemé de <span class="how">nuages</span> à';
  break;
  case 'nuageux':
    $howsentence = 'De <span class="how">gros nuages</span> surplombent';
  break;
  case 'couvert':
    $howsentence = 'Le ciel est <span class="how">gris</span> à';
  break;
  default:
    $howsentence = "C'est <div class='how'>$how</div> à ";
}
?>
