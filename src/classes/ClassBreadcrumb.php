<?php 
	namespace Src\Classes;

	class ClassBreadcrumb {
		use \Src\Traits\TraitUrlParser;

		# Cria os breadcrumps do site
		public function addBreadcrump() {
			$contador = count($this -> parseUrl());
			$arrayLink[0] = '';

			echo "<a href='".DIRPAGE."'>Home</a> > ";

			for ($i = 0; $i < $contador; $i++) { 
				$arrayLink[0] .= $this -> parseUrl()[$i].'/';
				echo "<a href='".DIRPAGE.$arrayLink[0]."'>".$this -> parseUrl()[$i]."</a>";

				if ($i < $contador - 1) {
					echo " > ";
				}
			}
		}
	}