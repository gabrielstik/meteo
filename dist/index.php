<?php
	include 'config.php';

	$q = !empty($_GET['q']) ? $_GET['q'] : '';
	if ($q === '') {
		$lang = 'fr';
		include 'views/partials/head.php';
		include 'views/partials/header.php';
		include 'views/home.php';
		include 'views/partials/footer.php';
		include 'views/partials/foot.php';
	}
	else if ($q === 'fr') {
		$lang = 'fr';
		include 'views/partials/head.php';
		include 'views/partials/header.php';
		include 'views/home.php';
		include 'views/partials/footer.php';
		include 'views/partials/foot.php';
	}
	else if ($q === 'en') {
		$lang = 'en';
		include 'views/partials/head.php';
		include 'views/partials/header.php';
		include 'views/home.php';
		include 'views/partials/footer.php';
		include 'views/partials/foot.php';
	}
	else {
		include 'views/404.php';
	}
?>
<?php

?>
