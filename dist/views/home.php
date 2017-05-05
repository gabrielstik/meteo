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
<div class="forecast">
  <div class="forecast-space">
    <ul class="forecast-list">
      <?php
        for ($date = 0; $date < 40; $date++) { ?>
          <li class="forecast-date">
            <div class="date">
              <?php
                if ($lang == fr) {
                  echo ltrim(substr($json_forecast->list[$date]->dt_txt,8 , -9),0).'/'.ltrim(substr($json_forecast->list[$date]->dt_txt,5 , -12),0);
                }
                else {
                  echo ltrim(substr($json_forecast->list[$date]->dt_txt,5 , -12),0).'/'.ltrim(substr($json_forecast->list[$date]->dt_txt,8 , -9),0);
                }
              ?>
            </div>
            <div class="time">
              <?php
                echo substr($json_forecast->list[$date]->dt_txt,10 ,-3);
              ?>
            </div>
            <div class="temp">
              <?php
                echo round(floatval($json_forecast->list[$date]->main->temp)-273.15,$temp_round).'°C';
              ?>
            </div>
          </li>
        <?php }
      ?>
    </ul>
  </div>
</div>
