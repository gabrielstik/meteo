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
        <input type="text" class="place blue" name="place" id="place" placeholder="Rechercher une ville, un pays">
        <div class="search-icon">
          <i class="fa fa-search"></i>
        </div>
        <button class="locate clickable blue">
          <i class="fa fa-location-arrow"></i>
        </button>
      </div>
      <div class="nav-right">
        <button class="user clickable blue">Se connecter</button>
        <div class="connexion-container">
          <form class="block connexion" action="/<?= $place ?>" method="get">
            <div class="title">Se connecter</div>
            <div class="item">
              <label for="mail">Mail</label>
              <input class="grey" type="text" name="mail" id="mail" placeholder="bruno.simon@hetic.net">
            </div>
            <div class="item">
              <label for="password">Mot de passe</label>
              <input class="grey" type="password" name="password" id="password" placeholder="••••••">
              <div class="hint">Mot de passe oublié ?</div>
            </div>
            <button type="submit">Se connecter</button>
            <div class="quit">
              <div class="branch-1"></div>
              <div class="branch-2"></div>
            </div>
          </form>
        </div>
        <button class="degree-unit clickable blue">
          <a>°C</a>
        </button>
      </div>
    </div>
  </div>
</header>