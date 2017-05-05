<?php
  // API data//
  $apikey = '08da33fe0bd44b99b35ef3eabc42fddd';
  $queryurl = 'http://api.openweathermap.org/data/2.5/weather?';
  $lang = 'fr';
  $city = 'ecully';

  // Current data

  $query = 'q='.$city.'&lang='.$lang;
  $q = $queryurl.$query.'&APPID='.$apikey;

  echo file_get_contents($q);

  $json = json_decode(file_get_contents($q));

  $place = $json->name;
  $temp = floatval($json->main->temp)-273.15;
  $temp_round = 0;
  $how = $json->weather[0]->description;

?>
<div class="weather">
  <div class="city"><?php echo $place; ?></div>
  <div class="temp"><?php echo round($temp,$temp_round)."°C"; ?></div>
  <div class="how"><?php echo $how; ?></div>
</div>
