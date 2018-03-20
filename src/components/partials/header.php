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
  <div class="input-place auto-960">
    <div class="flex between">
      <div class="nav-left">
        <input type="text" class="place" name="place" id="place" placeholder="Rechercher une ville, un pays">
        <div class="search-icon">
          <i class="fa fa-search"></i>
        </div>
        <button class="locate clickable">
          <i class="fa fa-location-arrow"></i>
        </button>
      </div>
      <div class="nav-right">
        <button class="user clickable">Se connecter</button>
        <button class="degree-unit clickable">
          <a>°C</a>
        </button>
      </div>
    </div>
  </div>
</header>