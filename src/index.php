<?
setlocale(LC_ALL, 'fr_FR');

class Weather {
  public function __construct() {
    define('OPEN_WEATHER_API_KEY', '08da33fe0bd44b99b35ef3eabc42fddd');
    define('GOOGLE_API_KEY', 'AIzaSyA412LU3h-USYKW_U-_al9fOEeZpsjTiic');

    $this->place_data = isset($_GET['place']) ? $this->geocode($_GET['place']) : $this->geocode('Paris');
    $unit = 'metric';
    $weather_url = 'http://api.openweathermap.org/data/2.5/weather?appid='.OPEN_WEATHER_API_KEY.'&lat='.$this->place_data->lat.'&lon='.$this->place_data->lng.'&units='.$unit;
    $forecast_url = 'http://api.openweathermap.org/data/2.5/forecast?appid='.OPEN_WEATHER_API_KEY.'&lat='.$this->place_data->lat.'&lon='.$this->place_data->lng.'&units='.$unit;

    $this->weather_data = $this->get_data($weather_url);
    $this->forecast_data = $this->get_data($forecast_url);
  }

  private function geocode($place) {
    $geocoder_data = json_decode(file_get_contents(
      'https://maps.googleapis.com/maps/api/geocode/json?key='.GOOGLE_API_KEY.'&language=fr&address='.str_replace(' ', '-', $place)
    ));
    $this->place_data = new stdClass();
    $this->place_data->city = $geocoder_data->results[0]->address_components[0]->long_name;
    $this->place_data->dept = $geocoder_data->results[0]->address_components[1]->long_name;
    $this->place_data->country = $geocoder_data->results[0]->address_components[3]->long_name;
    $this->place_data->lat = $geocoder_data->results[0]->geometry->location->lat;
    $this->place_data->lng = $geocoder_data->results[0]->geometry->location->lng;
    return $this->place_data;
  }
  
  private function get_data($url) {
    $path = './cache/'.md5($url);
    if (!is_dir('./cache')) mkdir('./cache');
    if (file_exists($path) && time() - filemtime($path) < 60) {
      $data = json_decode(file_get_contents($path));
    }
    else {
      $data = json_decode(file_get_contents($url));
      file_put_contents('./cache/'.md5($url), json_encode($data));
    }
    return $data;
  }

  public function deg_to_str($deg) {
    if ($deg < 360 / 32 * 1 || $deg >= 360 / 32 * 31) return 'N'; 
    else if ($deg < 360 / 32 * 3) return 'NNE'; 
    else if ($deg < 360 / 32 * 5) return 'NE'; 
    else if ($deg < 360 / 32 * 7) return 'ENE'; 
    else if ($deg < 360 / 32 * 9) return 'E'; 
    else if ($deg < 360 / 32 * 11) return 'ESE'; 
    else if ($deg < 360 / 32 * 13) return 'SE'; 
    else if ($deg < 360 / 32 * 15) return 'SSE'; 
    else if ($deg < 360 / 32 * 17) return 'S'; 
    else if ($deg < 360 / 32 * 19) return 'SSO'; 
    else if ($deg < 360 / 32 * 21) return 'SO'; 
    else if ($deg < 360 / 32 * 23) return 'OSO'; 
    else if ($deg < 360 / 32 * 25) return 'O';
    else if ($deg < 360 / 32 * 27) return 'ONO';
    else if ($deg < 360 / 32 * 29) return 'NO';
    else if ($deg < 360 / 32 * 31) return 'NNO';
  }
}
$Weather = new Weather();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/reset.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<link rel="stylesheet" href="assets/lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<title>Météo</title>
</head>
<body>
	<header>
		<form class="input-place auto-960" action="/" method="get">
			<input type="text" class="place" name="place" id="place" placeholder="Rechercher une ville, un pays">
			<div class="search-icon">
				<i class="fa fa-search"></i>
			</div>
			<button class="locate">
				<i class="fa fa-location-arrow"></i>
			</button>
		</form>
	</header>
	<section class="meteo auto-960">
		<h1>
      <?= $Weather->place_data->city ?>
      <span class="region"><?= $Weather->place_data->dept ?>, <?= $Weather->place_data->country ?></span>
    </h1>
		<div class="current block">
			<h2>Actuellement</h2>
			<div class="temp">
				<?= round($Weather->weather_data->main->temp) ?>
				<div class="unit">°C</div>
			</div>
			<div class="temp-values">
				<div class="labels">
					<div class="min">Minimum</div>
					<div class="max">Maximum</div>
					<div class="hum">Humidité</div>
				</div>
				<div class="values">
					<div class="min"><?= round($Weather->weather_data->main->temp_min) ?><span class="unit">°</span></div>
					<div class="max"><?= round($Weather->weather_data->main->temp_max) ?><span class="unit">°</span></div>
					<div class="feels"><?= round($Weather->weather_data->main->humidity) ?>%</div>
				</div>
			</div>
		</div>
    <div class="week-forecast block">
      <h2>Prévisions sur 5 jours</h2>
      <? for ($i = 4; $i < 40; $i += 8) { $forecast = $Weather->forecast_data->list ?>
        <div class="day">
          <h3><?= substr(strftime('%A', $forecast[$i]->dt), 0, 3).' '.strftime('%d', $forecast[$i]->dt) ?></h3>
          <div class="temp"><?= round($forecast[$i]->main->temp) ?>°</div>
          <div class="temp-min-max">
            <span class="temp-min"><?= round($forecast[$i]->main->temp_min) ?>°</span>
            <span class="temp-max"><?= round($forecast[$i]->main->temp_max) ?>°</span>
          </div>
          <div class="wind">
            <?= $Weather->deg_to_str($forecast[$i]->wind->deg) ?>
            <?= round($forecast[$i]->wind->speed) ?>
            <span class="unit">km/h</span>
          </div>
          <div class="value"><?= round($forecast[$i]->main->humidity) ?>%</div>
        </div>
      <? } ?>
    </div>
    <div class="day-forecast block">
      <h2>Prévisions sur 36 heures</h2>
      <? for ($i = 0; $i < 12; $i++) { $forecast = $Weather->forecast_data->list ?>
        <div class="day">
          <h3><?= substr(strftime('%A', $forecast[$i]->dt), 0, 3).' '.strftime('%d', $forecast[$i]->dt) ?><br><?= strftime('%kh', $forecast[$i]->dt) ?></h3>
          <div class="value"><?= round($forecast[$i]->main->temp) ?>°C</div>
          <div class="value"><?= round($forecast[$i]->main->temp_min) ?>°C</div>
          <div class="value"><?= round($forecast[$i]->main->temp_max) ?>°C</div>
          <div class="value"><?= round($forecast[$i]->main->pressure) ?> psi</div>
          <div class="value"><?= round($forecast[$i]->main->humidity) ?>%</div>
        </div>
      <? } ?>
    </div>
	</section>
</body>
</html>