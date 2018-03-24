<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/vendor/reset.min.css">
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
        <? if (!isset($_SESSION['username'])) { ?>
          <button class="js-show-form user clickable blue">Se connecter</button>
        <? } else { ?>
          <button class="user clickable blue">
            <a href="/favoris">Mes favoris</a>
          <button class="user clickable blue">
            <a href="/disconnect">Se déconnecter</a>
          </button>
        <?  } ?>
        <div class="connexion-container">
          <form class="block connexion" action="/<?= $place ?>" method="post">
            <div class="title">Se connecter</div>
            <div class="item">
              <label for="mail">Mail</label>
              <input class="grey" type="text" name="mail" id="mail" placeholder="bruno.simon@hetic.net" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
              <? if (isset($_GET['error']) && $_GET['error'] == 'notuser') { ?>
                <div class="error-message">L'utilisateur n'existe pas.</div>
              <? } ?>
            </div>
            <div class="item">
              <label for="password">Mot de passe</label>
              <input class="grey" type="password" name="password" id="password" placeholder="••••••">
              <div class="hint">Mot de passe oublié ?</div>
              <? if (isset($_GET['error']) && $_GET['error'] == 'password') { ?>
                <div class="error-message">Mot de passe incorrect.</div>
              <? } ?>
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