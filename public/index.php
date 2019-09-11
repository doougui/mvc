<?php 
	header('Content-Type: text/html; charset=utf-8');

	require_once('../config/config.php');
	require_once('../src/vendor/autoload.php');

	echo "<pre>";
	echo DIRPAGE.'<br>';
	echo DIRREQ.'<br>';
	echo DIRIMG.'<br>';
	?>

	<img src="<?= DIRIMG."imagem.jpg" ?>" width="400" alt="Imagem">
