<section class="meteo auto-960">
  <? $Weather = new Weather($place);  
  if ($Weather->geocoder_data->status == 'ZERO_RESULTS') { ?>
  <div class="error">Aucune ville ne correspond à votre recherche. Réessayez.</div>
  <? } else { ?>
  <h1>
    <?= $Weather->place_data->city ?>
    <span class="region">
      <? echo $Weather->place_data->region;
      if (!empty($Weather->place_data->country)) echo ', '.$Weather->place_data->country; ?>
    </span>
  </h1>
  <div class="current block">
    <h2>Actuellement</h2>
    <div class="flex">
      <div class="icon current-weather">
        <img src="assets/images/<?= $Weather->weather_data->weather[0]->icon ?>.png" alt="Current weather">
      </div>
      <div class="temp">
        <?= round($Weather->weather_data->main->temp) ?>
        <div class="unit"><?= $session->check_unit('temperature') ?></div>
      </div>
      <div class="temp-values">
        <div class="labels">
          <div class="min">Minimum</div>
          <div class="max">Maximum</div>
          <div class="hum">Humidité</div>
          <div class="pres">Pression</div>
        </div>
        <div class="values">
          <div class="min"><?= round($Weather->weather_data->main->temp_min) ?><span class="unit">°</span></div>
          <div class="max"><?= round($Weather->weather_data->main->temp_max) ?><span class="unit">°</span></div>
          <div class="hum"><?= round($Weather->weather_data->main->humidity) ?>%</div>
          <div class="pres"><?= round($Weather->weather_data->main->pressure) ?> hPa</div>
        </div>
      </div>
    </div>
    <div class="suntimes flex evenly">
      <div class="sunrise">
        <i class="fa fa-sun-o"></i>
        <?= strftime('%H:%M', $Weather->weather_data->sys->sunrise) ?>
      </div>
      <div class="sunset">
        <i class="fa fa-moon-o"></i>
        <?= strftime('%H:%M', $Weather->weather_data->sys->sunset) ?>
      </div>
    </div>
  </div>
  <div class="week-forecast block">
    <h2>Prévisions sur 5 jours</h2>
    <div class="flex evenly">
      <? for ($i = 4; $i < 40; $i += 8) { $forecast = $Weather->forecast_data->list ?>
        <div class="day">
          <h3><?= substr(strftime('%A', $forecast[$i]->dt), 0, 3).' '.strftime('%d', $forecast[$i]->dt) ?></h3>
          <div class="icon forecast">
            <img src="assets/images/<?= $Weather->forecast_data->list[$i]->weather[0]->icon ?>.png" alt="Current weather">
          </div>
          <div class="temp"><?= round($forecast[$i]->main->temp) ?>°</div>
          <div class="wind">
            <?= $Weather->deg_to_str($forecast[$i]->wind->deg) ?>
            <br>
            <?= round($forecast[$i]->wind->speed * 3.6) ?>
            <span class="unit"><?= $session->check_unit('speed') ?></span>
            <div class="wind-arrow" data-orientation="<?= round($forecast[$i]->wind->deg) ?>" data-speed="<?= round($forecast[$i]->wind->speed * 3.6) ?>"><i class="fa fa-location-arrow"></i></div>
          </div>
          <div class="value"><?= round($forecast[$i]->main->humidity) ?>%</div>
        </div>
      <? } ?>
    </div>
  </div>
  <div class="day-forecast block">
    <h2>Prévisions sur 36 heures</h2>
    <div class="flex evenly">
      <? for ($i = 0; $i < 11; $i++) { $forecast = $Weather->forecast_data->list ?>
        <div class="day">
          <h3>
            <?= substr(strftime('%A', $forecast[$i]->dt), 0, 3).' '.strftime('%d', $forecast[$i]->dt) ?>
            <br>
            <?= strftime('%kh', $forecast[$i]->dt) ?>
          </h3>
          <div class="icon forecast">
            <img src="assets/images/<?= $Weather->forecast_data->list[$i]->weather[0]->icon ?>.png" alt="Current weather">
          </div>
          <div class="temp"><?= round($forecast[$i]->main->temp) ?>°</div>
          <div class="wind">
            <?= $Weather->deg_to_str($forecast[$i]->wind->deg) ?><br>
            <?= round($forecast[$i]->wind->speed * 3.6) ?>
            <span class="unit"><?= $session->check_unit('speed') ?></span>
            <div class="wind-arrow" data-orientation="<?= round($forecast[$i]->wind->deg) ?>" data-speed="<?= round($forecast[$i]->wind->speed * 3.6) ?>"><i class="fa fa-location-arrow"></i></div>
          </div>
          <div class="value"><?= round($forecast[$i]->main->humidity) ?>%</div>
        </div>
      <? } ?>
    </div>
  </div>
  <? } ?>
</section>