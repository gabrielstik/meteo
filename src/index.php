<?
define('OPEN_WEATHER_MAP_APP_ID', '08da33fe0bd44b99b35ef3eabc42fddd');
$city = isset($_GET['city']) ? $_GET['city'] : 'Paris';
$unit = 'metric';
$url = 'http://api.openweathermap.org/data/2.5/forecast?appid='.OPEN_WEATHER_MAP_APP_ID.'&q='.$city.'&units='.$unit;

$path = './cache/'.md5($url);
if (!is_dir('./cache')) mkdir('./cache');
if (file_exists($path) && time() - filemtime($path) < 60) {
	$data = json_decode(file_get_contents($path));
}
else {
	$data = json_decode(file_get_contents($url));
	file_put_contents('./cache/'.md5($url), json_encode($data));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style.min.css">
	<title>Météo</title>
</head>
<body>
	<form action="/" method="get">
		<label for="city">Prévisions à</label>
		<input type="text" name="city" id="city" value="<?= $city ?>">
		<input type="submit" value="">
	</form>
	<section>
		<?php foreach($data->list as $forecast) { ?>
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
					<span class="label">Humiditéè</span>
					<span class="value"><?= round($forecast->main->humidity) ?>%</span>
				</div>
			</div>
		<? } ?>
	</section>
</body>
</html>