<?php 
	// parseUrl() return
	class Teste {
		use Src\Traits\TraitUrlParser;

		public function __construct() {
			var_dump($this -> parseUrl());
			exit;
		}
	}

	$teste = new Teste();