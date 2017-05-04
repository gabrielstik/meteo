<?php
	include 'config.php';

	$q = !empty($_GET['q']) ? $_GET['q'] : '';
	if ($q === '') {
		include 'views/partials/head.php';
		include 'views/partials/header.php';
		include 'views/home.php';
		include 'views/partials/footer.php';
		include 'views/partials/foot.php';
	}
	else if ($q === 'en') {
		include 'views/404.php';
	}
	else {
		include 'views/404.php';
	}
?>
<?php

?>
