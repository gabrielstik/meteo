<?php
  // API data//
  $apikey = '08da33fe0bd44b99b35ef3eabc42fddd';
  $queryurl = 'http://api.openweathermap.org/data/2.5/';
  $lang = 'fr';

  include 'views/actions/display.php';
?>
<div class="weather">
  <form class="city-form" action="#" method="post">
    <input autocomplete="off" type="text" id="city" name="city" class="city" value="<?php echo $place; ?>"></input>
    <input type="submit" id="subcity" name="subcity" class="subcity"></input>
  </form>
  <div class="temp"><?php echo round($temp,$temp_round)."°C"; ?></div>
  <div class="how"><?php echo $how; ?></div>
</div>
