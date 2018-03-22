<section class="meteo auto-960">
  <? $Weather = new Weather($place); ?>
  <h1>Mes favoris</h1>
  <div class="current block">
    <h2><?= $Weather->place_data->city ?></h2>
    <div class="flex">
      <div class="icon current-weather">
        <img src="assets/images/<?= $Weather->weather_data->weather[0]->icon ?>.png" alt="Current weather">
      </div>
      <div class="temp">
        <?= round($Weather->weather_data->main->temp) ?>
        <div class="unit">°C</div>
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
  </div>
</section>