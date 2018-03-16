<?
define('OPEN_WEATHER_APP_ID', '08da33fe0bd44b99b35ef3eabc42fddd');
$city = isset($_GET['city']) ? $_GET['city'] : 'Paris';
$unit = 'metric';
$weather_url = 'http://api.openweathermap.org/data/2.5/weather?appid='.OPEN_WEATHER_APP_ID.'&q='.$city.'&units='.$unit;
$forecast_url = 'http://api.openweathermap.org/data/2.5/forecast?appid='.OPEN_WEATHER_APP_ID.'&q='.$city.'&units='.$unit;

function get_data($url) {
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

$weather_data = get_data($weather_url);
$forecast_data = get_data($forecast_url);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<link rel="stylesheet" href="assets/lib/font-awesome-4.7.0/css/font-awesome.min.css">
	<title>Météo</title>
</head>
<body>
	<header>
		<form class="input-city grid-12" action="/" method="get">
			<input type="text" name="city" id="city" placeholder="Rechercher une ville, un pays">
			<div class="search-icon">
				<i class="fa fa-search"></i>
			</div>
			<button class="locate">
				<i class="fa fa-location-arrow"></i>
			</button>
		</form>
	</header>
	<section class="meteo grid-12">
		<h1><?= $city ?><span class="region">Ille-et-Vilaine, France</span></h1>
		<div class="current col-5 box-shadow">
			<h2>Actuellement</h2>
			<div class="temp">
				<?= round($weather_data->main->temp) ?>
				<div class="unit">°C</div>
			</div>
			<div class="temp-values">
				<div class="labels">
					<div class="min">Minimum</div>
					<div class="max">Maximum</div>
					<div class="hum">Humidité</div>
				</div>
				<div class="values">
					<div class="min"><?= round($weather_data->main->temp_min) ?><span class="unit">°C</span></div>
					<div class="max"><?= round($weather_data->main->temp_max) ?><span class="unit">°C</span></div>
					<div class="feels"><?= round($weather_data->main->humidity) ?>%</div>
				</div>
			</div>
		</div>
		<?php foreach($forecast_data->list as $forecast) { ?>
			<div class="day">
				<h2><?= date(' d/m à H', $forecast->dt).'h' ?></h2>
				<div class="item">
					<span class="label">Température</span>
					<span class="value"><?= round($forecast->main->temp) ?>°C</span>
				</div>
				<div class="item">
					<span class="label">Minimum</span>
					<span class="value"><?= round($forecast->main->temp_min) ?>°C</span>
				</div>
				<div class="item">
					<span class="label">Maximum</span>
					<span class="value"><?= round($forecast->main->temp_max) ?>°C</span>
				</div>
				<div class="item">
					<span class="label">Pression</span>
					<span class="value"><?= round($forecast->main->pressure) ?> psi</span>
				</div>
				<div class="item">
					<span class="label">Humidité</span>
					<span class="value"><?= round($forecast->main->humidity) ?>%</span>
				</div>
			</div>
		<? } ?>
	</section>
</body>
</html>