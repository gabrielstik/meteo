<?php
$zip = '62000';
$city = 'Arras';

$data = file_get_contents('http://www.meteofrance.com/previsions-meteo-france/'.strtolower($city).'/'.$zip);

$from_maxtemp = '<span class="max-temp">';
$to_maxtemp = ' Maximale</span>';
$from_mintemp = '<span class="min-temp">';
$to_mintemp = ' Minimale</span>';
$from_city = '<h1>Meteo ';
$to_city = ' (';

function getData($data,$from,$to) {
  $sub = substr($data, strpos($data,$from)+strlen($from),strlen($data));
  return substr($sub,0,strpos($sub,$to));
}
?>
<div class="maxmin">
  <div class="max-temp"><?php echo getData($data,$from_maxtemp,$to_maxtemp) ?></div><!--
  --><div class="min-temp"><?php echo getData($data,$from_mintemp,$to_mintemp) ?></div>
  <div class="city"><?php echo getData($data,$from_city,$to_city) ?></div>
</div>
