<?php
  if (!empty($_POST['city'])) {
    $city = strtolower($_POST['city']);

    // QUERY CURRENT //
    $data = 'weather?';
    $query = 'q='.$city.'&lang='.$lang;
    $q_current = $queryurl.$data.$query.'&APPID='.$apikey;
    $json_current = json_decode(file_get_contents($q_current));

    $place = $json_current->name;
    $temp = floatval($json_current->main->temp)-273.15;
    $temp_round = 0;
    $how = $json_current->weather[0]->description;

    // FORECAST CURRENT //

    $data = 'forecast?';
    $query = 'q='.$city.'&lang='.$lang;
    $q_forecast = $queryurl.$data.$query.'&APPID='.$apikey;
    $json_forecast = json_decode(file_get_contents($q_forecast));
  }
?>
