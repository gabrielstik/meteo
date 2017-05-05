<?php
  // YAHOO //
  $apikey = '&APPID=08da33fe0bd44b99b35ef3eabc42fddd';
  $queryurl = 'http://api.openweathermap.org/data/2.5/weather?';

  $woeid = '3020392';

  $query = 'q=ecully';
  $q = $queryurl.$query.$apikey;
  echo $q;

  ?></br></br><?php

  echo file_get_contents($q);

  ?></br></br><?php

  $json = json_decode(file_get_contents($q));
  print_r($json);

  ?></br></br><?php

  $temp = floatval($json->main->temp)-273.15;
  $temp_round = 0;

?>
<div class="maxmin">
  <div class="temp"><?php echo round($temp,$temp_round)."°C"; ?></div>
  <div class="city"><?php  ?></div>
</div>
