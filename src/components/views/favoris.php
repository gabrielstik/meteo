<? if (isset($_SESSION['username'])) { ?>
<section class="meteo auto-960">
  <? $Db = new Db(); ?>
  <h1>Mes favoris</h1>
  <? $favoris = $Db->getFavoris($_SESSION['username']); ?>
    <div class="flex between">
    <? foreach ($favoris as $favori) {
      $Weather = new Weather($favori->place); ?>
      <a href="/<?= $favori->place ?>" class="current block favoris">
        <h2>
          <?= $Weather->place_data->city ?>
          <form class="remove-city" action="/favoris" method="post">
            <input type="hidden" name="remove" value="<?= $favori->place ?>">
            <button type="submit" class="action-button remove"><i class="fa fa-minus-circle"></i></button>
          </form>
        </h2>
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
      </a>
    <? } ?>
    <div class="current block favoris">
      <h2>
        <form action="/favoris" method="post">
          <input class="add-favoris" type="text" name="add" placeholder="Ajouter une ville ici">
          <button type="submit" class="action-button add"><i class="fa fa-plus-circle"></i></button>
        </form>
      </h2>
    </div>
  </div>
</section>
<? }
else {
  include './components/views/404.php';
}