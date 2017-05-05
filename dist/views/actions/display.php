<script src="/assets/js/position.js"></script>
<?php
  // Meteo API data//
  $apikey = '08da33fe0bd44b99b35ef3eabc42fddd';
  $queryurl = 'http://api.openweathermap.org/data/2.5/';

  // ON CITY UPDATE //
  if (!empty($_POST['city'])) {
    $city = strtolower($_POST['city']);
    // WEATHER QUERY //
    $data = 'weather?';
    $query = 'q='.$city.'&lang='.$lang;
    $q_current = $queryurl.$data.$query.'&APPID='.$apikey;
    $json_current = json_decode(file_get_contents($q_current));

    $place = $json_current->name;
    $temp = floatval($json_current->main->temp)-273.15;
    $temp_round = 0;
    $how = $json_current->weather[0]->description;

    // FORECAST QUERY //
    $data = 'forecast?';
    $query = 'q='.$city.'&lang='.$lang;
    $q_forecast = $queryurl.$data.$query.'&APPID='.$apikey;
    $json_forecast = json_decode(file_get_contents($q_forecast));
  }
  else {
    // INIT WITH CURRENT LOCATION //
    // WEATHER QUERY //
    $data = 'weather?';
    $query = 'lat='.$_POST['setLat'].'&lon='.$_POST['setLon'].'&lang='.$lang;
    $q_current = $queryurl.$data.$query.'&APPID='.$apikey;
    $json_current = json_decode(file_get_contents($q_current));

    $place = $json_current->name;
    $temp = floatval($json_current->main->temp)-273.15;
    $temp_round = 0;
    $how = $json_current->weather[0]->description;

    // FORECAST QUERY //
    $data = 'forecast?';
    $query = 'lat='.$_POST['setLat'].'&lon='.$_POST['setLon'].'&lang='.$lang;
    $q_forecast = $queryurl.$data.$query.'&APPID='.$apikey;
    $json_forecast = json_decode(file_get_contents($q_forecast));
  }
?>
