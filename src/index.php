<?php
session_start();

$q = !empty($_GET['q']) ? $_GET['q'] : '';
switch($q) {
case '':
	$page = 'home';
	$title = 'Radio Valdo';
	break;
case 'admin':
	$page = 'admin';
	$title = 'Administration de Radio Valdo';
	break;
case 'update':
	$page = 'update';
	$title = 'Mise à jour...';
	break;
default:
	$page = '404';
	$title = 'Rien ici, désolé.';
	break;
}

include 'config.php';

if ($page == 'update') {
	include 'actions/update.php';
}
else {
	include 'views/components/head.php';
	$page == 'admin' ? false : include 'views/components/header.php';
	include 'views/pages/'.$page.'.php';
	include 'views/components/foot.php';
}

?>
