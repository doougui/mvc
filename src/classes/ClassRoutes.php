<?php 
	namespace Src\Classes;

	use Src\Traits\TraitUrlParser;

	class ClassRoutes {
		use TraitUrlParser;

		private $rota;

		# Método de retorno da rota
		public function getRota() {
			$url = $this -> parseUrl();
			$I = $url[0];

			$this -> rota = array(
				"" => "ControllerHome",
				"home" => "ControllerHome",
				"sitemap" => "ControllerSitemap"
			);

			if (array_key_exists($I, $this -> rota)) {
				if (file_exists(DIRREQ."app/controller/{$this -> rota[$I]}.php")) {
					return $this -> rota[$I];
				} else {
					return "ControllerHome";
				}
			} else {
				return "ControllerHome";
			}
		}
	}