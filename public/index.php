<?php 
	header('Content-Type: text/html; charset=utf-8');

	require_once('../config/config.php');
	require_once('../src/vendor/autoload.php');

	use Src\Classes\ClassRoutes;

	class Teste extends ClassRoutes {
		public function __construct() {
			$v = $this -> getRota();
			var_dump($v);
		}
	}

	$new = new Teste();